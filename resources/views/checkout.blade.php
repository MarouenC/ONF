@extends('layouts.app')

@section('content')
<div class="container">
    <!--main section-->
  <main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="container">
                <form action="/action_page.php">
                    <h3>Billing Address</h3>
                    <div class="making_space">
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                    </div>
                    <div class="making_space">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="john@example.com">
                    </div>
                    <div class="making_space">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                    </div>
                    <div class="making_space">
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city" placeholder="New York">
                    </div>
                    <div class="making_space">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" placeholder="NY">
                    </div>
                    <div class="making_space">
                        <label for="zip">Zip</label>
                        <input type="text" id="zip" name="zip" placeholder="10001">
                    </div>
                    <div class="col-50 py-5">
                    <h3>Payment</h3>
                    <label for="fname">Accepted Cards</label>
                    <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <div class="making_space">
                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                    </div>
                    <div class="making_space">
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="making_space">
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="September">
                    </div>
                    <div class="making_space">
                        <label for="expyear">Exp Year</label>
                        <input type="text" id="expyear" name="expyear" placeholder="2022">
                    </div>
                    <div class="making_space">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="352">
                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <div class="container text-center my-5">
                        <input type="submit" value="Continue to checkout" class="btn btn-danger">
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="col-md-6 text-center ">
          <div class="container rounded-3 bg-light">
            <h4 class="py-3">Cart
              <span class="price">
                <i class="fa fa-shopping-cart"></i>
              </span>
            </h4>
            <p><a class ="price_label" href="#">Product 1:</a> <span class="price">15 dt</span></p>
            <hr>
          </div>
        </div>
      </div>
  </main>
</div>
@endsection