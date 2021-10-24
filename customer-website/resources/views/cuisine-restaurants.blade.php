
@extends('layouts.master')


@section('extraStyle')
    <link href="{{ asset('css/checkbox-radio-input.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- side bar --}}
        @include('balde_components.navs.side-bar')
    {{-- top nav bar --}}
        @include('balde_components.navs.nav-bar-v2')
    {{-- main content --}}
        <main class="w-full mt-16" >
            {{-- header --}}
                <header class="py-3  w-full md:h-24  bg-gray-100 ">
                    <div class="container flex flex-col md:flex-row md:justify-between items-center ">
                            <div class="hidden md:block">
                                <div class="text-black text-sm py-1 ">
                                    <a href="/" class="hover:text-gray-800 hover:no-underline">
                                        {{__("Home")}}
                                    </a> &nbsp; > &nbsp;
                                    <a href="#categorys" class="text-gray-800  hover:text-gray-800  hover:no-underline">
                                        {{__("Cuisine")}}
                                    </a> &nbsp; > &nbsp;
                                    <a href="/cuisine/{{$cuisine->id}}" class="text-green hover:text-green-400 hover:no-underline">
                                        {{$cuisine->name}}
                                    </a>
                                </div>
                                <p class="text-black font-medium text-lg py-1">
                                    {{__('Search for restaurants or foods')}}
                                </p>
                            </div>

                            <form action="/search" method="get"  class=" w-full h-12 md:w-2/5 md:h-4/6 bg-white flex flex-row rounded ">
                                {{-- @csrf --}}
                                <input id="search" type="search"  name="search"
                                    class="flex-1 bg-white outline-none p-3  rounded-l-sm"
                                    placeholder="{{__('Search for restaurants or foods')}} ..."
                                    autocomplete="off"
                                    required
                                >
                                <button type="submit" class="w-14 bg-green rounded-r-sm text-white"><i class="fas fa-search"></i></button>
                            </form>
                    </div>
                </header>
            {{-- header 2 --}}
                <div class="container w-full flex flex-col pt-4 ">
                    <span class="w-40 h-1 bg-green"></span>
                    <div class="flex items-center justify-between">
                        <h2 class="text-black font-bold text-4xl pt-4 pb-2">
                            {{__("Restaurants")}}
                        </h2>
                        <a id="foods" href="#categorys" class="nav-link text-white align-middle text-center bg-green rounded-3xl py-2 px-4 leading-6">
                            {{__("Total")}} {{count($restaurants)}}
                        </a>
                    </div>
                    <p class="text-gray-400">
                        {{__('Restaurants belong to cuisine')}} "{{$cuisine->name}}"
                    </p>
                </div>
            {{-- restaurants --}}
                <section class="container py-4 w-full flex flex-col lg:flex-row ">
                    <div class="w-full mt-3">
                        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 ">
                            @forelse ($restaurants as $restaurant)
                                <div class="box h-64 mt-1 w-full rounded">
                                    <div onclick="goToRestaurant({{$restaurant->id}})"  class="h-2/3 w-full relative cursor-pointer">
                                        <span class="absolute text-white rounded top-3 left-3  text-sm font-semibold  py-1 px-2 " style="background-color: #333;" >
                                            {{$cuisine->name}}
                                        </span>
                                        @if ($restaurant->closed)
                                            <span class="absolute text-white rounded top-3 right-3 text-sm font-semibold  py-1 px-2 bg-red-600 ">
                                                closed
                                            </span>
                                        @endif
                                        @if ($restaurant->getFirstMediaUrl('image') != "")
                                            <img src="{{$restaurant->getFirstMediaUrl('image')}}" alt="restaurant" class="h-full w-full rounded ">
                                        @else
                                            <img src="/images/restaurant-placeholder.png" alt="restaurant" class="h-full w-full rounded ">
                                        @endif
                                        <div class="absolute w-full overflow-hidden px-3 py-2.5 bottom-0 flex flex-col justify-center rounded-b-sm" style="background: rgba(92, 92, 92, 0.315);">
                                            <h2 class="text-white text-xl font-semibold truncate">
                                                {{$restaurant->name}}
                                            </h2>
                                            <p class="text-gray-100 text-xs">
                                                {{$restaurant->address}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="px-1 py-3 flex flex-row justify-between text-sm w-full">
                                        <span class="text-gray-400 flex-1 h-20 overflow-hidden">
                                            {!! $restaurant->description !!}
                                        </span>
                                        <div class="w-5/12 flex flex-row justify-end ">
                                            <div class="flex flex-col">
                                                <div class="text-gold flex-row flex justify-end items-center ">
                                                    <div class="bg-gray-200 py-1 px-2 rounded">
                                                        <span class="text-gray-700 font-semibold">
                                                        {{$restaurant->getRateAttribute()}}
                                                        </span>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-row  flex justify-end items-center mt-1 @if (! $restaurant->available_for_delivery) line-through text-gray-400 @else text-gray-600 @endif">
                                                    {{__("Delivery")}}
                                                    <i class="fas fa-motorcycle ml-1"></i>
                                                </div>
                                                <div class="flex-row  flex justify-end items-center mt-1 @if ($restaurant->closed) line-through text-gray-400 @else text-gray-600 @endif">
                                                    {{__("Take away")}}
                                                    <i class="fas fa-shopping-basket ml-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                    <div class="text-center font-bold text-3xl col-span-4 h-24 flex flex-row justify-center items-center">
                                        No restaurants is found
                                    </div>
                            @endforelse
                        </div>
                    </div>
                </section>
            {{-- pagination --}}
                <nav aria-label="Page navigation example" class="py-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item @if ($restaurants->onFirstPage()) disabled @endif">
                            <a class="page-link text-green hover:text-green-400" href="{{$restaurants->previousPageUrl()}}" tabindex="-1" aria-disabled="true">
                                {{__("Previous")}}
                            </a>
                        </li>
                        <li class="page-item ">
                            <p class="page-link cursor-default text-black hover:text-gray-600 hover:bg-transparent ">
                                {{__("Page")}} {{$restaurants->currentPage()}}
                                {{__("of")}} {{$restaurants->lastPage()}}
                            </p>
                        </li>

                        <li class="page-item  @if ($restaurants->currentPage() === $restaurants->lastPage()) disabled @endif">
                            <a class="page-link text-green hover:text-green-400 " href="{{$restaurants->nextPageUrl()}}">
                                {{__("Next")}}
                            </a>
                        </li>
                    </ul>
                </nav>
        </main>
    {{-- footer--}}
        @include('balde_components.footer')
@endsection

@section('extraJs')
    <script type="application/javascript">
        function goToRestaurant(restaurant_id){
            location.href=window.location.origin+'/restaurant/'+restaurant_id;
        }
    </script>
@endsection

