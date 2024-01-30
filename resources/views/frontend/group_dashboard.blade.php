@extends('frontend.main_master')
@section('header')
@include('frontend.body.header')
@endsection

@section('bodyhead')
<section>
    <div class="feature-photo">
        <figure><img style="max-height: 300px;" src="{{asset('images/'.$groups->image)}}" alt=""></figure>
        <div class="add-btn">
            @if(!auth()->user()->groups->contains($groups))
            <form action="{{ route('groups.follow', $groups) }}" method="post">
                @csrf
                <button type="submit" class="follow-btn">Follow GROUP</button>
            </form>
            @else
            <form action="{{ route('groups.unfollow', $groups) }}" method="post">
                @csrf
                <button type="submit" class="follow-btn">Unfollow GROUP</button>
            </form>
            @endif
                </div>
                @if (Auth::user()->id==$groups->user_id)


                @endif
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <form class="edit-phto">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                    <input type="file"/>
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                              <h5>{{$groups->name}}</h5>
                            </li>
                            <li>
                                <a class="active" href="time-line.html" title="" data-ripple="">time line</a>
                                <a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
                                <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@section('body')
<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="page-contents">
@include('frontend.body.rightsidebar')


<div class="col-lg-6">
    <div class="loadMore">
        @if(auth()->user()->groups->contains($groups))


        @livewire('groups-component', ['GroupId' => $groups->id])

        @endif
    </div>
</div>

@include('frontend.body.liftsidebar')
</div>
</div>
</div>
</div>
</div>
@endsection

@endsection

@section('footer')
@include('frontend.body.footer')
@endsection
