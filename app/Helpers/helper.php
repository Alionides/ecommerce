<?php

if (!function_exists('menu_display')) {
    function menu_display($menuName, $type = null, array       
       $options = [])
    {
        return \App\Menu::display($menuName, $type, $options);
    }
}