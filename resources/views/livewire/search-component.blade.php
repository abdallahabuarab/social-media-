    <div>

        <div class="top-search">
            <form  class="">
                <input wire:model.live="query" type="text" placeholder="Search...">
                <button data-ripple><i class="ti-search"></i></button>
            </form>


        <ul class="list-group mt-3">
            @if($users)
            @foreach($users as $user)
          <a href="{{route('profilee',['userid' => $user->id ])}}"><li class="list-group-item">user :{{ $user->name }}</li></a>
            @endforeach
            @endif

            @if($groups)
                @foreach($groups as $group)
                 <a href="{{route('group.dashboard',$group->id)}}">  <li class="list-group-item">group: {{ $group->name }}</li></a>
                    @endforeach
                    @endif
        </ul>



    </div>




    {{-- <div class="top-area">
        <div class="top-search">
            <form method="post" class="">
                <input type="text" placeholder="Search Friend">
                <button data-ripple><i class="ti-search"></i></button>
            </form>
        </div> --}}
