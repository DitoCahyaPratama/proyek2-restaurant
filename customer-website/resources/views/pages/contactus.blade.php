@extends('layouts.master')



@section('content')
    <!-- side bar -->
    @include('balde_components.navs.side-bar')                       
    <!-- top nav bar -->
    @include('balde_components.navs.nav-bar-v2')

    <main class="m-16 min-h-screen">
        <div class="flex flex-col justify-center items-center h-96"  >
            <p class="text-black text-5xl font-semibold text-center">{{__("Comming soon")}}</p>
        </div>
    </main>
    
    @include('balde_components.footer')

@endsection