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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
        $data = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->where('slug', $id)->firstOrFail();
        $data->viewed++;
        $data->save();
        return view('site.productdetail')->with('data',$data);
    }
    public function shop($ln,$id){ 
        $ln = App::getLocale();   
        $shop = Shop::select('id', 'name', 'image','slug','user_id','created_at')->where('slug', $id)->firstOrFail();
        $data = Product::select('id', 'title_' . $ln . ' as title', 'image',  'allimage', 'price','saleprice','slug')->where('author_id', $shop->user_id)->get();
        //return response($data);
        return view('site.shop')->with('data',$data)->with('shop',$shop);
    }

    private function getName($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    } 
    public function apiAddCart(Request $request){
        //$product_id = $request->product_id;
        $product_id = 12;
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
            return response($iscart);
        }else{
            $shop = new Cart;
            $shop->user_id = $userid;
            $shop->session_id = $cookie;
            $shop->product_id = $product_id;
            $shop->quantity = 1;
            $shop->save();
            return response($shop);
        }
    }


    public function getCookie(Request $request){

        $value = Cookie::get('ACSESSID');

        return response($value);
    }
}
