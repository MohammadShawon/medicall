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
                    <div class="ui col-lg-10 col-md-10 col-sm-12">
                        <div class="left-menu">
                            <form action="#" class="chat-search">
                                <input placeholder="search..." type="search" name="" id="">
                                <input type="submit" value="&#xf002;">
                            </form>
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
                        </div>
                        <div class="chat">
                            <div class="top">
                                <div class="avatar">
                                    <img width="50" height="50"
                                         src="http://cs625730.vk.me/v625730358/1126a/qEjM1AnybRA.jpg">
                                </div>
                                <div class="info">
                                    <div class="name">Юния Гапонович</div>
                                    <div class="count">already 1 902 messages</div>
                                </div>
                                <i class="fa fa-star"></i>
                            </div>
                            <ul class="messages">
                                <li class="i">
                                    <div class="head">
                                        <span class="time">10:13 AM, Today</span>
                                        <span class="name">Буль</span>
                                    </div>
                                    <div class="message">Привет!</div>
                                </li>
                            </ul>
                            <div class="write-form">
                                <textarea placeholder="Type your message" name="e" id="texxt" rows="2"></textarea>
                                <i class="fa fa-picture-o"></i>
                                <i class="fa fa-file-o"></i>
                                <span class="send">Send</span>
                            </div>
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