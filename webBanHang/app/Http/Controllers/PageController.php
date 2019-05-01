<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\products;
use App\type_product;
use App\cart;
use App\bill_detail;
use App\customer;
use App\bills;
use Session;
class PageController extends Controller
{

	
	public function callIndex(Request $request){
		
		$slide = slide::select('id','link','image')->get()->toArray();	
		$newProduct = products::where('new',1)->paginate(4);
		$product =products::get()->toArray();
		return view('user.pages.index',compact('slide','newProduct','product'));
		
	}

//giỏ hàng Header
	function fetch_data_ShoppingCart(Request $request)
	{
		if($request->ajax())
		{
			$data = DB::table('posts')->paginate(5);
			return view('pagination_data', compact('data'))->render();
		}
	}



	// public function callIndex(){
	// 	$slide = slide::select('id','link','image')->get()->toArray();	
	// 	$newProduct = products::where('new',1)->paginate(4);
	// 	$product =products::get()->toArray();
	// 	return view('user.pages.index',compact('slide','newProduct','product'));


	// }
	public function CallDetail(){
		return view('user.pages.detailProduct');
	}

	public function indexAdmin(){
		$product =products::get()->toArray();
		return view('admin.pages.index',compact('product'));
	}
//đổ danh mục dọc
	public function category_Product($id_category){
		$product = products::where('id_type',$id_category)->get();

		$category = type_product::all();
		return view('user.pages.category_product',compact('product','category'));

	}
	public function detailProduct($id_product){
		$product = products::where('id',$id_product)->first();
		$RelatedProducts = products::where('id_type',$product->id_type)->paginate(3);
		$newProduct = products::where('new',1)->paginate(4);
		$PromotionProduct =  products::where('promotion_price','<>',0)->paginate(4);
		//$category = type_product::all();
		return view('user.pages.detailProduct',compact('product','RelatedProducts','newProduct','PromotionProduct'));

	}
//ajax shopping cart


	public function show_cart() {
		return view('user.pages.ajax.shoppingCart');
		
	}
//display cart
	public function displayCart() {

		if(Session('cart')){                                                
			$oldCart = Session::get('cart');                                               
			$cart = new cart($oldCart);
		 // view()->share('user.pages.ajax.tableCart', ['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);
			
			return view('user.pages.displayCart');

		}

		
	}
	//update cart 
	public function updateCart(Request $request, $id)
	{
		$qty = $request->qty;
		$proId = $request->proId;
		if(Session('cart')){                                                
			$oldCart = Session::get('cart');                                               
			$cart = new cart($oldCart);

			$cart['qty'] = $qty;

		}
		return $cart['qty'];
		return view('user.pages.ajax.tableCart');



	}
	

// end shopping cart

//shopping cart

	public function addToCart(Request $req, $id) {
		$product = products::find($id);				
		$oldCart = Session('cart')?Session::get('cart'):null;				
		$cart = new cart($oldCart);				
		$cart->add($product,$id,1);				
		$req->session()->put('cart', $cart);				
		//return redirect()->back();				

	}


//xoa
	public function deleteItemCart($id){
		$oldCart = Session::has('cart')?Session::get('cart'):null;
		$cart = new cart($oldCart);
		$cart->removeItem($id);
		if(count($cart->items)>0){
			Session::put('cart',$cart);

		}
		else{
			Session::forget('cart');
		}
		// return redirect()->back();
	}

//đặt hàng
	public function getcheckOut(){
		if(Session('cart')){                                                
			$oldCart = Session::has('cart')?Session::get('cart'):null;                                               
			$cart = new cart($oldCart);

			return view('user.pages.order', ['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);


		}
		
	}


	public function postCheckOut(Request $req){
		$cart = Session('cart');
       //dd($cart->items);
		$customer = new customer;
		$customer->name = $req->full_name;
		$customer->gender = $req->gender;
		$customer->email = $req->email;
		$customer->address = $req->address;
		$customer->phone_number = $req->phone;
		$customer->note = $req->notes;
		$customer->save();

		$bill = new bills;
		$bill->id_customer = $customer->id;
		$bill->date_order = date('Y-m-d');

        // dd( Session('cart')->totalQty);
		$bill->total = $cart->totalPrice;
		$bill->payment = $req->payment_method;
		$bill->note = $req->notes;
		$bill->save();
		$product[] =$cart->items;

		
		foreach($cart->items as $key=>$value){
			$bill_detail = new bill_detail;
			$bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;//$value['item']['id'];
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');

        return redirect()->route('user/index')->with('success','Đặt hàng thành công!');
    }







    public function getAddProduct() {
    	$category = type_product::get()->toArray();
    	return view('admin.pages.product.getAddProduct', compact('category'));
    }

    public function getEditProduct($id) {
    	$category = type_product::select('id','name')->get()->toArray();
    	$product = products::find($id);
    	$product_img = products::findOrFail($id)->get()->toArray();
    	return view('admin.pages.product.editProduct',compact('category','product','product_img'));
    }






	//category
    public function getAddCategory(){
    	return view('admin.pages.type_product.add');
    }


    public function displayCategory(){
    	$category = type_product::all();
    	return view('admin.pages.type_product.display',compact('category'));
    }

    public function getEditCategory($id){

    	$category = category::find($id);
    	return view('admin.category.pages.edit',compact('category',));
    }

    public function postEditCategory($id,Request $request){

    	$updated = DB::table('categories')
    	->where('id', '=', $id)
    	->update([
    		'name'       => $request->name,
    		'status'      =>  $request->status,

    	]);

    	return redirect()->route('admin.category.displayCategory')->with('success','Sửa sản phẩm thành công!');
    }

    public function getDelete($id){
    	$category = type_product::find($id);
    	$category->delete($id);

    	return redirect()->route('admin.category.displayCategory')->with('success','Xóa sản phẩm thành công!');
    }

}
