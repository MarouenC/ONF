
@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
      <div class="alert alert-danger"> 
        <h4>{{\Session::get('success')}}</h4>
      </div>
      <hr>
    @endif
    <div class="Label-start text-center pt-5">
        <h1>Welcome to ONF, First Completely Customer Free Trading Website in Tunisia </h1>
        <h5 style="opacity:0.5;">What are you Looking for Today?</span></h5>
    </div>
    <!--search section-->
    <form class="container" method="GET" action="{{ url("/product") }}">
      <div class="row justify-content-center my-5"> 
        <div class="col-sm-4 p-2">
          <div class="input-group rounded">
            <span class="input-group-text bg-white border-0" id="search-addon">
              <i class="bi bi-search"></i>
            </span>
            <input type="search" name="search" class="form-control rounded search-bar" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
          </div>
        </div>
        <div class="col-sm-3 p-2">
          {{ Form::select('product_category', $product_categories_options, null, ['class' => 'form-select', 'id' => 'product_category']) }}
        </div>
        <div class="col-sm-3 p-2">
          {{ Form::select('product_location', $product_location_options, null, ['class' => 'form-select', 'id' => 'product_location']) }}
        </div>
        <div class="col-sm-2 p-2 text-center">
          <button type="submit" class="btn btn-danger" >Search</button>
        </div>
      </div>
    </form>
    <!-- Categories selection-->
    <div class="Label-start pt-5">
      <h4 class="text-center ">Browse By Categories</h4>
    </div>
    <div class="container">
      <div class="row justify-content-center my-5">
        <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
          <button type ="submit" name="product_category" value="" class="btn btn-outline-danger category-swipe"><i class="bi bi-lightning"></i><br>Recent</button>
        </form>
        <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
          <button type ="submit" name="product_category" value="Electronics" class="btn btn-outline-danger category-swipe"><i class="bi bi-phone"></i><br>Electronics</button>
        </form>
        <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
          <button type ="submit" name="product_category" value="vehicules" class="btn btn-outline-danger category-swipe" ><i class="bi bi-bicycle"></i><br>vehicles</button>
        </form>
          <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
          <button type ="submit" name="product_category" value="Outfits" class="btn btn-outline-danger category-swipe" ><i class="bi bi-bag"></i><br>Outfits</button>
        </form>
          <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
          <button type ="submit" name="product_category" value="Fashion" class="btn btn-outline-danger category-swipe" ><i class="bi bi-sunglasses"></i><br>Fashion</button>
        </form>
        <div method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
          <button class="btn btn-outline-danger dropdown-toggle category-swipe " data-bs-toggle="dropdown" aria-expanded="false" type="submit"><i class="bi bi-three-dots"></i><br>More</button>
          <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <li>
              <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
                <button type ="submit" name="product_category" value="computers" class="btn btn-outline-danger category-home-list" >Computers</button>
              </form>
            </li>
            <li>
              <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
                <button type ="submit" name="product_category" value="books" class="btn btn-outline-danger category-home-list">books</button>
              </form>
            </li>
            <li>
              <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
                <button type ="submit" name="product_category" value="Sports and Outdoors" class="btn btn-outline-danger category-home-list">Sports and Outdoors</button>
              </form>
            </li>
            <li>
              <form method="GET" action="{{ url("/product") }}" class="col-md-2 p-2  text-center">
                <button type ="submit" name="product_category" value=" Video Games" class="btn btn-outline-danger category-home-list"> Video Games</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--Carousel-->
    <div class="container my-5">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
            <img src="personal_images/cozyhome.jpg" class="d-block w-100" alt="comfy">
            <div class="carousel-caption d-md-block">
                <h5 class="white fw-bold">Welcome to ONF</h5>
                <p class="white">Welcome to ONF, First Completely Customer Free Trading Website in Tunisia.</p>
            </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
            <img src="personal_images/books.jpg" class="d-block w-100" alt="work">
            <div class="carousel-caption d-md-block">
                <h5 class="white fw-bold">Buy and Sell products!</h5>
                <p class="white">Browse all kind of Products or Make your own Offers.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="personal_images/joinhome.jpg" class="d-block w-100" alt="recruit">
            <div class="carousel-caption d-md-block">
                <h5 class="white fw-bold">Join our program</h5>
                <p class="white">Contact us to join our Verified Delivery Program.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
    <!-- tips and help-->
    <div class="container text-center border rounded py-5 " style="background-color: rgba(255, 121, 121,0.5)" >
      <p class="text-center p-3" >On and Off (Onf) allows customers to browse through content with ease, <br> 
      As the name implies, The trick is simple! Choose the way to look for porducts by : 
        <ul>
          <li class="py-2"> Onf Toggle : Activated by default, Allows customers to view all content without any filtering.</li>
          <li class="py-2"> On Toggle : Only browse through our verified content provided by Official Brands. </li>
          <li class="py-2"> Off Toggle : View only Content posted by regular customers uploading their offers.</li>
        </ul> 
      <cite style="opacity:0.5;">Note: Changing the display can be done by switching "On/Off" option on the filter while browsing items.</cite>
      </p>
    </div>
</div>
@endsection
