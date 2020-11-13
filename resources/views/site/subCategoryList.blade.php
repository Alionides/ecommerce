@php
    $ln = App::getLocale();
    $title = 'title_'.$ln;
@endphp
@foreach($subcategories as $subcategory)
<li class="mega-menu-col col-lg-3">
    <ul> 
        <li class="dropdown-header"><a class="nav_item" href="/{{ Config('app.locale') }}/{{$category->slug}}/{{$subcategory->slug}}">{{$subcategory->$title}}</a></li>
        @if(count($subcategory->subcategory))
            @include('site.subSubCategoryList',['subsubcategories' => $subcategory->subcategory])
        @endif
    </ul>
</li>
@endforeach