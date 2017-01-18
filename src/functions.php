<?php

if ( ! function_exists('setLanguage')) {
    function setLanguage(){
        App::setLocale( session('locale') ? session('locale') : config('app.locale'));
        if(App::getLocale() == 'fr')
            setlocale(LC_TIME, 'fr_CH.UTF-8');
    }
}

if ( ! function_exists('isUserAdmin')) {
    function isUserAdmin(){
        if(Auth::guest())
            return false;
        else {
            return (Auth::user()->type);
        }
    }
}