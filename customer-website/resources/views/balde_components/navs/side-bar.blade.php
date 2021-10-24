<nav class="side-bar" id="side-bar" >
    <i id="cancel"> &times</i>
    <div class="top">
        <i class="fas fa-utensils"></i>
        <span>{{ setting('app_name') }}</span>
    </div>
    <div class="links">
        <ul>
            <li><a href="/"> <i class="fas fa-home "></i> &nbsp; {{__("Home")}}</a></li>
            <li><a href="/restaurants"><i class="fas fa-store "></i> &nbsp; {{__("Restaurants")}}</a></li>
            <li><a href="/foods"> <i class="fas fa-utensils "></i> &nbsp; {{__("Foods")}}</a></li>
            <li><a href="/help"><i class="fas fa-info "></i> &nbsp; {{__("About")}}</a></li>
            @guest
                <li><a href="/login"><i class="icon fas fa-sign-in-alt"></i> &nbsp; {{__("Login")}} </a></li>
            @else
                <li><a href="/wishlist"><i class="icon far fa-heart"></i> &nbsp; {{__("Favorites")}}  </a></li>
                <li><a href="/my-account"><i class="icon far fa-user"></i> &nbsp; {{__("My account")}} </a></li>
                <li><a  href="{{ route('logout') }}" 
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    ><i class="icon fas fa-door-open"></i> &nbsp;{{__("Logout")}} </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                </form>
           @endguest

            {{-- <li>
                <a class="drop_down_btn" href="#">pages <i class="fas fa-caret-down down"></i> </a>
                <ul>
                    <li> <a href="./index.html">index</a></li>
                    <li> <a href="./confirm-delivery.html">confirm</a></li>
                    <li> <a href="./grid-listing-filterscol-map.html">grid</a></li>
                <li> <a href="#">page4</a></li>
                </ul>
            </li> --}}

        </ul>
    </div>
</nav>