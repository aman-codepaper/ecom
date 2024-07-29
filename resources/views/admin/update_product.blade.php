<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        label{
            display: inline-block;
            width: 200px;
            padding: 20px;
        }
        textarea{
            width: 400px;
            height: 100px;
        }
        input[type="text"]{
            width: 300px;
            height: 60px;
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
       
           <h2>Update Product</h2>
      <div class="div_deg">
        <form action="{{'edit_product',$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Title</label>
                <input type="text" name="title" value="{{$data->title}}">
            </div>
            <div>
                <label>Description</label>
                <textarea name="text" id="price" >{{$data->description}}</textarea>
            </div>
            <div>
                <label>Price</label>
                <input type="text" name="price" value="{{$data->price}}">
            </div>
            <div>
                <label>Quantity</label>
                <input type="text" name="quantity" value="{{$data->quantity}}">
            </div>
            <div>
                <label>Category</label>
                <select name="category">
                   
                    @foreach ($category as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Current Image</label>
                <img width="120" src="/products/{{$data->image}}" alt="">
            </div>
            <div>
                <label>New Image</label>
                <input type="file" name="image">
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Update Product">
            </div>
        </form>
      </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js');
  </body>
</html>