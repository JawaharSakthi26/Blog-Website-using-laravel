<aside class="col-lg-4">
    <div class="card mb-5">
      <div class="card-body">
          <h3 class="h6 mb-3">Latest Posts</h3>
          @foreach($latestPosts as $latest)
          <a class="text mb-3" href="{{route('blog.show',$latest->slug)}}">
              <div class="d-flex align-items-center">
                  <img class="img-fluid flex-shrink-0" src="{{asset('uploads/category/' . $latest->category->image)}}" alt="..." width="70">
                  <div class="ms-3">
                      <p class="mb-2 fw-bold text-gray-700 lh-1">{{$latest->name}}</p>
                      <ul class="list-inline list-separated text-gray-500">
                          <li class="list-inline-item small">{{$latest->category->name}}</li>
                          <li class="list-inline-item small"><i class="far fa-comment"></i> {{$latest->comments->count()}}</li>
                      </ul>
                  </div>
              </div>
          </a>
          <br>
          @endforeach
      </div>
    </div>
    <div class="card mb-5">
      <div class="card-body">
        <h3 class="h6 mb-3">Categories</h3>
        @foreach ($allCategory as $category)
          <div class="p-2 d-flex justify-content-between fw-bold text-gray-600 bg-light"><a class="text-reset" href="{{route('allCategory.show',$category->slug)}}">{{$category->name}}</a><span>{{$category->posts->count()}}</span></div>
        @endforeach
      </div>
    </div>
  </aside>