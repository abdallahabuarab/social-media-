<div>
    @php
        use App\Models\User;
    @endphp
    @extends('frontend.main_master')

    @section('header')
        @include('frontend.body.header')
    @endsection

    @section('bodyhead')
        <section>
            <!-- ... (your existing code) ... -->
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
                                @foreach ($users as $user)

<li>
    <a href="{{ route('chat_with', $user->uuid) }}">
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
</div>
