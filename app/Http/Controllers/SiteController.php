<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use App\Product;
use App\Category;
use App\Favourite;
use App\Shop;
use App\Page;
use App\Cart;
use App\Order;
use App\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    //
    use ImageTrait;

    public function index(){
        $ln = App::getLocale();

        $datasale = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->where('saleprice','>',0)->orderBy('created_at', 'desc')
        ->get(12);
        $datanew = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->whereDate('created_at',Carbon::today())->orderBy('created_at', 'desc')
        ->get(12);
        $dataviewed = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug','viewed')->orderBy('viewed', 'desc')->orderBy('created_at', 'desc')
        ->take(12)->get();
        $datasold = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug','viewed','sold')->where('sold','>',0)->orderBy('sold', 'desc')->orderBy('created_at', 'desc')
        ->take(12)->get();
        $pages = Page::select('id', 'title_' . $ln . ' as title', 'link')->take(6)->get();

        $favo = Favourite::with(['products'])->orderBy('created_at', 'desc')->take(12)->get();
        //$category = Category::select()->get();
        $parentCategories = Category::select('id', 'parent_id', 'title_' . $ln . ' as title', 'slug', 'icon')->where('parent_id',null)->get();
        // return response($favo);
        // dd($parentCategories);
        return view('site.index', compact('parentCategories','pages'))->with('datasale',$datasale)->with('datanew',$datanew)->with('dataviewed',$dataviewed)->with('datasold',$datasold)->with('favo',$favo);
    }

    public function user(){
        //$user = Auth::id();
        $user = Auth::user();

        return response($user);

    }

    public function category($ln, $cat=null, $subcat=null, $subsubcat=null){

        $ln = App::getLocale();

        $slug = $subsubcat ?? $subcat ?? $cat;
        $breadcrumb = '';
        if($slug == $cat){         
            $blink = Category::select('id','title_' . $ln . ' as title','slug')->where('slug',$cat)->get(); 
            //return response($cat);  
            $breadcrumb = $cat;
        }elseif ($slug == $subcat) {
            $blink = Category::select('id','title_' . $ln . ' as title','slug')->where('slug','=',$cat)->orWhere('slug','=',$subcat)->get(); 
           // return response($blink);
            $breadcrumb = $cat.'/'.$subcat;
        }elseif($slug == $subsubcat){
            $blink = Category::select('id','title_' . $ln . ' as title','slug')->where('slug','=',$cat)->orWhere('slug','=',$subcat)->orWhere('slug','=',$subsubcat)->get(); 
           // return response($blink);
            $breadcrumb = $cat.'/'.$subcat.'/'.$subsubcat;
        }

        $category = Category::with(['products', 'subproducts'])->where('slug', $slug)->firstOrFail();
        $allProducts = $category->products->merge($category->subproducts);
        
        // return response($category);
        return view('site.category',compact('breadcrumb','blink'))->with('data',$allProducts)->with('category',$category);
    }

    public function productdetail($ln,$id){ 
        $ln = App::getLocale();          
        $data = Product::select('id', 'title_' . $ln . ' as title', 'desc_' . $ln . ' as desc', 'image',  'allimage', 'price','saleprice','slug','category_id')->where('slug', $id)->firstOrFail();
        $data->viewed++;
        $data->save();
        $similar = Product::select('id', 'title_' . $ln . ' as title', 'desc_' . $ln . ' as desc', 'image',  'allimage', 'price','saleprice','slug')->where('category_id', $data->category_id)->whereNotIn('id', [$data->id])->get(8);
        //dd($similar);
        return view('site.productdetail')->with('data',$data)->with('similar',$similar);;
    }
    public function shop($ln,$id){ 
        $ln = App::getLocale();   
        $shop = Shop::select('id', 'name', 'image','slug','user_id','created_at')->where('slug', $id)->firstOrFail();
        $data = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->where('author_id', $shop->user_id)->get();
        //return response($data);
        return view('site.shop')->with('data',$data)->with('shop',$shop);
    }

    

    public function profilepassword(Request $request){
        $ln = App::getLocale();
        
        if ($request->isMethod('post')) {           
            
            $validator = Validator::make($request->all(), [
                //'password' => ['required',],
                'password' => [
                    'required', function ($attribute, $value, $fail) {
                        if (!Hash::check($value, Auth::user()->password)) {
                            $fail('Old Password didn\'t match');
                        }
                    },
                ],
                'npassword' => ['required',],
                'cpassword' => ['required',],
             ]); 
             $validator->getTranslator()->setLocale($ln);

            if($validator->fails()){
                return response()->json([
                  $validator->messages('Xeta base verdi'), 
                  'statuscode' => 400
                ]);
            }else{
                $userid = Auth::user()->id;

                $users = App\Models\User::select('*')
                ->where('id',$userid)
                ->first();
                if($request->npassword === $request->cpassword){
                    $users->password = Hash::make($request->cpassword);                    
                    $users->save();

                    return response()->json([
                        $validator->messages(), 
                        'statuscode' => 200
                    ]);
                } else {
                    return response()->json([
                        $validator->messages(), 
                        'statuscode' => 300
                    ]);
                }                
            }
        
        }else{
            $userid = Auth::user()->id;
            $user = App\Models\User::select('*')
                ->where('id',$userid)
                ->first();

            return view('site.profile')->with('user',$user);
        }
    }

    public function profile(Request $request){
        $ln = App::getLocale();
        
        if ($request->isMethod('post')) {           
            
            $validator = Validator::make($request->all(), [
                'name' => ['required',],
             ]); 
             $validator->getTranslator()->setLocale($ln);

            if($validator->fails()){
                return response()->json([
                  $validator->messages('Xeta base verdi'), 
                  'statuscode' => 400
                ]);
            }else{
                $userid = Auth::user()->id;
                $users = App\Models\User::select('*')
                ->where('id',$userid)
                ->first();
                $users->name = $request->name;
                $users->phone = $request->phone;  
                $users->address = $request->address;                    
                $users->city = $request->city;                    
                $users->postal = $request->postal;                    
                $users->save();

                return response()->json([
                    $validator->messages(), 
                    'statuscode' => 200
                ]);
            }
        
        }else{
            $userid = Auth::user()->id;
            $user = App\Models\User::select('*')
                ->where('id',$userid)
                ->first();
            $order = Order::select('*')
            ->where('user_id',$userid)
            ->get();           

            return view('site.profile')->with('user',$user)->with('order',$order);
        }
    }
    public function cart(Request $request){
        $ln = App::getLocale();
        $curcookie = Cookie::get('ACSESSID');
        $rand = Str::random(26);
        isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
        $allcart = Cart::with(['products'])->where('session_id', $cookie)->get();
        return view('site.cart')->with('allcart',$allcart);
    }
    public function apiOrderProducts(Request $request){
        $orderid = $request->order_id;
        $userid = Auth::user()->id;
        
        $order = Order::select('*')
        ->where('id', $orderid)
        ->where('user_id',$userid)
        ->first();
        $products = $order->products;

        return response($products);
    }
    public function apiAddCart(Request $request){
        $product_id = $request->product_id;
        Auth::check() ? $userid = Auth::user()->id : $userid = 0;
        $curcookie = Cookie::get('ACSESSID');
        $rand = Str::random(26);
        isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
        Cookie::queue(Cookie::make('ACSESSID', $cookie, 525600));

        $iscart = Cart::select('*')
        ->where('session_id', $cookie)
        ->where('product_id',$product_id)
        ->first();
        
        if(isset($iscart)){
            $iscart->user_id = $userid;
            $iscart->quantity++;
            $iscart->save();
        }else{
            $shop = new Cart;
            $shop->user_id = $userid;
            $shop->session_id = $cookie;
            $shop->product_id = $product_id;
            $shop->quantity = 1;
            $shop->save();
        }
        $allcart = Cart::with(['products'])->where('session_id', $cookie)->get();
        return response($allcart);
    }

    public function apiRemoveCart(Request $request){
        $product_id = $request->product_id;
        Auth::check() ? $userid = Auth::user()->id : $userid = 0;
        $curcookie = Cookie::get('ACSESSID');
        $rand = Str::random(26);
        isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
        Cookie::queue(Cookie::make('ACSESSID', $cookie, 525600));

        $iscart = Cart::select('*')
        ->where('session_id', $cookie)
        ->where('product_id',$product_id)
        ->first();
        
        if(isset($iscart)){
            if(isset($request->removeit) == 1){            
                $iscart->delete();
            }else{
                $iscart->user_id = $userid;
                $iscart->quantity--;
                $iscart->save();
            }
        }else{
            $shop = new Cart;
            $shop->user_id = $userid;
            $shop->session_id = $cookie;
            $shop->product_id = $product_id;
            $shop->quantity = 1;
            $shop->save();
        }
        $allcart = Cart::with(['products'])->where('session_id', $cookie)->get();
        return response($allcart);
    }
    public function apiAddFavo(Request $request){
        $product_id = $request->product_id;
        Auth::check() ? $userid = Auth::user()->id : $userid = 0;
        $curcookie = Cookie::get('ACFAVOSESSID');
        $rand = Str::random(26);
        isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
        Cookie::queue(Cookie::make('ACFAVOSESSID', $cookie, 525600));

        $iscart = Favourite::select('*')
        ->where('session_id', $cookie)
        ->where('product_id',$product_id)
        ->first();
        
        if(isset($iscart)){
            $iscart->user_id = $userid;
            //$iscart->quantity++;
            $iscart->save();
        }else{
            $shop = new Favourite;
            $shop->user_id = $userid;
            $shop->session_id = $cookie;
            $shop->product_id = $product_id;
            //$shop->quantity = 1;
            $shop->save();
        }
        $allfavo = Favourite::with(['products'])->where('session_id', $cookie)->get();
        return response($allfavo);
    }

    public function checkout(Request $request){
        $ln = App::getLocale();
        if ($request->isMethod('post')) {
            Auth::check() ? $userid = Auth::user()->id : $userid = null;

            $validator = Validator::make($request->all(), [
                'productid' => ['required',],
                'quantity' => ['required', ],
                'product_price' => ['required',],
                'billing_name' => ['required', 'string'],
                'billing_email' => ['required', 'email',],
                'billing_phone' => ['required'],
                'billing_address' => ['required'],
                'billing_city' => ['required'],
                'billing_postalcode' => ['required'],
                'payment_option' => ['required'],
             ]); 
             $validator->getTranslator()->setLocale($ln);

            if($validator->fails()){
                return response()->json([
                  $validator->messages('Xeta base verdi'), 
                  'statuscode' => 400
                ]);
            }else{

                $order = new Order;
                $order->user_id = $userid;
                $order->billing_name = $request->billing_name;
                $order->billing_email = $request->billing_email;
                $order->billing_phone = $request->billing_phone;
                $order->billing_address = $request->billing_address;
                $order->billing_city = $request->billing_city;
                $order->billing_postalcode = $request->billing_postalcode;
                $order->billing_total = $request->billing_total;
                $order->payment_gateway = $request->payment_option;
                $order->comment = $request->comment;
                $order->status = 0;

                    if($order->save()){                
                        $curcookie = Cookie::get('ACSESSID');
                        Cart::where('session_id', $curcookie)->delete();
                        foreach ($request->productid as $key => $op) {
                            $oproduct = new OrderProduct;
                            $oproduct->order_id = $order->id;
                            $oproduct->product_id = $op;
                            $oproduct->quantity = $request->quantity[$key];
                            $oproduct->product_price = $request->product_price[$key];
                            $oproduct->save();
                        }
                    }
                return response()->json([
                    $validator->messages(), 
                    'statuscode' => 200
                ]);
            }                       
            
           // return response($request->productid);            
        }else{
            $ln = App::getLocale();
            $curcookie = Cookie::get('ACSESSID');
            $rand = Str::random(26);
            isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
            $allcart = Cart::with(['products'])->where('session_id', $cookie)->get();
            return view('site.checkout')->with('allcart',$allcart);
        }
    }

}
