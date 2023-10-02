@extends('layouts.frontend')
@section('title','User | Home')
@section('content')
<section class="hero position-relative" style="background: url('{{ asset('assets/images/hero.jpg') }}'); background-size: cover; background-position: center center">
    <div class="container text-white py-5">
        <div class="row py-lg-5">
        <div class="col-lg-7">
            <h1>My Blog - Use words and phrases that resonate with your audience. </h1><a class="link-underline mt-3" href="#!">Discover More</a>
        </div>
        </div><a class="continue text-gray-400 position-absolute bottom-0 mb-5 z-index-20 link-transition small text-uppercase" href="#intro"><i class="fas fa-long-arrow-alt-down"></i> Scroll Down</a>
    </div>
</section>
<section id="intro">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2 class="h3">Some great intro here</h2>
          <p class="text-lg fw-light lh-lg mb-0">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
        </div>
      </div>
    </div>
  </section>

<div class="container mb-5">
  @foreach ($categories as $index => $category)
    <div class="row d-flex align-items-stretch g-0 mt-2">
      <div class="col-lg-7">
        <div class="text-inner d-flex align-items-center h-100 bg-light">
          <div class="content px-4 px-lg-5">
            <ul class="list-inline mb-1">
              <li class="list-inline-item"><a class="text-uppercase text-dark small fw-bold" href="!#">{{$category->name}}</a></li>
            </ul>
            <h2 class="h4 mb-3"><a class="text-dark" href="{{route('allCategory.show',$category->slug)}}">{{$category->meta_title}}</a></h2>
            <p class="text-sm">{{$category->meta_description}}</p>
            <ul class="list-inline list-separated text-gray-500 mb-0">
              <ul class="list-inline list-separated text-gray-500 mb-0">
                <li class="list-inline-item"><a class="d-flex align-items-center flex-wrap text-reset" href="!#">
                    <div class="avatar flex-shrink-0"><img class="img-fluid" src="{{asset('uploads/users/' . $category->user->photo) }}" alt="..."/></div><small>{{$category->user->name}}</small></a></li>
                <li class="list-inline-item small"><i class="far fa-clock"></i> {{ $category->created_at->format('M Y') }}</li>
              </ul>
          </div>
        </div>
      </div>
    <div class="col-lg-5"><img class="img-fluid" src="{{asset('uploads/category/' . $category->image) }}" width="280" height="200" alt="..."></div>
  </div>
  @endforeach
</div>
@endsection