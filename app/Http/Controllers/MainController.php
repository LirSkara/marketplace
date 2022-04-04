<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;

use App\Models\Categories;
use App\Models\Collections;
use App\Models\Mactions;
use Illuminate\Http\Request;
use App\Models\Puncts;
use App\Models\Slides;
use App\Models\Product;
use App\Models\Reviews;
use App\Models\Store;
use App\Models\Favourites;
use App\Models\User;
use App\Models\OrderOne;
use App\Models\Cart;
use App\Models\Mrecomendations;
use App\Models\CarouselProduct;
use App\Models\CartOrder;

class MainController extends Controller
{
    public function home()
    {
        $slides = new Slides();
        $collections = new Collections();
        $mactions = new Mactions();
        $mrecomendation = Mrecomendations::limit(12)->get();
        $products = new Product();
        $reviews = new Reviews;
        $favourites = new Favourites;
        $carousel_product = new CarouselProduct();
        return view('home',['slides' => $slides->orderBy('id','desc')->get(),'collections' => $collections->orderBy('id','desc')->get(),'mactions' => $mactions->orderBy('id','desc')->get(), 'mrecomendation' => $mrecomendation, 'products' => $products->all(), 'reviews' => $reviews, 'favourites' => $favourites, 'carousel_product' => $carousel_product->all()]);
    }

    public function cart()
    {
        $products = new Product();
        $user = auth()->user();
        $cart = new Cart;
        if(Auth()->check()) {
            if(Cart::where('user_id', '=', auth()->user()->id)->count() != 0) {
                $cart_itog = Cart::where('user_id', '=', auth()->user()->id)->get();
                $itogo = 0;
                foreach($cart_itog as $item) {
                    $my_product = Product::where('id', '=', $item->product_id)->first();
                        $itogo = $itogo + $my_product->price*$item->colvo;
                }
                return view('cart',['cart'=>$cart->all(),'user'=>$user,'products'=>$products, 'itogo' => $itogo]);
            } else {
                return view('cart',['cart'=>$cart->all(),'user'=>$user,'products'=>$products]);
            }
        } else {
            return view('cart',['cart'=>$cart->all(),'user'=>$user,'products'=>$products]);
        }
    }

    public function product($id)
    {
        if(Product::where('id',$id)->count() > 0){
            $product = Product::find($id);
            $punct = Puncts::find($product->category)->first();
            $category = Categories::find($punct->category)->first();
            $reviews = Reviews::where('product', '=', $product->id);
            $users = new User();
            $carousel_product = CarouselProduct::where('product_id', '=', $id)->get();
            return view('product',['product'=>$product,'punct'=>$punct,'category'=>$category,'reviews'=>$reviews->orderBy('id','desc')->get(),'users'=>$users, 'carousel_product' => $carousel_product]);
        } else {
            return redirect()->route('home');
        }
    }

    public function review_add(Request $data,$id){
        $valid = $data->validate([
            'text' => ['required', 'min:15', 'max:255'],
            'star' => ['required']
        ]);
        
        $user = auth()->user();

        $review = new Reviews();
        $review->user = $user->id;
        $review->rating = $data->input('star');
        $review->text = $data->input('text');
        $review->product = $id;
        $review->status = 0;
        $review->save();

        return redirect()->route('product',$id);
    }

    public function category($id)
    {
        if(Puncts::where('id',$id)->count() > 0){
            $reviews = new Reviews;
            $favourites = new Favourites;
            $item = Puncts::find($id);
            $products = new Product();
            $c_name = Categories::find($item->category)->name;
            $carousel_product = new CarouselProduct();
            return view('category',['item' => $item,'c_name' => $c_name,'products'=>$products->all(),'reviews'=>$reviews,'favourites'=>$favourites, 'carousel_product' => $carousel_product->all()]);
        } else {
            return redirect()->route('home');
        }
    }

    public function brand($id)
    {
        if(Store::where('id',$id)->count() > 0){
            $reviews = new Reviews;
            $store = Store::find($id);
            $products = Product::where('store', '=', $id)->get();
            $favourites = new Favourites;
            return view('brand',['store'=>$store,'products'=>$products,'reviews'=>$reviews, 'favourites' => $favourites]);
        } else {
            return redirect()->route('home');
        }
    }

    public function favorites()
    {
        $reviews = new Reviews;
        $products = new Product;
        $user = auth()->user();
        $favourites = new Favourites;
        $carousel_product = new CarouselProduct();
        return view('favorites',['user'=>$user,'favourites'=>$favourites->all(),'products'=>$products,'reviews'=>$reviews, 'carousel_product' => $carousel_product->all()]);
    }

    public function order_one($id){
        $product = Product::find($id);
        $store = Store::find($product->store)->first();
        return view('order_one',['product'=>$product,'store'=>$store]);
    }

    public function order_one_p(Request $request, $id){
        $valid = $request->validate([
            'kolvo' => ['required','string'],
            'firstname' => ['required','string'],
            'lastname' => ['required','string'],
            'sposob' => ['required','string'],
            'tel' => ['required','string'],
        ]);
        $price = Product::find($id)->price;
        $review = new OrderOne;
        $review->product = $id;
        $review->kolvo = $request->input('kolvo');
        $review->summ = $price*$request->input('kolvo');
        $review->firstname = $request->input('firstname');
        $review->lastname = $request->input('lastname');
        $review->sposob = $request->input('sposob');
        $review->tel = $request->input('tel');
        $review->save();
    }

    public function add_to_cart($id,$col){
        $cart_count = Cart::where([['user_id', '=', auth()->user()->id], ['product_id', '=', $id]])->count();

        if($cart_count == 0) {
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;
            $cart->colvo = $col;
            $cart->save();
        } else {
            $cart = Cart::where([['user_id', '=', auth()->user()->id], ['product_id', '=', $id]])->first();
            $cart->colvo = $cart->colvo+$col;
            $cart->save();
        }

        return 1;
    }

    public function delete_cart($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cart');
    }

    public function plus_product($id) {
        $cart = Cart::find($id);
        $cart->colvo = $cart->colvo+1;
        $cart->save();

        return $cart->colvo;
    }

    public function minus_product($id) {
        $cart = Cart::find($id);
        $cart->colvo = $cart->colvo-1;
        $cart->save();

        if($cart->colvo == 0) {
            Cart::find($id)->delete();
        }

        return $cart->colvo;
    }

    public function search() {
        $search = new Product;
        return json_encode($search->all());
    }

    public function cart_order(Request $data) {
        $valid = $data->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'sposob' => ['required'],
            'adress' => ['required'],
            'tel' => ['required']
        ]);

        $cart = Cart::where('user_id', '=', auth()->user()->id)->get();

        $itogo = 0;
        foreach($cart as $item) {
            $my_product = Product::where('id', '=', $item->product_id)->first();
            $itogo = $itogo + $my_product->price*$item->colvo;
        }

        $order = new CartOrder();
        $order->user_id = auth()->user()->id;
        $product = '';
        foreach($cart as $item){
            $product = $product.$item->product_id.'-'.$item->colvo.',';
        }
        $product = rtrim($product, ",");
        $order->product = $product;
        $order->summ = $itogo;
        $order->firstname = $data->input('firstname');
        $order->lastname = $data->input('lastname');
        $order->sposob = $data->input('sposob');
        $order->adress = $data->input('adress');
        $order->tel = $data->input('tel');
        $order->status = 0;
        $order->save();

        $cart = Cart::where('user_id', '=', auth()->user()->id)->delete();

        return 1;
    }   
}
