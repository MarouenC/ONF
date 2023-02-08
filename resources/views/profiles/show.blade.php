@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-3 pt-2 text-center">
        @if(isset($user->userimage))
          <img src="/storage/{{ $user->userimage->user_image_path }}" alt="" class="rounded-circle" style="height: 10rem; width:10rem;">
        @else
          <img src="{{ Avatar::create($user->username)->toBase64() }}" alt="" class="rounded-circle" style="height: 10rem; width:10rem;">
        @endif
      </div>
      <div class="col-md-9 py-3 px-5">
          <div class="d-flex justify-content-between align-items-baseline pb-2">
              <div class='d-flex align-items-center'>
                <h1>  {{ $user->username }}  @if($user->role=='partner' || $user->role=='admin' )<i class="bi bi-patch-check-fill"></i> @endif </h1>
                @if(!$isFollowing && auth()->user()->id !== $user->id)
                <follow-button user-id ="{{$user->id}}"></follow-button>
                @elseif(auth()->user()->id !== $user->id)
                <unfollow-button user-id ="{{$user->id}}"></unfollow-button>
                @endif
              </div>
              @if(auth()->user()->id==$user->id || auth()->user()->role=='admin' )
              <div class='d-flex'>
                <a class="text-end" style="padding-left: 9rem;" href ="/profile/{{$user->id}}/edit">Edit profile </a>
              </div>
              @endif
          </div>
          <div class="d-flex ">
              <p class="pr-3" ><strong>{{ $user->products->count() }}</strong> posts</p>
              <p class="pr-3" style="padding-left: 1rem;"><strong>{{ $nb_follower }}</strong> followers</p>
              <p class="pr-3" style="padding-left: 1rem;"><strong>{{ $nb_followed }}</strong> following</p>
          </div>
          <div>
              <h5> {{ $user->user_bio }}</h5>
          </div>
    </div>
  </div>
  <div class=" d-flex pt-5 justify-content-evenly">
      <h6>posts</h6>
      @if(auth()->user()->id==$user->id)
        <p><a href="{{ url('/product/create') }}">add new post</a></p>
      @endif
  </div>
  <div class="row row-cols-md-1 row-cols-md-3 g-4 row-cols-1 row-cols-2">
      @foreach($user->products as $product)
        <div class="col">
            <div class="card h-100 whenSmallerCard">
                <a href="/product/{{ $product->id }}">
                  <img src="/storage/{{ $product->product_image[0]->product_image_path }}" class="card-img-top"></a>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $product->product_name }}</li>
                    <li class="list-group-item">{{ $product->product_price }} dinars</li>
                  </ul>              
                </div>
                <div class="card-footer text-muted">
                  {{ $product->product_location }},&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $product->product_category }},
                </div>
              </div>
        </div>
      @endforeach
  </div>
</div>
@endsection
