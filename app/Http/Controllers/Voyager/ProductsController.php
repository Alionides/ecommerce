<?php

namespace App\Http\Controllers\Voyager;

use App\Order;
use App\Color;
use App\Size;
use Validator;
use App\Product;
use App\Category;
use App\CategoryProduct;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductsController extends VoyagerBaseController
{
    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************
    public function xml(Request $request){

        if ($request->isMethod('post')) {  

           
            $url = $request->xmlurl; //'http://gercekspot.xmlbankasi.com/image/data/xml/alisveris.xml';
            // Read entire file into string 
            $xmlfile = file_get_contents($url); 
            
            // Convert xml string into an object 
            $new = simplexml_load_string($xmlfile); 
            
            // Convert into json 
            $con = json_encode($new); 
            
            // Convert into associative array 
            $newArr = json_decode($con, true); 

            // $json = '{"Product":[{"Product_code":[],"Barcode":"01900008017","Product_id":"2519","Name":[],"mainCategory":[],"mainCategory_id":[],"category":[],"category_id":[],"subCategory":[],"subCategory_id":[],"Price1":"37.8889","Price2":"31.5741","CurrencyType":"TRL","Tax":"8","Stock":"10","Brand":[],"Image1":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1607.jpg","Image2":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1602.jpg","Image3":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1606.jpg","Image4":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1603.jpg","Image5":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1604.jpg","Description":[],"variants":{"variant":[{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"60"}],"variantId":"3","productCode":[],"barcode":[],"gtin":[],"quantity":"6","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"56"}],"variantId":"4","productCode":[],"barcode":[],"gtin":[],"quantity":"2","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"54"}],"variantId":"5","productCode":[],"barcode":[],"gtin":[],"quantity":"2","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]}]}},{"Product_code":[],"Barcode":[],"Product_id":"2520","Name":[],"mainCategory":[],"mainCategory_id":[],"category":[],"category_id":[],"subCategory":[],"subCategory_id":[],"Price1":"29.8889","Price2":"24.9074","CurrencyType":"TRL","Tax":"8","Stock":"252","Brand":[],"Image1":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/beyaz-berrak-1020-erkek-atlet-841.jpg","Image2":[],"Image3":[],"Image4":[],"Image5":[],"Description":[],"variants":{"variant":[{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"51"}],"variantId":"6","productCode":[],"barcode":[],"gtin":[],"quantity":"42","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"68"}],"variantId":"8","productCode":[],"barcode":[],"gtin":[],"quantity":"18","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"60"}],"variantId":"9","productCode":[],"barcode":[],"gtin":[],"quantity":"48","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"64"}],"variantId":"10","productCode":[],"barcode":[],"gtin":[],"quantity":"48","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"48"}],"variantId":"11","productCode":[],"barcode":[],"gtin":[],"quantity":"24","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"54"}],"variantId":"12","productCode":[],"barcode":[],"gtin":[],"quantity":"24","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"45"}],"variantId":"13","productCode":[],"barcode":[],"gtin":[],"quantity":"48","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]}]}},{"Product_code":[],"Barcode":[],"Product_id":"2521","Name":[],"mainCategory":[],"mainCategory_id":[],"category":[],"category_id":[],"subCategory":[],"subCategory_id":[],"Price1":"36","Price2":"30","CurrencyType":"TRL","Tax":"8","Stock":"9","Brand":[],"Image1":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1022-erkek-siyah-atlet-904.jpg","Image2":[],"Image3":[],"Image4":[],"Image5":[],"Description":[],"variants":{"variant":[{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"60"}],"variantId":"14","productCode":[],"barcode":[],"gtin":[],"quantity":"4","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"45"}],"variantId":"19","productCode":[],"barcode":[],"gtin":[],"quantity":"5","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]}]}}]}';
            
            // $newArr = json_decode($json, true); 
            foreach($newArr['Product'] as $key => $n){

                $catid = $request->category_id;
                $allimagearr = [];
                $mikrotime = md5(microtime(true));
                
                $dbimagename = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml.jpg';
                $dbimagename_imgdetail = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml-imgdetail.jpg';
                $dbimagename_imggrid = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml-imggrid.jpg';
                $dbimagename_imgslider = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml-imgslider.jpg';
                
                $folderimagename = str_replace('\\', '/', $dbimagename);
                $folderimagename_imgdetail = str_replace('\\', '/', $dbimagename_imgdetail);
                $folderimagename_imggrid = str_replace('\\', '/', $dbimagename_imggrid);
                $folderimagename_imgslider = str_replace('\\', '/', $dbimagename_imgslider);

                $image = file_get_contents($n['Image1']);

                Storage::disk('local')->put('public/'.$folderimagename, $image);
                Storage::disk('local')->put('public/'.$folderimagename_imgdetail, $image);
                Storage::disk('local')->put('public/'.$folderimagename_imggrid, $image);
                Storage::disk('local')->put('public/'.$folderimagename_imgslider, $image);

                if(!empty($n['Image2'])){
                    $dbimagename2 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image2xml.jpg';
                    $dbimagename_imgdetail2 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image2xml-imgdetail.jpg';
                    $dbimagename_imggrid2 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image2xml-imggrid.jpg';
                    $dbimagename_imgslider2 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image2xml-imgslider.jpg';
                    
                    $folderimagename2 = str_replace('\\', '/', $dbimagename2);
                    $folderimagename_imgdetail2 = str_replace('\\', '/', $dbimagename_imgdetail2);
                    $folderimagename_imggrid2 = str_replace('\\', '/', $dbimagename_imggrid2);
                    $folderimagename_imgslider2 = str_replace('\\', '/', $dbimagename_imgslider2);
                    
                    $image2 = file_get_contents($n['Image2']);
                    Storage::disk('local')->put('public/'.$folderimagename2, $image2);
                    Storage::disk('local')->put('public/'.$folderimagename_imgdetail2, $image2);
                    Storage::disk('local')->put('public/'.$folderimagename_imggrid2, $image2);
                    Storage::disk('local')->put('public/'.$folderimagename_imgslider2, $image2);        
                    array_push($allimagearr, $dbimagename2);
                }

               // return response($allimagearr);
                if(!empty($n['Image3'])){
                    $dbimagename3 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image3xml.jpg';
                    $dbimagename_imgdetail3 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image3xml-imgdetail.jpg';
                    $dbimagename_imggrid3 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image3xml-imggrid.jpg';
                    $dbimagename_imgslider3 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image3xml-imgslider.jpg';
                    
                    $folderimagename3 = str_replace('\\', '/', $dbimagename3);
                    $folderimagename_imgdetail3 = str_replace('\\', '/', $dbimagename_imgdetail3);
                    $folderimagename_imggrid3 = str_replace('\\', '/', $dbimagename_imggrid3);
                    $folderimagename_imgslider3 = str_replace('\\', '/', $dbimagename_imgslider3);
                    
                    $image3 = file_get_contents($n['Image3']);
                    Storage::disk('local')->put('public/'.$folderimagename3, $image3);
                    Storage::disk('local')->put('public/'.$folderimagename_imgdetail3, $image3);
                    Storage::disk('local')->put('public/'.$folderimagename_imggrid3, $image3);
                    Storage::disk('local')->put('public/'.$folderimagename_imgslider3, $image3);           
                    array_push($allimagearr, $dbimagename3);
                }
                if(!empty($n['Image4'])){
                    $dbimagename4 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image4xml.jpg';
                    $dbimagename_imgdetail4 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image4xml-imgdetail.jpg';
                    $dbimagename_imggrid4 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image4xml-imggrid.jpg';
                    $dbimagename_imgslider4 = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'Image4xml-imgslider.jpg';
                    
                    $folderimagename4 = str_replace('\\', '/', $dbimagename4);
                    $folderimagename_imgdetail4 = str_replace('\\', '/', $dbimagename_imgdetail4);
                    $folderimagename_imggrid4 = str_replace('\\', '/', $dbimagename_imggrid4);
                    $folderimagename_imgslider4 = str_replace('\\', '/', $dbimagename_imgslider4);
                    
                    $image4 = file_get_contents($n['Image4']);
                    Storage::disk('local')->put('public/'.$folderimagename4, $image4);
                    Storage::disk('local')->put('public/'.$folderimagename_imgdetail4, $image4);
                    Storage::disk('local')->put('public/'.$folderimagename_imggrid4, $image4);
                    Storage::disk('local')->put('public/'.$folderimagename_imgslider4, $image4);           
                    array_push($allimagearr, $dbimagename4);
                }

                $productid = $n['Product_id'];
                $title = empty($n['Name']) ? $productid : $n['Name'];
                $desc = empty($n['Description']) ? '' : json_encode($n['Description']);

                $p = new Product;
                $p->slug = $slug = Str::slug($title, '-');
                $p->category_id = $catid;
                $p->title_az = $title;
                $p->desc_az = $desc;
                $p->title_en = $title;
                $p->desc_en = $desc;
                $p->title_ru = $title;
                $p->desc_ru = $desc;
                $p->title_tr = $title;
                $p->desc_tr = $desc;
                $p->image = $dbimagename;
                $p->allimage = empty($allimagearr) ? null : json_encode($allimagearr);
                $p->price = empty($n['Price1']) ? 0 : $n['Price1'];
                $p->saleprice = empty($n['Price2']) ? 0 : $n['Price2'];
                $p->stock = empty($n['Stock']) ? 0 : $n['Stock'];

                $p->save();                

               
                
                // if($key > 1) {
                //         exit;
                // }
                //exit;
            }
        }else{

            //$slug = $this->getSlug($request);

            $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();
            //return response($dataType);
            // Check permission
            $this->authorize('add', app($dataType->model_name));

            $dataTypeContent = (strlen($dataType->model_name) != 0)
                                ? new $dataType->model_name()
                                : false;

            foreach ($dataType->addRows as $key => $row) {
                $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
            }

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'add');

            // Check if BREAD is Translatable
            $isModelTranslatable = is_bread_translatable($dataTypeContent);

            // Eagerload Relations
            $this->eagerLoadRelations($dataTypeContent, $dataType, 'add', $isModelTranslatable);

            //$view = 'voyager::bread.edit-add';
            $view = 'vendor.voyager.products.xml';

            // if (view()->exists("voyager::$slug.edit-add")) {
            //     $view = "voyager::$slug.edit-add";
            // }
            $colors = Color::get();
            $sizes = Size::get();    
            return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'colors', 'sizes'));


            //return view('vendor.voyager.products.edit-add');

        }
    }
    // public function xmlcom(Request $request){
    //     if ($request->isMethod('post')) {  

           
    //         $url = 'http://gercekspot.xmlbankasi.com/image/data/xml/alisveris.xml';
    //         // Read entire file into string 
    //         $xmlfile = file_get_contents($url); 
            
    //         // Convert xml string into an object 
    //         $new = simplexml_load_string($xmlfile); 
            
    //         // Convert into json 
    //         $con = json_encode($new); 
            
    //         // Convert into associative array 
    //         $newArr = json_decode($con, true); 

    //         // $json = '{"Product":[{"Product_code":[],"Barcode":"01900008017","Product_id":"2519","Name":[],"mainCategory":[],"mainCategory_id":[],"category":[],"category_id":[],"subCategory":[],"subCategory_id":[],"Price1":"37.8889","Price2":"31.5741","CurrencyType":"TRL","Tax":"8","Stock":"10","Brand":[],"Image1":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1607.jpg","Image2":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1602.jpg","Image3":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1606.jpg","Image4":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1603.jpg","Image5":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1006-erkek-v-yaka-1604.jpg","Description":[],"variants":{"variant":[{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"60"}],"variantId":"3","productCode":[],"barcode":[],"gtin":[],"quantity":"6","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"56"}],"variantId":"4","productCode":[],"barcode":[],"gtin":[],"quantity":"2","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"54"}],"variantId":"5","productCode":[],"barcode":[],"gtin":[],"quantity":"2","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]}]}},{"Product_code":[],"Barcode":[],"Product_id":"2520","Name":[],"mainCategory":[],"mainCategory_id":[],"category":[],"category_id":[],"subCategory":[],"subCategory_id":[],"Price1":"29.8889","Price2":"24.9074","CurrencyType":"TRL","Tax":"8","Stock":"252","Brand":[],"Image1":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/beyaz-berrak-1020-erkek-atlet-841.jpg","Image2":[],"Image3":[],"Image4":[],"Image5":[],"Description":[],"variants":{"variant":[{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"51"}],"variantId":"6","productCode":[],"barcode":[],"gtin":[],"quantity":"42","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"68"}],"variantId":"8","productCode":[],"barcode":[],"gtin":[],"quantity":"18","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"60"}],"variantId":"9","productCode":[],"barcode":[],"gtin":[],"quantity":"48","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"64"}],"variantId":"10","productCode":[],"barcode":[],"gtin":[],"quantity":"48","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"48"}],"variantId":"11","productCode":[],"barcode":[],"gtin":[],"quantity":"24","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"54"}],"variantId":"12","productCode":[],"barcode":[],"gtin":[],"quantity":"24","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Beyaz"},{"@attributes":{"name":"Beden"},"0":"45"}],"variantId":"13","productCode":[],"barcode":[],"gtin":[],"quantity":"48","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]}]}},{"Product_code":[],"Barcode":[],"Product_id":"2521","Name":[],"mainCategory":[],"mainCategory_id":[],"category":[],"category_id":[],"subCategory":[],"subCategory_id":[],"Price1":"36","Price2":"30","CurrencyType":"TRL","Tax":"8","Stock":"9","Brand":[],"Image1":"http:\/\/gercekspot.xmlbankasi.com\/image\/data\/resimler\/siyah-berrak-1022-erkek-siyah-atlet-904.jpg","Image2":[],"Image3":[],"Image4":[],"Image5":[],"Description":[],"variants":{"variant":[{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"60"}],"variantId":"14","productCode":[],"barcode":[],"gtin":[],"quantity":"4","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]},{"spec":[{"@attributes":{"name":"Renk"},"0":"Siyah"},{"@attributes":{"name":"Beden"},"0":"45"}],"variantId":"19","productCode":[],"barcode":[],"gtin":[],"quantity":"5","price":"0.00","hbSaticiStokKodu":[],"hbKodu":[],"picture":[]}]}}]}';
            
    //         // $newArr = json_decode($json, true); 
    //         foreach($newArr['Product'] as $key => $n){

    //             $catid = $request->category_id;
                
    //             $dbimagename = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml.jpg';
    //             $dbimagename_imgdetail = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml-imgdetail.jpg';
    //             $dbimagename_imggrid = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml-imggrid.jpg';
    //             $dbimagename_imgslider = 'products'.'\\'.date('F').date('Y').'\\'.$mikrotime.'xml-imgslider.jpg';
                
    //             $folderimagename = str_replace('\\', '/', $dbimagename);
    //             $folderimagename_imgdetail = str_replace('\\', '/', $dbimagename_imgdetail);
    //             $folderimagename_imggrid = str_replace('\\', '/', $dbimagename_imggrid);
    //             $folderimagename_imgslider = str_replace('\\', '/', $dbimagename_imgslider);
                
                
    //             $productid = $n['Product_id'];
    //             $title = empty($n['Name']) ? $productid : $n['Name'];
    //             $desc = empty($n['Description']) ? '' : $n['Description'];

    //             $p = new Product;
    //             $p->slug = $slug = Str::slug($title, '-');
    //             $p->category_id = $catid;
    //             $p->title_az = $title;
    //             $p->desc_az = $desc;
    //             $p->title_en = $title;
    //             $p->desc_en = $desc;
    //             $p->title_ru = $title;
    //             $p->desc_ru = $desc;
    //             $p->title_tr = $title;
    //             $p->desc_tr = $desc;
    //             $p->image = $dbimagename;
    //             $p->price = empty($n['Price1']) ? 0 : $n['Price1'];
    //             $p->saleprice = empty($n['Price2']) ? 0 : $n['Price2'];
    //             $p->stock = empty($n['Stock']) ? 0 : $n['Stock'];

    //             $p->save();

    //             $image = file_get_contents($n['Image1']);

    //             Storage::disk('local')->put('public/'.$folderimagename, $image);
    //             Storage::disk('local')->put('public/'.$folderimagename_imgdetail, $image);
    //             Storage::disk('local')->put('public/'.$folderimagename_imggrid, $image);
    //             Storage::disk('local')->put('public/'.$folderimagename_imgslider, $image);
    //             // if($key > 1) {
    //             //         exit;
    //             // }
    //             exit;
    //         }
    //     }else{

    //         //$slug = $this->getSlug($request);

    //         $dataType = Voyager::model('DataType')->where('slug', '=', 'products')->first();
    //         //return response($dataType);
    //         // Check permission
    //         $this->authorize('add', app($dataType->model_name));

    //         $dataTypeContent = (strlen($dataType->model_name) != 0)
    //                             ? new $dataType->model_name()
    //                             : false;

    //         foreach ($dataType->addRows as $key => $row) {
    //             $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
    //         }

    //         // If a column has a relationship associated with it, we do not want to show that field
    //         $this->removeRelationshipField($dataType, 'add');

    //         // Check if BREAD is Translatable
    //         $isModelTranslatable = is_bread_translatable($dataTypeContent);

    //         // Eagerload Relations
    //         $this->eagerLoadRelations($dataTypeContent, $dataType, 'add', $isModelTranslatable);

    //         //$view = 'voyager::bread.edit-add';
    //         $view = 'vendor.voyager.products.xml';

    //         // if (view()->exists("voyager::$slug.edit-add")) {
    //         //     $view = "voyager::$slug.edit-add";
    //         // }
    //         $colors = Color::get();
    //         $sizes = Size::get();    
    //         return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'colors', 'sizes'));


    //         //return view('vendor.voyager.products.edit-add');

    //     }
    // }
    
    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        
        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'add', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        // if (view()->exists("voyager::$slug.edit-add")) {
        //     $view = "voyager::$slug.edit-add";
        // }
        $colors = Color::get();
        $sizes = Size::get();    
        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'colors', 'sizes'));
    }

    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $model = $model->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $model = $model->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$model, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'edit', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }
        $colors = Color::get();
        $sizes = Size::get();
        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'colors', 'sizes'));
    }
}
