@extends('frontend.main_master')
@section('header')
@include('frontend.body.header')
@endsection

@section('bodyhead')
    <section>
        <div class="feature-photo">

            <figure><img src="{{ asset('images/' . $profile->profile_cover) }}" alt=""></figure>
            <div class="add-btn">




                {{-- <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}" title="" data-ripple="">Add Friend</a> --}}

                @php
                    $buttonPrinted = false;
                @endphp
                @if ($profile->id == Auth::user()->id)
                @else
                    @if ($profile->friends != null)
                        @foreach ($profile->friends as $key)
                            @if ($key['userid'] == Auth::user()->id && $key['status'] == 'pending' && $key['type'] == 'res')
                                <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}"
                                    title="" data-ripple="">cancel request</a>
                                @php
                                    $buttonPrinted = true;
                                    break;
                                @endphp
                            @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'accepted')
                                <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}"
                                    title="" data-ripple="">remove Friend</a>

                                @php
                                    $buttonPrinted = true;
                                    break;
                                @endphp
                            @elseif ($key['userid'] == Auth::user()->id && $key['status'] == 'pending' && $key['type'] == 'sent')
                                <a href="{{ route('accept', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}"
                                    title="" data-ripple="">confirm</a>
                                <a href="{{ route('cancel', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}"
                                    title="" data-ripple="" style="color: white;">Reject</a>

                                @php
                                    $buttonPrinted = true;
                                    break;
                                @endphp
                            @endif
                        @endforeach
                    @endif
                    @if (!$buttonPrinted)
                        <a href="{{ route('homee', ['userid' => Auth::user()->id, 'userid2' => $profile->id]) }}"
                            title="" data-ripple="">Add Friend </a>
                    @endif
                @endif
            </div>
            @if (Auth::user()->id == $profile->id)
                <form class="edit-phto" action="{{ route('coverImage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <i class="fa fa-camera-retro"></i>

                    <label class="fileContainer">
                        Edit Cover Photo
                        <input type="file" name="profile_image" />

                    </label>
                    <input type="hidden" name="id" value="{{ $profile->id }}" />
                    <input type="submit" value=" Upload Image" />
                </form>
            @endif
            <div class="container-fluid">
                <div class="row merged">
                    <div class="col-lg-2 col-sm-3">
                        <div class="user-avatar">
                            <figure>
                                <img src="{{ asset('images/' . $profile->profile_image) }}" alt="">
                                @if (Auth::user()->id == $profile->id)
                                    <form class="edit-phto" action="{{ route('profileImage') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <i class="fa fa-camera-retro"></i>
                                        <label class="fileContainer">
                                            Edit Display Photo
                                            <input type="file" name="profile_image" />
                                            <input type="hidden" name="id" value="{{ $profile->id }}" />
                                        </label>
                                        <input type="submit" value="update Image" />

                                    </form>
                                @endif
                            </figure>
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $key)
                                        <li style="color: red">{{ $key }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9">
                        <div class="timeline-info">
                            <ul>
                                <li class="admin-name">
                                    <h5>{{ $profile->name }}</h5>
                                    @if (session()->has('info'))
                                        <span>
                                            {{ session('info') }}
                                        </span>
                                    @endif
                                </li>
                                <li>
                                    <a class="" href="{{ route('profilee', ['userid' => Auth::user()->id]) }}"
                                        title="" data-ripple="">time line</a>
                                    <a class="" href="{{ route('friends', ['userid' => Auth::user()->id]) }}"
                                        title="" data-ripple="">Friends</a>
                                    <a class="" href="{{ route('chat.index', ['userid' => Auth::user()->id]) }}"
                                        title="" data-ripple="">Messeges</a>

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
<form action="{{ route('group.store') }}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="groupDescription">Group Name</label>
        <input name="name" style="background-color: white" id="groupDescription" rows="3" placeholder="Enter group name">
      </div>
      <div class="form-group col-md-6">
        <label for="groupDescription">image:</label>
        <input type="file" name="image" style="background-color: white" id="groupDescription" rows="3" placeholder="Enter group description">
      </div>
      <div class="form-group col-md-6">
        <label for="groupDescription">Group Description:</label>
        <textarea name="description" style="background-color: white" id="groupDescription" rows="3" placeholder="Enter group description"></textarea>
      </div>

    </div>


    <button type="submit" class="btn btn-primary">Create</button>
</form>
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
