@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left: 40px;" @endif>
        <div class="comment-header d-flex align-items-center">
            <img src="{{ asset('uploads/users/' . $comment->user->photo) }}" alt="User Image" class="img-fluid rounded-circle" width="30">
            <strong class="px-2">{{ $comment->user->name }}</strong>
        </div>
        <div class="comment-body bg-light p-3">
            <p>{{ $comment->body }}</p>
        </div>
        <div class="comment-footer mt-3">
            <form method="post" action="{{ route('blog.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" rows="2" name="body" placeholder="Type your reply"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="slug" value="{{ $post_slug }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-secondary btn-sm mt-2" value="Reply" />
                </div>
            </form>
        </div>
        <hr class="mt-3" />
        @include('frontend.post.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
