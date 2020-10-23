<?php
if(!function_exists("getTheme")){
    function getTheme(){
        return Cookie::get('temaCookie');
    }
}