<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table{
            border: 2px solid white;
            text-align: center;
        }
        th{
            background: #000;
            color: #fff;
            padding: 10px;
            font-size: 18px;
            font-bold:500;
            text-align: center;
            border: 1px solid white;
        }
        td{
            color: white;
            border: 1px solid white;
            padding: 10px;
        }
        .table-center{
            display: flex;
            align-items: center;
            justify-content: center;
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
          <div class="table-center">
            <table>
                <tr>
                    <th>Customer name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>
               @foreach ($data as $data )
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td><img width="100" src="products/{{$data->product->image}}" alt=""></td>
                    <td>
                        @if ($data->status == 'in progress')
                            <span style="color: red;">{{$data->status}}</span>
                        @elseif($data->status == 'On the way') 
                            <span style="color: rgb(255, 255, 238);">{{$data->status}}</span>   
                        @else
                            <span style="color: rgb(53, 255, 53);">{{$data->status}}</span>   
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way</a>
                        <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                    </td>
                    <td>
                       <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}"> Print PDF</a>
                    </td>
                </tr>
                   
               @endforeach
               </table>
          </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>