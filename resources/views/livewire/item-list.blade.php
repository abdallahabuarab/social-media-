{{-- resources/views/livewire/item-list.blade.php --}}

<div>
    @php
        use App\Models\User;
    @endphp
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        @include('frontend.body.header')

                        @include('frontend.body.rightsidebar')

                        <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="messages">
                                    <h5 class="f-title"><i class="ti-bell"></i>All Messages <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
                                    <div class="message-box">
                                        <ul class="peoples">
                                            @foreach ($users as $user)
                                                @if ($user->id != auth()->id())
                                                    {{-- do nothing, do not display myself --}}
                                                    <li>
                                                        <figure>
                                                            <img src="{{$user->profile_image}}" alt="">
                                                            <span class="status f-online"></span>
                                                        </figure>
                                                        <div class="people-name">
                                                            <span>{{$user->name}}</span>
                                                        </div>
                                                        <a href="{{ route('chat_with', $user->uuid) }}" class="float-right ml-auto"></a>
                                                    </li>
                                                @endif
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

    @include('frontend.body.footer')
</div>
