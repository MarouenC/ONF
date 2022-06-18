@extends('layouts.app')

@section('content')
<div class="container">
    <main>
        <!--cart header-->
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-4">
                    <a style =" color:#df4759 !important" href="#"><h6> <i class="bi bi-arrow-left-circle-fill"></i> back to shopping</h6></a>
                </div>
            </div>
        </div>
        <!--cart-top-table-->
        <div class="container">
            <div class="row">
                <div class="col-4"> <span class="">Item</span></div>
                <div class="col-2"> <span class="">Name</span></div>
                <div class="col-3"> <span class="">Price</span></div>
                <div class="col-3"> <span class=""></span></div>
                <hr>
            </div>
               
            <div class="row align-items-center">
                <div class="col-4 pb-4">
                    <img src="personal_images/ecommerce.jpg" width="100" height="100">
                </div>
                <div class="col-2">
                    <span >Books et loisirs</span>
                </div>
                <div class="col-2 ">
                    <span>2500.25 dt</span>
                </div>
                <div class="col-4 justify-content-end d-md-flex ">
                    <a href ="#" button type="button" class="btn btn-outline-success remove-btn">purchase</button></a>
                    <button type="button" class="btn btn-outline-danger remove-btn">delete</button>
                </div>
                <hr>
            </div>
        </div>
    </main>
</div>
@endsection