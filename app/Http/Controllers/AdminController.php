<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
      $category = new Category;
      $category->category_name = $request->category;
      $category->save();
      flash()->success('Added Category Succesfully.');
      return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id){
        $data = Category::find($id);
        $data->category_name=$request->category;
        $data->save();
        flash()->success('Update Category Succesfully.');
        return redirect('/view_category');
    }

    public function add_product(){
        $category = Category::all();
         
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request){
      $data = new Product();
      $data->title=$request->title;
      $data->description=$request->description;
      $data->price=$request->price;
      $data->quantity=$request->qty;
      $data->category=$request->category;
      
      $image = $request->file('image');

      if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);
        $data->image=$imagename;
      }

      $data->save();
      flash()->success('Product Added Succesfully.');
      return redirect()->back();
    }

    public function view_product()
    {
      $product=Product::paginate(3);
      return view('admin.view_product',compact('product'));
    }
    public function delete_product($id) {
      // Find the product
      $product = Product::find($id);
      
      if ($product) {
          // Remove the product image
          $image_path = public_path('products/' . $product->image);
          if (file_exists($image_path)) {
              unlink($image_path);
          }
          
          // Delete the related rows in the carts table
          Cart::where('product_id', $id)->delete();
          
          // Delete the product
          $product->delete();
      }
  
      return redirect()->back();
  }
  

    public function update_product($id){
      $data=Product::find($id);
      $category=Category::all();
      return view('admin.update_product',compact('data','category'));
    }

 
    public function edit_product(Request $request,$id){
      $data=Product::find($id);
      $currentImage = $data->image;
      $data->title=$request->title;
      $data->description=$request->description;
      $data->quantity=$request->quantity;
      $data->category=$request->category;
      $image = $request->file('image');
      if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);
        $data->image = $imagename;
     
      if ($currentImage && file_exists(public_path('products/'.$currentImage))) {
          unlink(public_path('products/'.$currentImage));
      }
      }
      $data->save();
      flash()->success('Product Updated Succesfully.');
      return redirect('/view_product');
    }

    public function product_search(Request $request){
      $search = $request->search;
      $product=Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);

      return view('admin.view_product',compact('product'));
    }

    public function view_orders(){
      $data=Order::all();
      return view('admin.order',compact('data'));
    }
    public function on_the_way($id){
     $data=Order::find($id);
     $data->status='On the way';
     $data->save();
     return redirect('/view_orders');
    }
    public function delivered($id){
     $data=Order::find($id);
     $data->status='Delivered';
     $data->save();
     return redirect('/view_orders');
    }
    public function print_pdf($id){
      $data = Order::find($id);
      $pdf = Pdf::loadView('admin.invoice',compact('data'));
      return $pdf->download('invoice.pdf');
    }
}
