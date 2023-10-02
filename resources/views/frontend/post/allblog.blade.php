@extends('layouts.frontend')
@section('title',$category->meta_title)
@section('meta_description',$category->meta_description)
@section('meta_keyword',"$category->meta_keyword")
@section('content')
<section>
  <div class="container">
    <div class="row gy-5">
      <main class="col-lg-8"> 
        <div class="container">
          <div class="row gy-4 mb-5"> 
            @forelse($post as $post)
            <div class="col-xl-6"><a class="mb-3" href="{{route('blog.show',$post->slug)}}"><img class="img-fluid" src="{{ asset('uploads/category/' . $category->image) }}" width="200" height="200" alt="..."/></a>
              <div class="d-flex align-items-center justify-content-between mb-2"><small class="text-gray-500">{{$category->created_at->format('M Y')}}</small><a class="small fw-bold text-uppercase small" href="!#">{{$category->name}}</a></div>
              <h3 class="h4"><a class="text-dark" href="{{route('blog.show',$post->slug)}}">{{$post->name}}</a></h3>
              <p class="text-muted text-sm"></p>
              <ul class="list-inline list-separated text-gray-500 mb-0">
                <li class="list-inline-item"><a class="d-flex align-items-center flex-wrap text-reset" href="!#">
                    <div class="avatar flex-shrink-0"><img class="img-fluid" src="{{asset('uploads/users/' . $category->user->photo) }}" alt="..."/></div><small>{{$category->user->name}}</small></a></li>
                <li class="list-inline-item small"><i class="far fa-clock"></i> {{$category->created_at->format('M Y')}}</li>
              </ul>
            </div>
            @empty
                NO DATA AVAILABLE
            @endforelse
        </div>
      </main>
      @include('layouts.include.frontend-sidebar')
    </div>
  </div>
</section>
@endsection