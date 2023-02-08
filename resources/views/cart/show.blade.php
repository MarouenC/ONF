@extends('layouts.app')

@section('content')
<div class="container">
    <main>
        <!--cart header-->
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-4">
                    <a style =" color:#df4759 !important" href="/product"><h6> <i class="bi bi-arrow-left-circle-fill"></i> back to shopping</h6></a>
                </div>
            </div>
        </div>
        <!--cart-top-table-->
        <div class="container">
            <div class="row">
                <div class="col-4"> <span class="">Item</span></div>
                <div class="col-2"> <span class="">Name</span></div>
                <div class="col-2"> <span class="">Price</span></div>
                <div class="col-2"> <span class="">quantity</span></div>
                <hr>
            </div>
            @foreach(auth()->user()->orders as $order)
                <div class="row align-items-center">
                    <div class="col-4 pb-4"> 
                        <a href ="/product/{{ $order->product->id }}"><img src="/storage/{{$order->product->product_image[0]->product_image_path}}" width="100" height="100"></a>
                    </div>
                    <div class="col-2">
                        <span >{{$order->product->product_name}}</span>
                    </div>
                    <div class="col-2 ">
                        <span>{{ $order->product->product_price}}</span>
                    </div>
                    <div class="col-4 justify-content-between d-flex ">
                        <div class="product-quantity align-self-center" style="font-style: oblique;">
                           {{ $order->quantity}}
                        </div>
                        <div class="product-quantity">
                            <a href="/checkout/{{$order->id}}">
                                <button class="btn btn-outline-success remove-btn">purchase</button>
                            </a>
                            <form action="{{ route('order.destroy', $order->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger remove-btn">delete</button>
                            </form>
                            
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
        <div class="container text-end">
            <h3 style=" color:blue !important;font-style: oblique;">Total<h3>
                <h4 style="font-style: oblique; color:#df4759">
                    @php 
                    $total = 0;
                    foreach(auth()->user()->orders as $order){
                        $total =$total + ($order->product->product_price * $order->quantity);
                    }
                    echo $total , '   dinars';
                    @endphp
                </h4>
            </h3>
            <a href="/checkout">
                <button class="btn btn-success remove-btn" style="font-style: oblique;">purchase all</button>
            </a>
        </div>
    </main>
</div>
@endsection