@php
    use App\Models\User;

@endphp
@extends('frontend.main_master')
@section('header')
@include('frontend.body.header')
@endsection
@section('bodyhead')
<section>
    <div class="feature-photo">
        <figure><img src="{{asset('images/cover-default.png')}}" alt=""></figure>
        <div class="add-btn">




            {{-- <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">Add Friend</a> --}}

        @php
        $buttonPrinted = false;
        @endphp
        @if ($profile->id == Auth::user()->id)

       @else
       @if ($profile->friends !== null)

       @foreach ($profile->friends as $key)
  @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending')
  <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">cancel request</a>
      @php
      $buttonPrinted = true;
      break;
  @endphp
  @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'accepted')
  <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">remove Friend</a>

      @php
          $buttonPrinted = true;
          break;
      @endphp
       @endif
@endforeach
@if (!$buttonPrinted)
<a href="{{ route('homee', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">Add Friend </a>
@endif
@endif
       @endif
</div>
<form class="edit-phto" action="{{route('coverImage')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Edit Cover Photo
            <input type="file" name="profile_image"/>

            </label>
            <input type="hidden" name="id" value="{{$profile->id}}" />
            <input type="submit" value=" Upload Image" />
        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="{{asset('images/'.$profile->profile_image)}}" alt="">
                            <form class="edit-phto" action="{{route('profileImage')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                    <input type="file" name="profile_image" />
                                    <input type="hidden" name="id" value="{{$profile->id}}" />
                                </label>
                                    <button type="submit" value="Upload Image">Upload Image</button>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                              <h5>{{$profile->name}}</h5>
                              @if (session()->has('info'))
                              <span>
                                  {{session('info')}}
                            </span>
                            @endif
                            </li>
                            <li>
                                <a class="" href="{{route('profilee',['userid' => Auth::user()->id ])}}" title="" data-ripple="">time line</a>
                                {{-- <a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
                                <a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a> --}}
                                <a class="" href="{{route('friends',['userid' => Auth::user()->id ])}}" title="" data-ripple="">Friends</a>
                                <a class="active" href="{{route('chat.index',['userid' => Auth::user()->id ])}}" title="" data-ripple="">Messeges</a>
                                {{-- <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a> --}}
                                {{-- <a class="" href="#" title="" data-ripple="">more</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('body')
<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="page-contents">
@include('frontend.body.rightsidebar')



<div class="col-lg-6">
    <div class="central-meta">
        <div class="messages">
            <h5 class="f-title"><i class="ti-bell"></i>All Messages <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
            <div class="message-box">
                <ul class="peoples">
@foreach ($users as $user)

<li>
    <a href="{{ route('chat_with',$user->uuid) }}">
        <figure>
            <img src="{{$user->profile_image}}" alt="">
            <span class="status f-online"></span>
        </figure>
        <div class="people-name">
            <span>{{$user->name}}</span>
        </div>
    </a>
</li>

@endforeach

                </ul>

            </div>
        </div>
    </div>
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
