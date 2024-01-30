<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="widget">
            <h4 class="widget-title">Shortcuts</h4>
            <ul class="naves">
                <li>
                    <i class="ti-clipboard"></i>
                    <a href="{{route('home')}}" title="">News feed</a>
                </li>


                <li>
                    <i class="ti-user"></i>
                    <a href="{{route('friends',['userid' => Auth::user()->id ])}}" title="">friends</a>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <a href="{{route('group.index')}}" title="">groups</a>
                </li>


                <li>
                    <i class="ti-comments-smiley"></i>
                    <a href="{{route('chat.index',['userid' => Auth::user()->id ])}}" title="">Messages</a>
                </li>



                <li>
                    <i class="ti-power-off"></i>
                    <a href="{{ route('logout') }}" title=""
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div><!-- Shortcuts -->
        @livewire('people-you')
    </aside>
</div><!--
