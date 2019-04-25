<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests\productRequest;
use DB; 
use Input,File;
use Carbon\Carbon;
use App\products;
use App\type_product;
class ProductController extends Controller
{
   public function postAdd(productRequest $request){
		$product = new products;
		$file_name = $request->file('image')->getClientOriginalName();
		$product->name = $request->name;
		$product->description = $request->description;
		$product->image = $file_name;
		$product->promotion_price = $request->promotion_price;
		$product->unit_price = $request->unit_price;
		$product->unit = $request->unit;
		$product->id_type = $request->id_type;
		$product->new = $request->new;
		$request->file('image')->move('public/user/image/product',$file_name);
		$product->save();
		return redirect()->route('admin/product/getAdd')->with('success','Thêm sản phẩm thành công!');
	}

	public function getEditProduct($id) {
		$category = type_product::select('id','name')->get()->toArray();
		$product = products::find($id);
		$product_img = products::findOrFail($id)->get()->toArray();
		return view('admin.pages.product.getEditProduct',compact('category','product','product_img'));
	}

	public function postEditProduct($id,Request $request) {
		$product = products::find($id);
		$product->name = Request::input('name');
		$product->description = Request::input('description');
		$product->unit_price = Request::input('unit_price');
		$product->promotion_price = Request::input('promotion_price');
		$product->new = Request::input('new');
		$product->id_type = Request::input('id_type');
		if(!empty(Request::file('image')))
		{
			$file_name = Request::file('image')->getClientOriginalName();
			$product->image = $file_name;
			Request::file('image')->move('public/user/image/product/',$file_name);
			
		}
		$product->save();


		return redirect()->route('admin/index')->with('success','Sửa sản phẩm thành công!');
	}

	public function getDelete($id){
		$product = products::find($id);
		$product->delete($id);

		return redirect()->route('admin/index')->with('success','Xóa sản phẩm thành công!');
	}


}
