<div id="recent-activity" class="tab-pane active">
    <div class="profile-activity">
        <div class="act-time">
            <div class="activity-body act-in">
                <span class="arrow"></span>
                    @foreach($user->post as $post)

                        {{--{{ dd($post->title) }}--}}
                <div class="text">

                    @if($post->annonyms == true)
                        <p>Annonyms</p>

                    @else

                        <p>{{$post->user->name }}</p>
                    @endif
                    <p class="attribution"><a href="#"></a> {{ $post->created_at->toTimeString() }}, {{ $post->created_at->toFormattedDateString() }}</p>
                    <a href="ask/question/{{ $post->id }}">
                        <h3>
                            {{ $post->title }}
                        </h3>
                    </a>
                    <p>{{ $post->body }}</p>
                    <hr>

                    <div class="comments">
                        <ul class="list-group">
                            <p>Comments</p>
                            @foreach($post->comments as $comment)
                                <li class="">
                                    {{ $comment->body }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                </div>
                        @endforeach

            </div>
        </div>


    </div>
</div>