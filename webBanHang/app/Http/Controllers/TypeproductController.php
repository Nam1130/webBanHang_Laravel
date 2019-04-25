<?php

namespace App\Http\Controllers;
use App\type_product;
use Request;
use App\Http\Requests\CategoryRequest;
use DB; 
use Input,File;
 
class TypeproductController extends Controller
{
	public function postAdd(CategoryRequest $request){
		$type_product = new type_product;
		$file_name = $request->file('image')->getClientOriginalName();
		$type_product->name = $request->name;
		$type_product->description = $request->description;
		$type_product->image = $file_name;
		$request->file('image')->move('public/user/image/product',$file_name);
		$type_product->save();
		//return view('category.displayCategory');
		return redirect()->route('admin/category/getAdd')->with('success','Thêm sản phẩm thành công!');

	} 
}
