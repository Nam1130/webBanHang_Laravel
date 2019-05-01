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

      function share($viewshare){
        view()->composer($viewshare,function($view){

          if(Session('cart')){                                                
           $oldCart = Session::get('cart');                                               
           $cart = new cart($oldCart);

           $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);
         }
       });
      }
       // Schema::defaultStringLength(191); //NEW: Increase StringLength
      view()->composer('user.blocks.header',function($view){
        $category = type_product::all();
        $view->with('category',$category);
      });

     //  view()->composer('user.pages.ajax.shoppingCart',function($view){

     //    if(Session('cart')){                                                
     //     $oldCart = Session::get('cart');                                               
     //     $cart = new cart($oldCart);

     //     $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);
     //   }
     // });
      share('user.pages.ajax.shoppingCart');
      share('user.pages.ajax.tableCart');
    }                                               

  }

