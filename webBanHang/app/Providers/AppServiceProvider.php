<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema; 

use Illuminate\Support\ServiceProvider;
use App\type_product;
use Session;    
use App\cart;   

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // Schema::defaultStringLength(191); //NEW: Increase StringLength
        view()->composer('user.blocks.header',function($view){
            $category = type_product::all();
            if(Session('cart')){                                                
               $oldCart = Session::get('cart');                                               
               $cart = new cart($oldCart);
               

               $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);
           }


           $view->with('category',$category);
       });

    }                                               

}

