<div class="widget stick-widget">
    <h4 class="widget-title">Who's follownig</h4>
    <ul class="followers">

        @if ($users)


        @foreach ($users as $user )
        @if ($user->id == Auth::user()->id)

        @else
        <li>
            <figure><img src="{{asset('images/'.$user->profile_image)}}" alt=""></figure>
            <div class="friend-meta">
                <h4><a href="{{route('profilee',['userid' => $user->id ])}}" title="">{{$user->name}}</a></h4>
                <a href="" wire:click="update({{ Auth::user()->id }},{{$user->id}})" title="" class="underline">Add Friend</a>
            </div>
        </li>
        @endif
        @endforeach
        @endif
    </ul>
</div>
