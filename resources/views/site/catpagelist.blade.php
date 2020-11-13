@foreach($subcategories as $subcat)
<li><a href="/{{ Config('app.locale') }}/{{$breadcrumb}}/{{$subcat->slug}}"><span class="categories_name">{{$subcat->$title}}</span><span class="categories_num">({{count($subcat->products)+count($subcat->subproducts)}})</span></a></li>
@endforeach