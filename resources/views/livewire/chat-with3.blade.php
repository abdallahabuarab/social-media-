<!-- new.blade.php -->

<div class="col-lg-6">
    <div class="central-meta">
        <div class="messages">
            <h5 class="f-title"><i class="ti-bell"></i>All Messages <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
            <div class="message-box">

                <div class="peoples-mesg-box">
                    <div class="conversation-head">
                        <figure><img src="{{asset('images/'.$user->profile_image)}}" alt=""></figure>
                        <span>{{ $user->name }}<i>online</i></span>
                    </div>
                    <ul class="chatting-area" wire:poll.keep-alive>
                        @forelse ($messages as $message)
                            @if ($message->friend_id == auth()->id())
                                <li class="me">
                                    <figure><img src="{{asset('images/'.auth()->user()->profile_image)}}" alt=""></figure>
                                    <p>{{ $message->message }}</p>
                                </li>
                            @else
                                <li class="you">
                                    <figure><img src="{{asset('images/'.$user->profile_image)}}" alt=""></figure>
                                    <p>{{ $message->message }}</p>
                                </li>
                            @endif
                        @empty
                            <li>No messages yet.</li>
                        @endforelse
                    </ul>
                </div>

                <div class="message-text-container">
                    <form wire:submit.prevent="send_message">
                        <textarea wire:model.lazy="message" id="new-message"></textarea>
                        <button title="send" type="submit"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Add Livewire script if not already included -->
<script>
    document.addEventListener('livewire:load', function () {
        let textContentScroll = document.querySelector('.chatting-area');
        textContentScroll.scrollTop = textContentScroll.scrollHeight;

        let textbox = document.getElementById('new-message');
        textbox.addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                Livewire.emit('send_message');
                e.preventDefault();
            }
        });

        Livewire.on('messageSent', function () {
            textContentScroll.scrollTop = textContentScroll.scrollHeight;
            textbox.value = '';
        });
    });
</script>
