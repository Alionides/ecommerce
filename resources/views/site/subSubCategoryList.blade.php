@php
    $ln = App::getLocale();
    $title = 'title_'.$ln;
@endphp
@foreach($subsubcategories as $subsubcategory)
        <li><a class="dropdown-item nav-link nav_item" href="/{{ Config('app.locale') }}/{{$category->slug}}/{{$subcategory->slug}}/{{$subsubcategory->slug}}">{{$subsubcategory->$title}}</a></li>
@endforeach