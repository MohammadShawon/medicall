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
                                    <a href="/ask/question/{{ $post->id }}">
                                       <h2>
                                           {{ $post->title }}
                                       </h2>
                                    </a>
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
                                                    {{ $comment->body }}  <a href="#" onclick="decline({{ $comment['id'] }})" class="talkDeleteMessage"  title="Delete Comment"><i class="fa fa-close"></i></a>
                                                </li>
                                                @endforeach
                                        </ul>

                                    </div>
                                    <hr>
                                </div>
                        </div>
                    </div>

                    @endforeach
                    {{ $posts->links() }}
            </div>



        </section>
    </section>
    <!--main content end-->

    @include('users.partials.user-footer')
@endsection


@section('scripts')
    <script>

        function decline(id) {
            if(!confirm("Are you sure?")) return;
            $.post('/ask/'+id+'/decline', {_token: '{{ csrf_token() }}'})
                .done(function (success) {
                    swal('SUCCESS!', success.message, 'success');
                })
                .fail(function (error) {
                    swal('ERROR!', 'Error Deleted Comments.', 'error');
                });
        }
    </script>

    @endsection