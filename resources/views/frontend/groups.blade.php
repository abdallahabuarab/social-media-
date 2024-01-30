
@extends('frontend.main_master')
@section('header')
@include('frontend.body.header')
@endsection
@section('body')
<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="page-contents">
@include('frontend.body.rightsidebar') <!--here -->



            <!-- Tab panes -->
            <div class="col-lg-6">
                <div class="central-meta">
                    <div class="groups">
                        <span><i class="fa fa-users"></i> Groups</span>

                        <a href="{{route('group.create',['userid' => Auth::user()->id ])}}" title="" class="btn btn-success" data-ripple="">Create Group</a>
                    </div>

                    <ul class="nearby-contct">
                        @foreach ($groups as $group)

                        <li>
                            <div class="nearly-pepls">
                                <figure>
                                    <a href="time-line.html" title=""><img src="{{asset('images/'.$group->image)}}" alt=""></a>
                                </figure>
                                <div class="pepl-info">
                                    <h4><a href="time-line.html" title="">{{$group->name}}</a></h4>
                                    <em>{{$group->description}}</em>
                                    <a href="{{route('group.dashboard',$group->id)}}" title="" class="add-butn" data-ripple="">show</a>
                                </div>

                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- photos -->
            </div>
@include('frontend.body.liftsidebar')
</div>
</div>
</div>
</div>
</div>
@endsection


@section('footer')
@include('frontend.body.footer')
@endsection
