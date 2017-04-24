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
                    <div class="panel-body">

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
                                    <hr>
                                    <p>Comments:</p>
                                    <div class="comments">
                                        <ul class="list-group">
                                            @foreach($post->comments as $comment)
                                                <li class="">
                                                    <strong>
                                                        {{ $comment->created_at->diffForHumans() }} :
                                                    </strong>
                                                    {{ $comment->body }}
                                                   [ {{ $comment->user->name }} :
                                                   ( {{ $comment->user->role }}) ]
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        {{-- Add Comment--}}
                        <div class="card">
                            <div class="card-block">
                                <form method="post" action="/ask/question/{{ $post->id }}/comments">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-md-8">
                                        <textarea name="body" id="commentbody" placeholder="Leave Your Comment" cols="30" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <button type="submit" style="margin-top: 5px;" class="btn btn-primary pull-right">
                                               Add Comment
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


            </div>

        </section>
    </section>
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection