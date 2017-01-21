<?php

if ( ! function_exists('setLanguage')) {
    function setLanguage(){
        App::setLocale( session('locale') ? session('locale') : config('app.locale'));
        if(App::getLocale() == 'fr')
            setlocale(LC_TIME, 'fr_CH.UTF-8');
    }
}
