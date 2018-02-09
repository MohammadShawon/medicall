<menu class="list-friends">
    {{--<li>--}}
    {{--<img width="50" height="50"--}}
    {{--src="http://cs625730.vk.me/v625730358/1126a/qEjM1AnybRA.jpg">--}}
    {{--<div class="info">--}}
    {{--<div class="user">Юния Гапонович</div>--}}
    {{--<div class="status on"> online</div>--}}
    {{--</div>--}}
    {{--</li>--}}



    @foreach($threads as $inbox)

        @if(!is_null($inbox->thread))
            <li class="">
                <a href="{{route('message.read', ['id'=>$inbox->withUser->id])}}">
                    <img src="{{$inbox->withUser->photo}}" alt="avatar" />
                    <div class="info">
                        <div class="user">{{$inbox->withUser->name}}</div>
                        <div class="status on">
                            @if(auth()->user()->id == $inbox->thread->sender->id)
                                <span class="fa fa-reply"></span>
                            @endif
                            <span>{{substr($inbox->thread->message, 0, 20)}}</span>
                        </div>
                    </div>
                </a>
            </li>
        @endif
    @endforeach

</menu>