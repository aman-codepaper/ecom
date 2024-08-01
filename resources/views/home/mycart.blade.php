<!DOCTYPE html>
<html>

<head>
 @include('home.css')
 <style>
    .div_deg{
        display: flex;
        justify-content: center;
        align-content: center;
        margin: 60px;
    }
    table{
        border: 2px solid black;
        text-align: center;
        width: 800px;
    }
    th{
        border: 2px solid black;  
        text-align: center;
        color: white;
        font: 20px;
        font-weight: bold;
        background: #000;
    }
    td{
        border: 1px solid   black;
    }
form{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
    .cart_value{
      text-align: center;
      margin:70px;
      padding: 18px;
    }
    .order_deg{
      padding-right: 100px;
    }
    label{
      display: inline-block;
      width: 150px;
    }
    .div_gap{
      padding: 20px;
    }
 </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
     @include('home.header')
    <!-- end header section -->
  </div>
  
<div class="div_deg">

    <table>
      <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Remove</th>
      </tr>
      <?php
      $value=0;
      ?>
     @foreach ($cart as $cart)
     <tr>
        <td>{{$cart->product->title}}</td>
        <td>{{$cart->product->price}}</td>
        <td>
            <img width="150" src="/products/{{$cart->product->image}}" alt="">
        </td>
        <td>
            <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
        </td>
      </tr>
      <?php
      $value= $value+$cart->product->price;
      ?>
     @endforeach
    </table>
</div>

<div>
  <div class="cart_value">
     <h3>Total Value of Cart is: ${{$value}} </h3>
  </div>

  <div class="order_deg">
    <form action="{{url('confirm_order')}}" method="POST">
      @csrf
      <div class="div_gap">
        <label for="">Receiver Name</label>
        <input type="text" name="name" value="{{Auth::user()->name}}">
      </div>
      <div class="div_gap">
        <label for="">Receiver Address</label>
        <textarea name="address">{{Auth::user()->address}}</textarea>
      </div>
      <div class="div_gap">
        <label for="">Receiver Phone</label>
        <input type="text" name="phone" value="{{Auth::user()->phone}}">
      </div>
      <div class="div_gap">
        <input class="btn btn-primary" type="submit" name="Order" value="Place Order">
      </div>
    </form>
  </div>
</div>


@include('home.footer');

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>