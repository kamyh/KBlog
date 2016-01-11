@foreach(\App\Comment::getComments($post->id) as $comment)
    @if(!$comment->isPrincipal())
        <div class="jumbotron">

            <h3>{{$comment->name}} <span class="comment-date">{{$comment->niceDate()}}</span></h3>
            <div class="btn-group btn-group-xs reply" role="group">
                <button onclick="comment('a_{{$comment->id}}')" type="button" class="btn btn-default">reply</button>
            </div>
            <p>{{$comment->text}}</p>

            @include('comment.post_comment',['type' => 'a_'])

            @foreach($comment->getSubComments() as $sub)
                <div class="jumbotron sub">
                    <h3>{{$sub->name}}</h3>
                    <div class="btn-group btn-group-xs reply" role="group">
                        <button onclick="comment('b_{{$comment->id}}')" type="button" class="btn btn-default">reply</button>
                    </div>
                    <p>{{$sub->text}}</p>

                    @include('comment.post_comment',['type' => 'b_'])

                    @foreach($sub->getSubComments() as $sub)
                        <div class="jumbotron sub">
                            <h3>{{$sub->name}}</h3>
                            <p>{{$sub->text}}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif
@endforeach