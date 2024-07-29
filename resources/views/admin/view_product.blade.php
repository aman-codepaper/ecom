<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top:60px;
      }

      .table_deg{
        border: 2px solid silver;
      }
      th{
        background: black;
        color: white;
        font-size: 19px;
        font-weight: bold;
        padding: 15px;
      }
      td{
        border: 1px solid white;
        color: white;
        text-align: center;
      }
    </style>
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            

            <div class="div_deg">
              <table class="table_deg">
                <tr>
                  <th>Product Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach ($product as $products)
                <tr>
                  <td>{{$products->title}}</td>
                  {{-- <td>{!!Str::limit($products->description,30)!!}</td> --}}
                  <td>{!!Str::words($products->description,2)!!}</td>
                  <td>{{$products->category}}</td>
                  <td>{{$products->price}}</td>
                  <td>{{$products->quantity}}</td>
                  <td>
                   <img height="120" width="120" src="products/{{$products->image}}" alt="">  
                  </td>
                  <td>
                    <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                  </td>
                  <td>
                    <a class="btn btn-danger" href="{{url('delete_product',$products->id)}}" onclick="confirmation(event)">Delete</a>
                  </td>
                </tr>
                @endforeach
              </table>

            </div>


           <div class="div_deg">
             {{$product->links()}}
           </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>