<?php

use Illuminate\Support\Facades\Cookie;

if(!function_exists("getTheme")){
    function getTheme(){
        return @$_COOKIE['temaCookie'];
    }
}