@extends('layouts.app')
 
{{-- @section('stripe-js')
    <script src="https://js.stripe.com/v3/"></script>
@endsection --}}

@section('content')
<div class="container">
    @include('partials.success')
    @include('partials.error')
    <div class="row">
        <div class="col-lg-4">
            <div class="page-breadcrumb">
                <h1>Checkout<span></span></h1>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col md-12">
            <h2>Your Information</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-7">
            <form action="{{route('checkout.store')}}" method="POST" class="checkout-details" id="payment-form">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name" id="name" required>
                    </div>  
                    <div class="form-group col">
                        <label for="email">Email</label>
                        <input type="text" placeholder="email" name="email" value="{{old('email')}}" id="email" class="form-control" required>
                    </div>
                </div>                
                <div class="form-row">
                    <div class="form-group col">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone"  value="{{old('phone')}}" placeholder="Enter Contact Number" id="phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="email">Address</label>
                        <input type="text" id="address" placeholder="Address to Deliver" class="form-control" required>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="name">City</label>
                    <input type="text" name="city" class="form-control" placeholder="City" value="{{old('city')}}" id="city" required>
                </div> 
                 
                <div class="form-row">    
                    <div class="form-group col">
                        <label for="email">Province</label>
                        <input type="text" placeholder="Province" name="province" id="province" value="{{old('province')}}" class="form-control" required>
                    </div>                 
                    <div class="form-group col">
                        <label for="postalcode">Postal Code</label>
                        <input type="text" class="form-control" id="postalcode" value="{{old('postalcode')}}" placeholder="postalcode" name="postalcode" required>
                    </div> 
                    
                </div> 
               
                <hr>
                <h3>Payment Details</h3>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="cardname">Name On card</label>
                        <input type="text" class="form-control" name="name_on_card" placeholder="" id="name_on_card">
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="card-element">
                        Credit or debit card
                      </label>
                      <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                      </div>
                  
                      <!-- Used to display form errors. -->
                      <div id="card-errors" role="alert"></div>
                </div>
                <div class="checkout-button">
                    <button type="submit" id="complete-order">Place Your Order</button>
                </div>
                
            </form>
        </div>
        <div class="col-md-5">
            <table class="table table-borderless" style="table-layout:fixed;">
                <thead>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </thead>

            </table>
            @foreach (Cart::content() as $item)
                
                    <table class="table table-borderless" style="table-layout:fixed;">
                       
                        <thead>
                            <tr>
                                <td scope="col">{{$item->name}}</td>
                                <td scope="col">{{$item->model->presentPrice()}}</td>
                                <td scope="col">{{$item->qty}}</td>
                            </tr>
                        </thead>
                    </table>
                
                <hr style="border:0.2px solid black;">
            @endforeach
            <div class="row mt-4 ml-1">                
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                          <th>Subtotal</th>
                            <td>Rs. {{Cart::subtotal()}}</td>
                           
                        </tr>
                        <tr>
                          <th>Tax (13%)</th>
                            <td>Rs. {{Cart::tax()}}</td>
                            
                        </tr>
                        <tr>
                          <th>Total</th>
                            <td>Rs. {{Cart::total()}}</td>
                            
                        </tr>                        
                    </tbody>
                </table>
                
            </div>
        </div> 
            
    </div>
   
    
</div>
@endsection

@section('extra-js')
    <script type="text/javascript">
        (function(){
            // Create a Stripe client.
        var stripe = Stripe('pk_test_6MFNTQ4ZvZdYv55WYcirhdBV00wzsd2JCj');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
            color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
        };

          // Create an instance of the card Element.
          var card = elements.create('card', {

            style: style,
            hidePostalCode:true

        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();

        document.getElementById('complete-order').disabled=true;

        var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
            }


        stripe.createToken(card,options).then(function(result) {
            if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;

            document.getElementById('complete-order').disabled=false;
            } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
            }
        });
        });


        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
        }

      


        })();
    </script>
@endsection