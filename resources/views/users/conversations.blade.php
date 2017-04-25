@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
@include('users.partials.user-sidebar')
    <!--sidebar end-->
<!--main content start-->
<section id="main-content" class="main-content">
    <section class="wrapper">


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ui col-lg-8 col-md-18 col-sm-12">
                        <div class="left-menu">
                            <form action="#" class="chat-search">
                                <input placeholder="search..." type="search" name="" id="">
                                <input type="submit" value="&#xf002;">
                            </form>
                            @include('users.partials.peoplelist')
                        </div>
                        <div class="chat">
                            <div class="top">
                                <div class="avatar">
                                    @if(isset($user))
                                        <img src="{{@$user->photo}}" alt="avatar" />
                                    @endif
                                </div>
                                <div class="info">
                                    @if(isset($user))
                                        <div class="chat-with">{{'Chat with ' . @$user->name}}</div>
                                    @else
                                        <div class="chat-with">No Thread Selected</div>
                                    @endif
                                </div>
                                <i class="fa fa-star"></i>
                            </div>
                            <ul class="messages">
                                <li class="i">
                                    <div class="chat-history">
                                        <ul id="talkMessages">

                                            @foreach($messages as $message)
                                                @if($message->sender->id == auth()->user()->id)
                                                    <li class="clearfix" id="message-{{$message->id}}">
                                                        <div class="message-data align-right">
                                                            <span class="message-data-time" >{{$message->humans_time}} ago</span> &nbsp; &nbsp;
                                                            <span class="message-data-name" >{{$message->sender->name}}</span>
                                                            <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}" title="Delete Message"><i class="fa fa-close"></i></a>
                                                        </div>
                                                        <div class="message other-message float-right">
                                                            {{$message->message}}
                                                        </div>
                                                    </li>
                                                @else

                                                    <li id="message-{{$message->id}}">
                                                        <div class="message-data">
                                                            <span class="message-data-name"> <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}" title="Delete Messag"><i class="fa fa-close" style="margin-right: 3px;"></i></a>{{$message->sender->name}}</span>
                                                            <span class="message-data-time">{{$message->humans_time}} ago</span>
                                                        </div>
                                                        <div class="message my-message">
                                                            {{$message->message}}
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach


                                        </ul>

                                    </div>
                                </li>
                            </ul>
                            <form action="{{url('/ajax/message_send')}}" method="post" id="talkSendMessage">
                            <div class="write-form">
                                <textarea placeholder="Type your message" name="message-data" id="message-data" rows="2"></textarea>
                                <input type="hidden" name="_id" value="{{@request()->route('id')}}">
                                <i class="fa fa-picture-o"></i>
                                <i class="fa fa-file-o"></i>
                                <span class="send">Send</span>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</section>

<!--main content end-->

        @include('users.partials.user-footer')

        @endsection
@section('scripts')


    <script>
        var __baseUrl = "{{url('/')}}"
        var show = function(data) {
            alert(data.sender.name + " - '" + data.message + "'");
        }

        var msgshow = function(data) {
            var html = '<li id="message-' + data.id + '">' +
                '<div class="message-data">' +
                '<span class="message-data-name"> <a href="#" class="talkDeleteMessage" data-message-id="' + data.id + '" title="Delete Messag"><i class="fa fa-close" style="margin-right: 3px;"></i></a>' + data.sender.name + '</span>' +
                '<span class="message-data-time">1 Second ago</span>' +
                '</div>' +
                '<div class="message my-message">' +
                data.message +
                '</div>' +
                '</li>';

            $('#talkMessages').append(html);
        }
        {!! talk_live(['user'=>["id"=>auth()->user()->id, 'callback'=>['msgshow']]]) !!}


    </script>

    @endsection