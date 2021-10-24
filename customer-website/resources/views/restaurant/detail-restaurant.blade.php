@extends('layouts.master')

@section('extraStyle')
<link href="{{ asset('css/checkbox-radio-input.css') }}" rel="stylesheet">
<link href="{{ asset('css/detail-restaurant-tabs.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- side bar -->
    @include('balde_components.navs.side-bar')                       
    <!-- top nav bar -->
    @include('balde_components.navs.nav-bar-v2')
    
    <main class="w-full mt-16" >
        <!-- top banner  -->
		<div class="w-full relative" style="height: 65vh;">
            <!-- restaurant image -->
            <img src={{$restaurant_cover}}  alt="just an image" class="absolute object-cover top-0 left-0 w-full h-full">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>
            <!-- restaurant info -->
            <div class="relative container py-4 w-full h-full flex-col flex justify-end">
                <!-- restaurant rating -->
                <div class="text-base pt-1 mb-1.5 w-max flex flex-row items-end">
                    <div class="bg-black p-1 w-max rounded mr-1">
                        <span class="text-white p-1  font-semibold">
                            {{$restaurant->rate}}
                        </span>
                        <i class="fas fa-star text-gold"></i>
                    </div>
                    <em class="text-xs font-bold text-white">
                        {{count($restaurant->restaurantReviews)}} {{__("Reviews")}}
                    </em>
                </div>
                <!-- restaurant name -->
                <div class="text-white lg:text-5xl text-2xl font-semibold pt-1">
                    {{$restaurant->name}}
                </div>
                <!-- restaurant address && options -->
                <div class="text-white items-center text-base flex flex-col md:flex-row md:justify-between">
                   <div class="w-full mt-1 md:my-0 md:w-max">
                        {{$restaurant->address}}
                   </div>
                   <div class="w-full my-1 md:my-0 md:w-max">
                        <button onclick='window.open("https://www.google.com/maps/dir//{{$restaurant->latitude}},{{$restaurant->longitude}}/@${{$restaurant->latitude}},{{$restaurant->longitude}},15z")'
                        class="bg-white text-black px-3 py-2.5 rounded hover:text-gray-400 mr-1" > 
                            <i class="fas fa-route "></i>
                            {{__("Get directions")}} 
                        </button>
                   </div>
                </div>
            </div>
        </div>
        <!-- Restaurant details -->
        <restaurant-details 
            :restaurant_id={{$restaurant->id}} 
            @auth :idAuth={{auth()->id()}} @endauth 
            :currency_right={{setting('currency_right', false)}}
            :default_currency="`{{setting('default_currency')}}`"
        ></restaurant-details>
	</main>

    @include('balde_components.footer')
@endsection


@section('extraJs')
    <script>
        function show_make_orde(btn) {
            let div=btn.nextElementSibling;
            Array.from(document.querySelectorAll('.order')).forEach(element => {
                if(div !== element){
                    element.classList.add('hidden');
                } 
            });
            Array.from(document.querySelectorAll('.make_order')).forEach(element => {
                if(btn !== element){
                    element.classList.add('fa-plus');
                    element.classList.add('text-green');
                } 
            });

        
            div.classList.toggle('hidden');
            btn.classList.toggle('fa-plus');
            btn.classList.toggle('fa-times');
            btn.classList.toggle('text-green');
            btn.classList.toggle('text-red-500'); 
        }
        
        function addReply(btn) {
            let reply_box=btn.parentNode.parentNode.nextElementSibling;
            reply_box.classList.toggle('hidden');
            reply_box.classList.toggle('flex');
            if(btn.textContent !== 'cancel'){
                btn.textContent = 'cancel'
                btn.classList.remove('bg-gray-100');
                btn.classList.add('bg-red-500');
                btn.style.color = '#FFF'
            }else{
                btn.style.color = '#333'
                btn.classList.add('bg-gray-100');
                btn.classList.remove('bg-red-500');
                btn.innerHTML=' <i class="fas fa-reply mr-1"></i><span class="hidden md:block">Reply </span>'
            }
        }
    </script>
@endsection