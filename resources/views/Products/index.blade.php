@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
      <div class="row mb-3 pb-3 border-bottom align-items-baseline">
        <div class="col-md-6">
          <h6><p class="sortByText">Results found: {{ $products->count() }}</p></h6>
        </div>
        <div class="col-md-6">
            <form class="d-flex" method="GET" action="{{ url("/product") }}">
                <input class="form-control search-bar" name="searchName" type="search" placeholder="Search products by username" aria-label="Search" >
                <button class="btn btn-outline-danger" type="submit"><i class="bi bi-search "></i></button>
            </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row ">
        <div class="col-md-3 mb-4">
          <!--form-->
          <form method="GET" action="{{ url("/product") }}">
            <select class="form-select mb-3" name="filter" aria-label="Default select example">
              <option selected disabled>filter</option>
              <option value="">On/Off</option>
              <option value="partner">On</option>
              <option value="user">Off</option>
            </select>
            <div class="mb-3">
              {{ Form::select('product_category', $product_categories_options, null, ['class' => 'form-select', 'id' => 'product_category']) }}
            </div>
            <div class="mb-3">
              {{ Form::select('product_location', $product_location_options, null, ['class' => 'form-select', 'id' => 'product_location']) }}
           </div>
            <select class="form-select mb-3" name="sortBy" aria-label="Default select example">
              <option selected disabled>Sort by</option>
              <option value="recent">Most recent</option>
              <option value="Lowest">Lowest price</option>
              <option value="Highest">Highest price</option>
            </select>
            <div class="accordion-item mb-3">
              <h6 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Pricing
                </button>
              </h6>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="input-group mb-3">
                    <span class="input-group-text min-max">min</span>
                    <input type="text" name="minimum" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text min-max">max</span>
                    <input type="text" name="maximum" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-danger">Confirm</button>
            </div>
          <form>
        </div>

        <div class="col-md-9 mb-3">
          <div class="row row-cols-md-1 row-cols-md-3 g-4 row-cols-1 row-cols-2">
            @foreach($products as $product)
              <div class="col">
                  <div class="card h-100 whenSmallerCard">
                      <a href="/product/{{ $product->id }}"><img src="/storage/{{ $product->product_image[0]->product_image_path }}" class="card-img-top"></a>
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $product->product_name }}</li>
                          <li class="list-group-item">{{ $product->product_price }} dinars</li>
                        </ul>
                      </div>
                      <div class="card-footer text-muted">
                        {{ $product->product_location }}, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/profile/{{ $product->user_id }}">{{ $product->user->username }}</a>  @if($product->user->role=='partner' || $product->user->role=='admin' )<i class="bi bi-patch-check-fill"></i> @endif
                      </div>
                    </div>
              </div>
            @endforeach
          </div>
        </Div>
        <div class="row">
          <div class="col d-flex justify-content-center">
          {{$products->Links('pagination::bootstrap-4')}}
          </div>
        </div>
      <div>
    </div>
  </div>
</div>
@endsection