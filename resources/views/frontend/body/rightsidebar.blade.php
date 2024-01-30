<div class="col-lg-3">
    <aside class="sidebar stick-widget">
        <!-- page like widget -->
        <div class="widget">
            <div class="banner medium-opacity bluesh">
                <div class="bg-image" style="background-image: url(images/resources/baner-widgetbg.jpg)"></div>
                <div class="baner-top">
                    <span><img alt="" src="images/book-icon.png"></span>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
                <div class="banermeta">
                    <p>
                        create your own group.
                    </p>
                    <a data-ripple="" title="" href="{{route('group.create',['userid' => Auth::user()->id ])}}">Create now!</a>
                </div>
            </div>
        </div>
      <!-- friends list sidebar -->
    </aside>
</div><!-- sidebar -->
