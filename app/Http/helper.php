<?php

if(!function_exists('aurl')){
    function aurl($url=null){
        return url('admin/'.$url);
    }
}

if(!function_exists('admin')){
    function admin(){
        return auth()->guard('admin');
    }
}

if(!function_exists('doctor')){
    function doctor(){
        return auth()->guard('instructor');
    }
}

if(!function_exists('student')){
    function student(){
        return auth()->guard('student');
    }
}