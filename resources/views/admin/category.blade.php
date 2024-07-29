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
       @include('admin.js')
</body>

</html>
