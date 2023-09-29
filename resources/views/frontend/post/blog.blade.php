@extends('layouts.frontend')
@section('title',$post->category->meta_title)
@section('meta_description',$post->category->meta_description)
@section('meta_keyword',$post->category->meta_keyword)
@section('title', 'Post')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row gy-5">
                <main class="col-lg-8">
                    <div class="container">
                        <img class="img-fluid mb-4"
                            src="{{ asset('uploads/category/' . $post->category->image) }}" width="500px" height="200px" alt="...">
                        <ul class="list-inline mb-3">
                            <li class="list-inline-item"><a class="text-uppercase" href="!#">{{ $post->category->name }}</a></li>
                        </ul>
                        <h1 class="mb-4">{{ $post->name }}<a href="!#"><i class="fa fa-bookmark-o"></i></a></h1>
                            <ul class="list-inline list-separated text-gray-500 mb-5">
                                <li class="list-inline-item"><a class="d-flex align-items-center flex-wrap text-reset" href="!#">
                                    <div class="avatar flex-shrink-0"><img class="img-fluid" src="{{asset('uploads/users/' . $post->user->photo)}}" alt="..."></div><small>{{$post->user->name}}</small></a></li>
                                        <li class="list-inline-item small"><i class="far fa-clock"></i> {{$post->created_at->format('M Y')}}</li>
                                        {{-- <li class="list-inline-item small"><i class="far fa-comment"></i> 12</li> --}}
                            </ul>
                        <div class="post-body">
                            <p class="lead"> {!! $post->category->description !!}</p>
                            <p class="mb-4"><img class="img-fluid"
                                    src="{{ asset('uploads/category/' . $post->category->image) }}" width="300px" height="200px" alt="..."></p>
                            <h3>{{ $post->name }}:</h3>
                            <div class="border-start border-4 mb-3">
                                <figure class="border p-4">
                                    <blockquote class="blockquote">
                                        <p>{!! $post->description !!}</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer mb-0">{{ $post->name }}
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <ul class="list-inline mb-5">
                            <li class="list-inline-item"><a class="tag" href="!#">#Business</a></li>
                            <li class="list-inline-item"><a class="tag" href="!#">#Tricks</a></li>
                            <li class="list-inline-item"><a class="tag" href="!#">#Financial</a></li>
                            <li class="list-inline-item"><a class="tag" href="!#">#Economy</a></li>
                        </ul>
                        <div class="mb-5">
                            <header>
                                <h3 class="h6 mb-4">Post Comments<span class="fw-light text-gray-600 small ms-2">({{ count($post->comments) }})</span></h3>
                            </header>
                            @if(count($post->comments) > 0)
                                @foreach($post->comments as $comment)
                                    <div class="d-flex align-items-start">
                                        <img class="img-fluid rounded-circle flex-shrink-0" src="{{ asset('uploads/users/' . $comment->user->photo) }}" alt="" width="50"/>
                                        <div class="pb-4 ms-3 border-bottom mb-4">
                                            <strong>{{ $comment->user->name }}</strong>
                                            <p class="small text-gray-500">{{ $comment->created_at->format('M Y') }}</p>
                                            <p class="mb-0 text-sm">{{ $comment->comment }}</p>
                                            <button class="btn btn-link btn-sm mt-2 reply-button" data-comment-id="{{ $comment->id }}">Reply</button>
                                            <div class="reply-form mt-2" style="display: none;">
                                                <form action="{{ route('blog.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3" name="comment" placeholder="Type your reply"></textarea>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="category_id" value="{{ $post->category->id }}">
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <input type="hidden" name="slug" value="{{ $post->slug }}">
                                                    <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                                                    <button type="submit" class="btn btn-secondary btn-sm">Submit Reply</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No comments posted yet.</p>
                            @endif
                        </div>
                        

                        <div class="mb-5">
                            <header>
                                <h3 class="h6 mb-4">Leave a reply</h3>
                            </header>
                            <form action="{{ route('blog.store') }}" method="POST">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-md-12">
                                        <div class="border-bottom">
                                            <textarea class="form-control px-0 border-0 shadow-0" rows="5" name="comment"
                                                id="comment" placeholder="Type your comment"></textarea>
                                        </div>
                                        @error('comment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" name="user_id"
                                            value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="category_id"
                                            value="{{ $post->category->id }}">
                                        <input type="hidden" name="post_id"
                                            value="{{ $post->id }}">
                                        <input type="hidden" name="slug"
                                            value="{{$post->slug}}">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-secondary" type="submit">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                @include('layouts.include.frontend-sidebar')
            </div>
        </div>
    </section>
@endsection
