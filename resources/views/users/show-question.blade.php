@extends('users.layout')

@section('content')
    @include('users.partials.user-nav')
    <!--sidebar start-->
    @include('users.partials.user-sidebar')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" class="main-content">
        <section class="wrapper">
            <div class="panel-body">
                @foreach($posts as $post)

                    <div class="profile-activity">
                        <div class="act-time">
                            <div class="activity-body act-in">
                                <div class="text">
                                    {{--<a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>--}}
                                    @if($post->annonyms == true)
                                        <p>Annonyms</p>

                                    @else

                                        <p>{{$post->user->name }}</p>
                                    @endif
                                    <p class="attribution"><a href="#"></a> {{ $post->created_at->toTimeString() }}, {{ $post->created_at->toFormattedDateString() }}</p>
                                    <h3>{{ $post->title }}</h3>
                                    <p>{{ $post->body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $posts->links() }}
                    @endforeach

            </div>

        </section>
    </section>
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection