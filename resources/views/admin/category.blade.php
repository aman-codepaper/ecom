<!DOCTYPE html>
<html>
<style type="text/css">
    input[type='text'] {
        width: 400px;
        height: 50px;
    }

    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
    }

    .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid white;
        margin: 50px;
        width:600px;
    }

    th{
        background-color: #00000070;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
    }
    td{
        color: white;
        padding: 10px;
        border: 1px solid white;
    }
</style>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid d-flex align-items-center justify-center flex-column ">
                    <h1>Add category</h1>
                    <div class="div_deg">
                        <form action="{{url('add_category')}}" method="POST">
                            @csrf
                            <div>
                                <input type="text" name="category">
                                <input type="submit" class="btn btn-primary" value="Add Category">
                            </div>
                        </form>
                    </div>
                
                <div>

                    <table class="table_deg">
                        <tr>
                            <th>Category Name</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{$data->category_name}}</td>
                            
                            <td>
                                <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
                            </td>

                            <td><a href="{{url('delete_category',$data->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>

                </div>
            </div>
        </div>
        <!-- JavaScript files-->
        <script>

            function confirmation(e){
                e.preventDefault();
                const urlToRedirect = e.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                
                swal({
                   title:"Are you sure to Delete This",
                   text:"This delete will be permanent",
                   icon:"warning",
                   buttons:true,
                   dangerMode:true, 
                })

                .then((willCancel)=>{
                    if(willCancel){
                        window.location.href=urlToRedirect;
                    }
                })
            }
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
        <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
        <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
