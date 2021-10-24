<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- fonts --}}
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        {{-- title of the site --}}
        <title>{{ setting('app_name') }} @yield('title')</title>
        {{-- tab icon --}}
        <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon"/>
        {{-- bootstrap css --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- tailwind css --}}
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        {{-- costume style --}}
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        {{-- google_maps_key from database --}}
        <script type="text/javascript" defer>const google_maps_key = "<?php echo setting('google_maps_key');?>"; </script>
        @yield('extraStyle')
        <style>
            :root {
                --main_color: {{setting('main_color')}};
            }
            
            #login-tab.active,
            #sign-tab.active {
                background-color:var(--main_color);
                color: #fAfAfA
            }

            .text-green , nav.side-bar .links ul li a.active ,.nav-link:hover ,.filter ul li a:hover ,
            .filter ul li a.avtive ,.filter ul ul li label:hover,
            #myTab li a.active,
            .top-dropdown-menu .dropdown-item:hover,nav.side-bar .links ul li a:hover {
                color:var(--main_color);
            }

            .input_radio input:checked ~ .checkmark ,.bg-green , nav.side-bar .top ,
            .slider-container .bar .fill,.input_radio input:checked ~ .checkmark
           ,#payment-tabs > .nav-item > a.active,#tab.active 
            .input_radio input:checked ~ .checkmark,.input_checkbox input:checked ~ .input_checkbox_checkmark{
                background-color:var(--main_color) ;
            }
             
            #distance::-webkit-slider-thumb,.range_v2::-webkit-slider-thumb {border: 2px solid var(--main_color);}
            .border-green{border:solid var(--main_color);}
            nav.side-bar .links ul li a:hover {border-left-color: var(--main_color);}            
            .top-dropdown-menu .dropdown-item:hover{border-left: 3px solid var(--main_color);}
            #myTab li a.active {border-bottom-color: var(--main_color);}

            .checkmark-circle ,.checkmark {
                stroke: var(--main_color);
                box-shadow:var(--main_color);
            }
            @-webkit-keyframes fill, {100% {box-shadow: inset 0px 0px 0px 10px var(--main_color);}}
            @keyframes fill {100% {box-shadow: inset 0px 0px 0px 10px var(--main_color);}}

            #banner_search_input {width: 800px;}
            #banner_search_input > input {max-width: 95%;}
            @media screen and (max-width: 850px) {#banner_search_input {width: 600px;}}
            @media screen and (max-width: 750px) {#banner_search_input {width: 500px;}}
            @media screen and (max-width: 650px) {#banner_search_input {width: 400px;}}
            @media screen and (max-width: 550px) {#banner_search_input {width: 300px;}}
            @media screen and (max-width: 350px) {#banner_search_input {width: 200px;}}
            
            #gl{
                z-index: 1000;
                top: 0px;
                left:0px;
                position: fixed;
                width: 100vw;
                height: 100vh;
                background-color: rgba(26, 26, 26, 0.8);
            }
        </style>
    </head>
    <body>
        <div id="app">
            <button type="button" id="top" class="z-50 hidden bg-green text-white text-2xl py-1 px-2 rounded-full outline-none border-none fixed bottom-2 right-5">
                <i class="fas fa-chevron-up"></i>
            </button>
            @yield('content')
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/costum-slick.js')}}"></script>  
        @yield('extraJs')
        @error('search')
                <script type="application/javascript">
                    Vue.notify({
                        group: 'foo',
                        type: 'error',
                        title: 'Important',
                        text: 'The search filed is required and The search filed may not be greater than 50 characters.'
                    })
                </script>
        @enderror
        @if ( request('lang') )
            <script type="application/javascript">
                var lang =window.location.search.slice(6,8);
                localStorage.setItem('MIX_VUE_APP_I18N_LOCALE', lang);
                location.href=`${location.origin}${location.pathname}`
            </script>
        @endif
    </body>
</html>
