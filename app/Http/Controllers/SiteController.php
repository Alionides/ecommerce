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
use App\Color;
use App\Size;
use App\Slider;
use App\Banner;
use App\Review;
use App\Edvcoin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\Input;

class SiteController extends Controller
{
    //
    use ImageTrait;

    public function index(){
        $ln = App::getLocale();
        $slider = Slider::select('id', 'title_' . $ln . ' as title', 'desc_' . $ln . ' as desc', 'image', 'price','link')->where('status','>',0)->orderBy('created_at', 'asc')
        ->get(4);
        $banner = Banner::select('image','link','type')->where('status','>',0)->orderBy('created_at', 'desc')
        ->get();
        $datasale = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->where('saleprice','>',0)->orderBy('created_at', 'desc')
        ->take(12)->get();
        $datanew = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->whereDate('created_at',Carbon::today())->orderBy('created_at', 'desc')
        ->take(12)->get();
        $dataviewed = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug','viewed')->orderBy('viewed', 'desc')->orderBy('created_at', 'desc')
        ->take(12)->get();
        $datasold = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug','viewed','sold')->where('sold','>',0)->orderBy('sold', 'desc')->orderBy('created_at', 'desc')
        ->take(12)->get();
        $pages = Page::select('id', 'title_' . $ln . ' as title', 'link')->take(6)->get();

        $favo = Favourite::with(['products'])->orderBy('created_at', 'desc')->take(12)->get();
        //$category = Category::select()->get();
        $parentCategories = Category::select('id', 'parent_id', 'title_' . $ln . ' as title', 'slug', 'icon')->where('parent_id',null)->get();
        //return response($datasale);
        // dd($parentCategories);
        return view('site.index', compact('parentCategories','pages','slider','banner'))->with('datasale',$datasale)->with('datanew',$datanew)->with('dataviewed',$dataviewed)->with('datasold',$datasold)->with('favo',$favo);
    }

    public function xml(){
        $url = 'http://gercekspot.xmlbankasi.com/image/data/xml/alisveris.xml';
        // Read entire file into string 
        $xmlfile = file_get_contents($url); 
        
        // Convert xml string into an object 
        $new = simplexml_load_string($xmlfile); 
        
        // Convert into json 
        $con = json_encode($new); 
        
        // Convert into associative array 
        $newArr = json_decode($con, true); 
        
        return response($newArr); 
    }

    public function edvcoin(){
        $edvcoin = Edvcoin::latest('created_at')->get();
        $sum = Edvcoin::sum('edvcoin');
        return view('site.edvcoin',compact('edvcoin','sum'));
    }

    public function apiaddedvcoin(Request $request){

        $fiscal = $request->fiscal;
        $url = 'https://monitoring.e-kassa.gov.az/pks-portal/1.0.0/documents/'.$fiscal;
        // Read entire file into string 
        $xmlfile = file_get_contents($url); 

        $newArr = json_decode($xmlfile,true); 

        $market = $newArr['cheque']['storeName'];
        $spent = $newArr['cheque']['content']['sum'];
        $edvcoin = $newArr['cheque']['content']['vatAmounts'][0]['vatResult'];

        $fiscalquery = Edvcoin::where('fiscal',$fiscal)->first();
        if(isset($fiscalquery)){
            return response(300);
        }else{
            $addfiscal = new Edvcoin;
            $addfiscal->fiscal = $fiscal;
            $addfiscal->market = $market;
            $addfiscal->spent = $spent;
            $addfiscal->edvcoin = round($edvcoin);
            $addfiscal->save();

            return response($addfiscal);
        }
        
    }

    public function contact(Request $request,$ln){

        return view('site.contact');
    }
    public function user(){
        $user = Auth::user();
        return response($user);
    }
    public function search(Request $request,$ln){
        $ln = App::getLocale();
        $banner = Banner::select('image','link','type')->where('status','>',0)->orderBy('created_at', 'desc')
        ->get();
        $colorfilter = Color::get();
        $sizefilter = Size::get();
        $search = $request->q;
        $color = $request->color;
        $color =  explode(",", $color);
        $size = $request->size;
        $size =  explode(",", $size);
        if(isset($request->max)){
            $min = $request->min;
            $max = $request->max;
        }else{
            $min = 0;
            $max = 1000;
        }
        
        $alldata = Product::where('title_'.$ln, 'LIKE', "%{$search}%")->where('lastprice', '>=', $min )->where('lastprice', '<=', $max )->get();
        
        $lastdata = false;
        $colordata = [];
        $sizedata = [];

        if(!empty($color[0]) && !empty($size[0])){
            foreach($alldata as $all){
                if(isset($all->color) and isset($all->size)){
                    // foreach(json_decode($all->size) as $sc){  

                    // }
                    foreach(json_decode($all->size) as $sc){   
                        if(in_array($sc, $size)){
                            $sizedata[] = $all;
                           // break;
                        }           
                    } 
                        
                    foreach(json_decode($all->color) as $ac){   
                        if(in_array($ac, $color)){
                            $colordata[] = $all;
                            //break;
                        }           
                    } 
                }
            }
            
            //$lastdata = array_intersect_key($colordata,$sizedata); //$colordata;
            $lastdata = array_unique (array_merge($colordata,$sizedata)); // bu eslinde duz ishlemir;
        }elseif(!empty($color[0])){
            foreach($alldata as $all){
                if(isset($all->color)){
                    foreach(json_decode($all->color) as $ac){   
                        if(in_array($ac, $color)){
                            $colordata[] = $all;
                            break;
                        }           
                    } 
                }
            }
            $lastdata = $colordata;
        }elseif(!empty($size[0])){
            foreach($alldata as $all){
                if(isset($all->size)){
                    foreach(json_decode($all->size) as $sc){   
                        if(in_array($sc, $size)){
                            $sizedata[] = $all;
                            break;
                        }           
                    } 
                }
            }
            $lastdata = $sizedata;
        }else{
            $lastdata = $alldata;
        }

        $collection = collect($lastdata); // arraydan collection duzeltmey ucun        
        $pageSize = 24;        
        $allProducts = CollectionHelper::paginate($collection, $pageSize)->withQueryString();
        
        return view('site.search',compact('colorfilter','sizefilter','banner'))->with('data',$allProducts)->with('requestall',$request->all());
    }
    // public function search(Request $request,$ln){
    //     $ln = App::getLocale();
    //     $colorfilter = Color::get();
    //     $sizefilter = Size::get();
    //     $search = $request->q;
    //     $color = $request->color;
    //     $color =  explode(",", $color);
    //     $size = $request->size;
    //     $size =  explode(",", $size);
    //     if(isset($request->max)){
    //         $min = $request->min;
    //         $max = $request->max;
    //     }else{
    //         $min = 0;
    //         $max = 1000;
    //     }
        
    //     //$data = Product::where('title_'.$ln, 'LIKE', "%{$search}%")->where('lastprice', '>=', $min )->where('lastprice', '<=', $max )->paginate(1)->withQueryString();
    //     if(!empty($color[0]) && !empty($size[0])){
    //         $data = Product::where('title_'.$ln, 'LIKE', "%{$search}%")->where('color', $color )->where('size', $size )->where('lastprice', '>=', $min )->where('lastprice', '<=', $max )->paginate(1)->withQueryString();
    //     }elseif(!empty($color[0])){
    //         $data = Product::where('title_'.$ln, 'LIKE', "%{$search}%")->where('color', $color )->where('lastprice', '>=', $min )->where('lastprice', '<=', $max )->paginate(1)->withQueryString();
    //     }elseif(!empty($size[0])){
    //         $data = Product::where('title_'.$ln, 'LIKE', "%{$search}%")->where('size', $size )->where('lastprice', '>=', $min )->where('lastprice', '<=', $max )->paginate(1)->withQueryString();
    //     }else{
    //         $data = Product::where('title_'.$ln, 'LIKE', "%{$search}%")->where('lastprice', '>=', $min )->where('lastprice', '<=', $max )->paginate(1)->withQueryString();
    //     }

    //     return view('site.search',compact('colorfilter','sizefilter'))->with('data',$data)->with('requestall',$request->all());
    // }

    public function category(Request $request, $ln, $cat=null, $subcat=null, $subsubcat=null){

        $ln = App::getLocale();
        $banner = Banner::select('image','link','type')->where('status','>',0)->orderBy('created_at', 'desc')
        ->get();

        if(isset($request->max)){
            $min = $request->min;
            $max = $request->max;
        }else{
            $min = 0;
            $max = 1000;
        }
        
        $color = $request->color;
        $color =  explode(",", $color);
        $size = $request->size;
        $size =  explode(",", $size);


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

        $category = Category::with(['products', 'subproducts','products.reviews'])->where('slug', $slug)->firstOrFail();
       // $review = Product::with(['review'])->get();
        $alldata = $category->products->merge($category->subproducts)->where('lastprice', '>=', $min )->where('lastprice', '<=', $max );
         //return response($alldata);
        $lastdata = false;
        $colordata = [];
        $sizedata = [];

        if(!empty($color[0]) && !empty($size[0])){
            foreach($alldata as $all){
                if(isset($all->color) and isset($all->size)){
                    // foreach(json_decode($all->size) as $sc){  

                    // }
                    foreach(json_decode($all->size) as $sc){   
                        if(in_array($sc, $size)){
                            $sizedata[] = $all;
                           // break;
                        }           
                    } 
                        
                    foreach(json_decode($all->color) as $ac){   
                        if(in_array($ac, $color)){
                            $colordata[] = $all;
                            //break;
                        }           
                    } 
                }
            }
            
            //$lastdata = array_intersect_key($colordata,$sizedata); //$colordata;
            $lastdata = array_unique (array_merge($colordata,$sizedata)); // bu eslinde duz ishlemir;
        }elseif(!empty($color[0])){
            foreach($alldata as $all){
                if(isset($all->color)){
                    foreach(json_decode($all->color) as $ac){   
                        if(in_array($ac, $color)){
                            $colordata[] = $all;
                            break;
                        }           
                    } 
                }
            }
            $lastdata = $colordata;
        }elseif(!empty($size[0])){
            foreach($alldata as $all){
                if(isset($all->size)){
                    foreach(json_decode($all->size) as $sc){   
                        if(in_array($sc, $size)){
                            $sizedata[] = $all;
                            break;
                        }           
                    } 
                }
            }
            $lastdata = $sizedata;
        }else{
            $lastdata = $alldata;
        }

   

        $collection = collect($lastdata); // arraydan collection duzeltmey ucun        
        $pageSize = 24;        
        $allProducts = CollectionHelper::paginate($collection, $pageSize)->withQueryString();
        $colorfilter = Color::get();
        $sizefilter = Size::get();
        
        // return response($category);
        return view('site.category',compact('breadcrumb','blink','colorfilter','sizefilter','banner'))->with('data',$allProducts)->with('category',$category)->with('requestall',$request->all());
    }

    public function productdetail($ln,$id){ 
        $ln = App::getLocale();     
        $colorfilter = Color::get();
        $sizefilter = Size::get();     
        $data = Product::select('id', 'title_' . $ln . ' as title', 'desc_' . $ln . ' as desc', 'image',  'allimage', 'price','saleprice','slug','category_id','color','size')->where('slug', $id)->firstOrFail();
        
        $inc = Product::find($data->id);
        $inc->viewed++;
        $inc->save();
        //return response($data);
        $similar = Product::select('id', 'title_' . $ln . ' as title', 'desc_' . $ln . ' as desc', 'image',  'allimage', 'price','saleprice','slug')->where('category_id', $data->category_id)->whereNotIn('id', [$data->id])->take(12)->get();
       
        return view('site.productdetail',compact('colorfilter','sizefilter'))->with('data',$data)->with('similar',$similar);;
    }
    public function shop($ln,$id){ 
        $ln = App::getLocale();   
        $shop = Shop::select('id', 'name', 'image','slug','user_id','created_at')->where('slug', $id)->firstOrFail();
        $alldata = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->where('author_id', $shop->user_id)->get();
        $pageSize = 24;    
        $data = CollectionHelper::paginate($alldata, $pageSize);
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
    public function apiReview(Request $request){
        $productid = $request->product_id;
        $star = $request->star;
        $text = $request->text;
        $userid = Auth::user()->id;
        $username = Auth::user()->name;
        
        $review = Review::select('*')
        ->where('product_id', $productid)
        ->where('user_id',$userid)
        ->first();
        if(isset($review)){
            $review = 'hasreview';
            return response($review);
        }else{
            $review = new Review;
            $review->product_id = $productid;
            $review->user_id = $userid;
            $review->name = $username;
            $review->desc = $text;
            $review->review = $star;
            $review->save();
            return response($review);
        }

        
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
        isset($request->color) ? $color = $request->color : $color = 'seçilməyib';
        isset($request->size) ? $size = $request->size : $size = 'seçilməyib';
        Auth::check() ? $userid = Auth::user()->id : $userid = 0;
        $curcookie = Cookie::get('ACSESSID');
        $rand = Str::random(26);
        isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
        Cookie::queue(Cookie::make('ACSESSID', $cookie, 525600));
        
        $iscart = Cart::select('*')
        ->where('session_id', $cookie)
        ->where('product_id',$product_id)
        ->where('color',$color)
        ->where('size',$size)
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
            $shop->color = $color;
            $shop->size = $size;
            $shop->save();
        }
        $allcart = Cart::with(['products'])->where('session_id', $cookie)->get();
        return response($allcart);
    }

    public function apiRemoveCart(Request $request){
        $product_id = $request->product_id;
        isset($request->color) ? $color = $request->color : $color = 'seçilməyib';
        isset($request->size) ? $size = $request->size : $size = 'seçilməyib';
        Auth::check() ? $userid = Auth::user()->id : $userid = 0;
        $curcookie = Cookie::get('ACSESSID');
        $rand = Str::random(26);
        isset($curcookie) ? $cookie = $curcookie : $cookie = $rand;
        Cookie::queue(Cookie::make('ACSESSID', $cookie, 525600));

        $iscart = Cart::select('*')
        ->where('session_id', $cookie)
        ->where('product_id',$product_id)
        ->where('color',$color)
        ->where('size',$size)
        ->first();
        
        if(isset($iscart)){
            if(isset($request->removeit) == 1){            
                $iscart->delete();
            }else{
                $iscart->user_id = $userid;
                $iscart->quantity--;
                $iscart->save();
            }
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
                            if($oproduct->save()){
                                $data = Product::where('id', $op)->firstOrFail();
                                $data->sold= $data->sold+$request->quantity[$key];
                                $data->stock= $data->stock-$request->quantity[$key];
                                $data->save();
                            }
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
