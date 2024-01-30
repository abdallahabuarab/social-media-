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
            @php
            $buttonPrinted = false;
            @endphp
            @if ($profile->id == Auth::user()->id)

           @else

           @if ($profile->friends !=null)
           @else

           @if ($profile->friends !=null)

           @foreach ($profile->friends as $key )


           @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending'&& $key['type']=='res' )
            <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">cancel request</a>
          @php
          $buttonPrinted = true;
          break;
        @endphp
      @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'accepted')
      <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">remove Friend</a>
           @foreach ($profile->friends as $key )


           @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending'&& $key['type']=='res' )
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
      @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'pending' && $key['type']=='sent')
      <a href="{{ route('accept', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">confirm</a>
      <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="" style="color: white;">Reject</a>

          @php
              $buttonPrinted = true;
              break;
          @endphp


           @endif
    @endforeach
           @endif
    @if (!$buttonPrinted)
    <a href="{{ route('homee', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">Add Friend </a>
    @endif
    @endif
       </div>
          @php
              $buttonPrinted = true;
              break;
          @endphp
      @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'pending' && $key['type']=='sent')
      <a href="{{ route('accept', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">confirm</a>
      <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="" style="color: white;">Reject</a>

          @php
              $buttonPrinted = true;
              break;
          @endphp


           @endif
    @endforeach
           @endif
    @if (!$buttonPrinted)
    <a href="{{ route('homee', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">Add Friend </a>
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
                                <a class="active" href="{{route('friends',['userid' => Auth::user()->id ])}}" title="" data-ripple="">Friends</a>
                                <a class="" href="{{route('chat.index',['userid' => Auth::user()->id ])}}" title="" data-ripple="">Messeges</a>                                {{-- <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a> --}}
                                <a class="active" href="{{route('friends',['userid' => Auth::user()->id ])}}" title="" data-ripple="">Friends</a>
                                <a class="" href="{{route('chat.index',['userid' => Auth::user()->id ])}}" title="" data-ripple="">Messeges</a>                                {{-- <a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a> --}}
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
        <div class="frnds">
            <ul class="nav nav-tabs">
                 <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a>{{-- <span>55</span>--}} </li>
                 <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a>{{--<span>60</span> --}}</li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active fade show " id="frends" >
                <ul class="nearby-contct">
                    @if ($profile->friends !== null)
                    @foreach ($profile->friends as $key )
                    @if ($key['status'] == 'pending')
                    @else
                    @php
                        $user=User::find($key['userid']);
                    @endphp
                        <li>
                            <div class="nearly-pepls">
                        <figure>
                            <a href="{{route('profilee',['userid' => $user->id ])}}" title=""><img src="{{asset('images/'. $user->profile_image)}}" alt=""></a>
                        </figure>
                        <div class="pepl-info">
                            <h4><a href="{{route('profilee',['userid' => $user->id ])}}" title="">{{$user->name}}</a></h4>
                            <span>{{$user->email}}</span>
                            <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $user->id]) }}" title="" class="add-butn more-action" data-ripple="">unfriend</a>
                            {{-- <a href="#" title="" class="add-butn" data-ripple="">add friend</a> --}}
                        </div>
                    </div>
                </li>
                @endif
                 @endforeach
                @endif




            </ul>
                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
              </div>
              <div class="tab-pane fade" id="frends-req" >
                <ul class="nearby-contct">
                    @if (session('info'))
                        <h1>{{session('info')}}</h1>
                    @endif
                    @if ($profile->friends !== null)
            @foreach ($profile->friends as $friend )
                    @if ( $friend['status'] == 'pending' && $friend['type']=='res' )
                    @if ( $friend['status'] == 'pending' && $friend['type']=='res' )

                    @php
                        $user2=User::find($friend['userid']);
                    @endphp
                <li>
                    <div class="nearly-pepls">
                        <figure>
                            <a href="{{route('profilee',['userid' => $user2->id ])}}" title=""><img src="{{asset('images/'.$user2->profile_image)}}" alt=""></a>
                        </figure>
                        <div class="pepl-info">
                            <h4><a href="{{route('profilee',['userid' => $user2->id ])}}" title="">{{$user2->name}}</a></h4>
                            <span>{{$user2->email}}</span>
                            <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $user2->id]) }}" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                            <a href="{{ route('accept', ['userid' => Auth::user()->id, 'userid2' => $user2->id]) }}" title="" class="add-butn" data-ripple="">Confirm</a>
                        </div>
                    </div>
                </li>
                    @endif
  @endforeach
@endif




            </ul>
                  <button class="btn-view btn-load-more"></button>
              </div>
            </div>
        </div>
    </div>
</div><!-- centerl meta -->

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

