@extends('layouts.app')

@section('content')
<div class="container">
  <div class="container">
    <div class="row py-3 ">
        <div class="col-6">
          <a href="{{ url("/product") }}"  style="color: #df4759 !important;"><h6> <i class="bi bi-arrow-left-circle-fill"></i> back to browsing</h6></a>
        </div>
        @if(auth()->user()->id== $product->user_id || auth()->user()->role=='admin')
        <div class="col-6 d-flex flex-row-reverse "> 
          {{Form::open(array('url' => '/product/'.$product->id, 'method' => 'DELETE', 'files' => true))}}
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this product?')">Delete</button>
          {{Form::close()}}
          <a href ="/product/{{$product->id}}/edit" class =" px-3" ><h6>Edit</h6></a>
        </div>
        @endif
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-6" >
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner"> 
                  @foreach($product->product_image as $image)
                    @if($loop->index == 0)
                      <div class="carousel-item active">
                        <img src="/storage/{{ $image->product_image_path }}" class="d-block w-100 " alt="sample 1">
                      </div>
                    @else 
                      <div class="carousel-item">
                        <img src="/storage/{{ $image->product_image_path }}" class="d-block w-100" alt="sample 2">
                      </div>
                    @endif
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div> 
        </div>
        <div class="col-md-6 ">
            <h1 class="py-4"> {{ $product->product_name }} </h1>
            <h2 class="py-2" style="color : #df4759"> {{ $product->product_price }} dinars </h2>
            <hr>
            <p><i class="bi bi-person"></i> :<a href="/profile/{{ $product->user_id }}">{{ $product->user->username }}</a><p>
            <p><i class="bi bi-clock"></i> : {{ $product->created_at->format('d M y') }}</p>
            <p><i class="bi bi-tag"></i> : {{ $product->product_category }}</p>
            <p><i class="bi bi-geo-alt"></i> : {{ $product->product_location }}</p>
            <p><i class="bi bi-truck"></i> : {{ $product->product_deliverable }}</p>
            <hr>
            <p class="py-3">{{ $product->product_description }}</p>      
            <form action ="/cart" class="text-center" enctype="multipart/form-data" method="POST">
              @csrf
                <button type="submit " class="btn btn-outline-danger product-buttons my-4" id="liveToastBtn"><span style="font-size:smaller;"><i class="bi bi-cart"></i> Add to cart</span></button>
            </form>
            <p class="py3 ">Or contact via : </p>
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                    <i class="bi bi-telephone"> Phone number</i>   
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                    {{ $product->product_phone }}
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <i class="bi bi-envelope"> Email adress</i>  
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">
                    {{ $product->product_email }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection