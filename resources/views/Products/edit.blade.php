
@extends('layouts.app')

@section('content')
<div class="container">
     <!--Main form-->
     {{Form::open(array('url' => '/product/'.$product->id, 'method' => 'PUT', 'files' => true))}}
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!--product-name-->
        <div class="row mb-3">
            <label for="product_name" class="col-md-4 col-form-label text-md-end">Product name</label>

            <div class="col-md-6">
                <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $product->product_name }}" required autocomplete="product_name" autofocus>
                @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
         <!--product-price-->
        <div class="row mb-3">
            <label for="product_price" class="col-md-4 col-form-label text-md-end">Price /dt</label>

            <div class="col-md-6">
                <input id="product_price" type="integer" class="form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{ $product->product_price }}" required autocomplete="product_price" autofocus>
                @error('product_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
         <!--product-image-->
        <div class="row mb-3">
            <label for="product_image" class="col-md-4 col-form-label text-md-end">Upload product images: <br><cite>first is required</cite></label>
            <div class="col-4">
                <input id="product_image" type="file"  
                class="form-control @error('product_image') is-invalid @enderror" 
                name="product_image_1" 
                enctype="multipart/form-data"
                value="{{$product->product_image_1 }}"
                accept="image/*" onchange="loadFileImage1(event)">
                @if(isset($product->product_image[0]))
                    <img id="output1" style="max-height:10rem;" src="/storage/{{ $product->product_image[0]->product_image_path }}"/>
                @else
                    <img id="output1" style="max-height:10rem;"/>
                @endif
                @error('product_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <input id="product_image" type="file"  
                class="form-control @error('product_image') is-invalid @enderror" 
                name="product_image_2"  
                enctype="multipart/form-data"
                value="{{ old('product_image') }}"
                accept="image/*" onchange="loadFileImage2(event)">
                @if(isset($product->product_image[1]))
                    <img id="output2" style="max-height:10rem;" src="/storage/{{ $product->product_image[1]->product_image_path }}"/>
                @else
                    <img id="output2" style="max-height:10rem;"/>
                @endif
                @error('product_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <input id="product_image" type="file"  
                class="form-control @error('product_image') is-invalid @enderror" 
                name="product_image_3" 
                enctype="multipart/form-data"
                value="{{ old('product_image') }}"
                accept="image/*" onchange="loadFileImage3(event)">
                @if(isset($product->product_image[2]))
                    <img id="output3" style="max-height:10rem;" src="/storage/{{ $product->product_image[2]->product_image_path }}"/>
                @else
                    <img id="output3" style="max-height:10rem;"/>
                @endif
                @error('product_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>       
        </div>
         <!--product-description-->
        <div class="row mb-3">
            <label for="product_description" class="col-md-4 col-form-label text-md-end">Description</label>
            <div class="col-md-6">
                <textarea  id="product_description" 
                name="product_description" 
                class="form-control @error('product_description') is-invalid @enderror"
                 required autocomplete="product_description" autofocus>{{ $product->product_description }}</textarea>
                @error('product_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
         <!--product_category-->
        <div class="row mb-3">
            <label for="product_category" class="col-md-4 col-form-label text-md-end">Category</label>
            <div class="col-md-6">
                {{ Form::select('product_category', $product_categories_options, $product->product_category, ['class' => 'form-select', 'id' => 'product_category']) }}
            </div>
        </div>      
         <!--product_location-->
         <div class="row mb-3">
            <label for="product_location" class="col-md-4 col-form-label text-md-end">Location</label>
            <div class="col-md-6">
                {{ Form::select('product_location', $product_location_options, $product->product_location, ['class' => 'form-select', 'id' => 'product_location']) }}
            </div>
        </div>
        <hr>
        <hr>
         <!--product-deliverable-->
        <div class="row mb-3">
            <label for="product_deliverable" class="col-md-4 col-form-label text-md-end">is your product deliverable?</label>
            <div class="col-md-6 d-flex justify-content-evenly mb-3">
                <input type="radio" class="btn-check" name="product_deliverable" id="danger-outlined-yes" value="deliverable" autocomplete="off">
                <label class="btn btn-outline-danger" for="danger-outlined-yes"><i class="bi bi-check"></i></label>
                <input type="radio" class="btn-check" name="product_deliverable" id="danger-outlined-no" value="not deliverable" autocomplete="off" checked>
                <label class="btn btn-outline-danger" for="danger-outlined-no"><i class="bi bi-x"></i></label>
            </div>
        </div>
        <hr>
        <!--contact-->
        <div class="row mb-3">
            <label for="product_contact" class="col-md-4 col-form-label text-md-end">help customers reach you by:</label>
            <div class="col-md-6">
                <div class="input-group rounded mb-3">
                    <span class="input-group-text bg-white border-0" id="telephone-addon"><i class="bi bi-telephone"></i></span>
                    <input type="integer" name="product_phone" class="form-control rounded"  value="{{ $product->product_phone }}" placeholder="example: 99 999 999" aria-label="telephone" aria-describedby="telephone-addon" required/>
                    @error('product_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group rounded mb-3">
                    <span class="input-group-text bg-white border-0" id="email-addon"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="product_email" class="form-control rounded"  value="{{ $product->product_email }}" placeholder="example: emailadress@gmail.com" aria-label="email" aria-describedby="email-addon" required />
                    @error('product_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        <!--submit-->
        <div class="container mb-5 text-center">
            <button class="btn btn-danger" type="submit"> Edit</button>
        </div>
    {{ Form::close() }}
</div>
<script>
    var loadFileImage1 = function(event) {
        var output = document.getElementById('output1');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    var loadFileImage2 = function(event) {
        var output = document.getElementById('output2');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    var loadFileImage3 = function(event) {
        var output = document.getElementById('output3');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection