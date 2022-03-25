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

class MainController extends Controller
{
    public function home()
    {
        $slides = new Slides();
        $collections = new Collections();
        $mactions = new Mactions();
        return view('home',['slides' => $slides->orderBy('id','desc')->get(),'collections' => $collections->orderBy('id','desc')->get(),'mactions' => $mactions->orderBy('id','desc')->get()]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function product($id)
    {
        if(Product::where('id',$id)->count() > 0){
            $product = Product::find($id);
            $punct = Puncts::find($product->category)->first();
            $category = Categories::find($punct->category)->first();
            $reviews = Reviews::where('product', '=', $product->id);
            $users = new User();
            
            return view('product',['product'=>$product,'punct'=>$punct,'category'=>$category,'reviews'=>$reviews->orderBy('id','desc')->get(),'users'=>$users]);
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
            return view('category',['item' => $item,'c_name' => $c_name,'products'=>$products->all(),'reviews'=>$reviews,'favourites'=>$favourites]);
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
            return view('brand',['store'=>$store,'products'=>$products,'reviews'=>$reviews]);
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
        return view('favorites',['user'=>$user,'favourites'=>$favourites->all(),'products'=>$products,'reviews'=>$reviews]);
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

    public function add_to_cart($id){
        return 1;
    }

    public function search($poisk) {
        $search = new Product;
        return view('search', ['search' => $search->all(),'poisk'=>$poisk]);
    }
}
