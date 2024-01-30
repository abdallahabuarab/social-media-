<div class="responsive-header">
    <div class="mh-head first Sticky">
        <span class="mh-btns-left">
            <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
        </span>
        <span class="mh-text">
            <a href="newsfeed.html" title=""><img src="{{asset('frontend/assets/images/orange.png')}}" alt="Orange" style=" height: 3rem;"></a>
        </span>
        <span class="mh-btns-right">
            <a class="fa fa-sliders" href="#shoppingbag"></a>
        </span>
    </div>
     <div class="mh-head second">
        <form class="mh-form">
            <input placeholder="search" />
            <a href="#/" class="fa fa-search"></a>
        </form>
    </div>
</div>
<div class="topbar stick">
    <div class="logo">
        <a title="" href="{{route('home')}}"><img src="{{asset('frontend/assets/images/orange.png')}}" alt="Orange" style=" height: 3rem;"></a>
    </div>
    <div class="top-area">
@livewire('search-component')
    </div>
    {{-- <div class="top-area">
        <div class="top-search">
            <form method="post" class="">
                <input type="text" placeholder="Search Friend">
                <button data-ripple><i class="ti-search"></i></button>
            </form>
        </div> --}}
        <ul class="setting-area">
            <li><a href="{{route('home')}}" ><i class="ti-home"></i></a></li>

            <li>
                <a href="{{ route('chat.index', ['userid' => Auth::user()->id]) }}" title="Messages" data-ripple=""><i class="ti-comment"></i></a>


            </li>

        </ul>
        <div class="user-img">
            <img src="{{asset('images/'.Auth::user()->profile_image)}}" alt="" style="width: 50px;">
            <span class="status f-online"></span>
            <div class="user-setting">
                <a href="#" title=""><span class="status f-online"></span>online</a>
                <a href="#" title=""><span class="status f-away"></span>away</a>
                <a href="#" title=""><span class="status f-off"></span>offline</a>
                <a href="{{route('profilee',['userid' => Auth::user()->id ])}}" title=""><i class="ti-user"></i> view profile</a>
                <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a>
                <a href="#" title=""><i class="ti-target"></i>activity log</a>
                <a href="#" title=""><i class="ti-settings"></i>account setting</a>
                <a href="{{ route('logout') }}" title=""><i class="ti-power-off"></i>log out</a>
            </div>
        </div>
    </div>
</div>
