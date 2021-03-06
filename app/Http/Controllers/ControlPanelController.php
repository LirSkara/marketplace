<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Collections;
use App\Models\Mactions;
use App\Models\Mrecomendations;
use App\Models\Reviews;
use App\Models\Puncts;
use App\Models\Product;
use App\Models\Slides;
use App\Models\User;
use App\Models\Store;
use App\Models\OrderOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ControlPanelController extends Controller
{
    public function index()
    {
        return view('control_panel.index');
    }

    public function personal()
    {
        $users = new User();
        return view('control_panel.personal', ['users' => $users->all()]);
    }

    public function categories()
    {
        $items = new Categories();
        $puncts = new Puncts;
        return view('control_panel.categories', ['items' => $items->orderBy('id', 'asc')->get(),'puncts' => $puncts->get()]);
    }

    public function slider()
    {
        $slides = new Slides();
        return view('control_panel.slider',['slides' => $slides->get()]);
    }

    public function collections()
    {
        $collections = new Collections();
        return view('control_panel.collections',['collections' => $collections->get()]);
    }

    public function add_collection(){
        return view('control_panel.forms.add_collection');
    }

    public function edit_collection($id){
        $item = Collections::find($id);
        return view('control_panel.forms.edit_collection',['item' => $item]);
    }

    public function add_collection_process(Request $data){
        $valid = $data->validate([
            'image' => ['required', 'image', 'mimetypes:image/jpeg,image/png'],
            'href' => ['required']
        ]);

        $file = $data->file('image');
        $upload_folder = 'public/collections'; //Создается автоматически
        $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения

        $review = new Collections();
        $review->image = $filename;
        $review->href = $data->input('href');
        $review->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return redirect()->route('collections');
    }

    public function collection_edit($id){
        $item = Collections::find($id);
        return view('control_panel.forms.collection_edit',['item' => $item]);
    }

    public function collection_edit_process($id, Request $data)
    {
        $valid = $data->validate([
            'href' => ['required']
        ]);

        $review = Collections::find($id);

        if(!empty($data->image)){
            $file = $data->file('image');
            $upload_folder = 'public/collections'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::delete($upload_folder . '/' . $review->image);
            $review->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $review->href = $data->input('href');
        $review->save();

        return redirect()->route('collections');
    }

    public function collection_delete_process($id){
        $review = Collections::find($id);
        $upload_folder = 'public/collections';
        Storage::delete($upload_folder . '/' . $review->image);
        $review->delete();
        return redirect()->route('collections');
    }

    public function mactions()
    {
        $mactions = new Mactions();
        return view('control_panel.mactions',['mactions' => $mactions->get()]);
    }

    public function add_maction(){
        return view('control_panel.forms.add_maction');
    }

    public function edit_maction($id){
        $item = Mactions::find($id);
        return view('control_panel.forms.edit_maction',['item' => $item]);
    }

    public function add_maction_process(Request $data){
        $valid = $data->validate([
            'image' => ['required', 'image', 'mimetypes:image/jpeg,image/png'],
            'href' => ['required']
        ]);

        $file = $data->file('image');
        $upload_folder = 'public/mactions'; //Создается автоматически
        $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения

        $review = new Mactions();
        $review->image = $filename;
        $review->href = $data->input('href');
        $review->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return redirect()->route('mactions');
    }

    public function maction_edit($id){
        $item = Mactions::find($id);
        return view('control_panel.forms.maction_edit',['item' => $item]);
    }

    public function maction_edit_process($id, Request $data)
    {
        $valid = $data->validate([
            'href' => ['required']
        ]);

        $review = Mactions::find($id);

        if(!empty($data->image)){
            $file = $data->file('image');
            $upload_folder = 'public/mactions'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::delete($upload_folder . '/' . $review->image);
            $review->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $review->href = $data->input('href');
        $review->save();

        return redirect()->route('mactions');
    }

    public function maction_delete_process($id){
        $review = Mactions::find($id);
        $upload_folder = 'public/mactions';
        Storage::delete($upload_folder . '/' . $review->image);
        $review->delete();
        return redirect()->route('mactions');
    }

    public function mrecomendations()
    {
        $products = new Product();
        $mrecomendations = new Mrecomendations();
        return view('control_panel.mrecomendations',['mrecomendations' => $mrecomendations->get(),'products'=>$products]);
    }

    public function add_mrecomendation(){
        return view('control_panel.forms.add_mrecomendation');
    }

    public function edit_mrecomendation($id){
        $item = Mrecomendations::find($id);
        return view('control_panel.forms.edit_mrecomendation',['item' => $item]);
    }

    public function add_mrecomendation_process(Request $data){
        $valid = $data->validate([
            'product' => ['required','string']
        ]);

        $product = Product::where('id','=',$data->input('product'))->count();
        $mr_count = Mrecomendations::where('product', '=', $data->input('product'))->count();

        if($product > 0){
            if($mr_count > 0){
                return redirect()->route('mrecomendations');
            } else {
                $review = new Mrecomendations();
                $review->product = $data->input('product');
                $review->save();
                return redirect()->route('mrecomendations');
            }
        } else {
            return redirect()->route('mrecomendations');
        }

    }

    public function mrecomendation_edit($id){
        $item = Mrecomendations::find($id);
        return view('control_panel.forms.mrecomendation_edit',['item' => $item]);
    }

    public function mrecomendation_edit_process($id, Request $data)
    {
        $valid = $data->validate([
            'product' => ['required','string']
        ]);

        $product = Product::where('id','=',$data->input('product'))->count();
        $mr_count = Mrecomendations::where('product', '=', $data->input('product'))->count();

        if($product > 0){
            if($mr_count > 0){
                return redirect()->route('mrecomendations');
            } else {
                $review = Mrecomendations::find($id);
                $review->product = $data->input('product');
                $review->save();
                return redirect()->route('mrecomendations');
            }
        } else {
            return redirect()->route('mrecomendations');
        }
    }

    public function mrecomendation_delete_process($id){
        $review = Mrecomendations::find($id);
        $review->delete();
        return redirect()->route('mrecomendations');
    }

    public function add_categories_process(Request $data)
    {
        $valid = $data->validate([
            'icon' => ['required'],
            'name' => ['required']
        ]);

        $review = new Categories();
        $review->icon = $data->input('icon');
        $review->name = $data->input('name');
        $review->save();

        return redirect()->route('c_p_categories');
    }

    public function category_edit($id)
    {
        $item = Categories::find($id);
        return view('control_panel.forms.category_edit',['item' => $item]);
    }

    public function category_edit_process($id, Request $data)
    {
        $valid = $data->validate([
            'icon' => ['required'],
            'name' => ['required']
        ]);

        $review = Categories::find($id);
        $review->icon = $data->input('icon');
        $review->name = $data->input('name');
        $review->save();

        return redirect()->route('c_p_categories');
    }

    public function category_delete_process($id){
        $review = Categories::find($id);
        $review->delete();
        return redirect()->route('c_p_categories');
    }

    public function punkt_add($id){
        $item = Categories::find($id);
        return view('control_panel.forms.punkt_add',['item' => $item]);
    }

    public function punkt_add_process($category, Request $data)
    {
        $valid = $data->validate([
            'name' => ['required']
        ]);

        $review = new Puncts();
        $review->name = $data->input('name');
        $review->category = $category;
        $review->save();

        return redirect()->route('c_p_categories');
    }

    public function edit_punct($id, Request $data)
    {
        $valid = $data->validate([
            'name' => ['required', 'min:3', 'max:15', 'string']
        ]);

        $punct = Puncts::find($id);
        $punct->name = $data->input('name');
        $punct->save();

        return redirect()->route('c_p_categories');
    }

    public function delete_punct($id)
    {
        Puncts::find($id)->delete();
        return redirect()->route('c_p_categories');
    }

    public function add_slide(){
        return view('control_panel.forms.add_slide');
    }

    public function edit_slide($id){
        $slide = Slides::find($id);
        return view('control_panel.forms.edit_slide',['slide' => $slide]);
    }

    public function add_slide_process(Request $data){
        $valid = $data->validate([
            'image' => ['required', 'image', 'mimetypes:image/jpeg,image/png'],
            'href' => ['required']
        ]);

        $file = $data->file('image');
        $upload_folder = 'public/slides'; //Создается автоматически
        $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения

        $review = new Slides();
        $review->image = $filename;
        $review->href = $data->input('href');
        $review->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return redirect()->route('slider');
    }

    public function edit_slide_process($id,Request $data){
        $valid = $data->validate([
            'href' => ['required']
        ]);

        $review = Slides::find($id);

        if(!empty($data->image)){
            $file = $data->file('image');
            $upload_folder = 'public/slides'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::delete($upload_folder . '/' . $review->image);
            $review->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $review->href = $data->input('href');
        $review->save();


        return redirect()->route('slider');
    }

    public function delete_slide_process($id){
        $review = Slides::find($id);
        $upload_folder = 'public/slides';
        Storage::delete($upload_folder . '/' . $review->image);
        $review->delete();
        return redirect()->route('slider');
    }

    public function product_post(){
        $products = Product::where('status','=',0)->get();
        return view('control_panel.product_post',['products'=>$products]);
    }

    public function review_post(){
        $reviews = Reviews::where('status','=',0)->get();
        $users = new User();
        return view('control_panel.review_post',['reviews'=>$reviews,'users'=>$users]);
    }

    public function store_list(){
        $stores = new Store();
        $product = new Product();
        return view('control_panel.store_list',['stores'=>$stores->all(),'product'=>$product]);
    }

    public function orders(){
        $one = new OrderOne;
        $product = new Product;
        $store = new Store;
        return view('control_panel.orders',[
            'one_orders'=>$one->all(),
            'product'=>$product,
            'store'=>$store
        ]);
    }
    
    public function add_personal(){
        return view('control_panel.forms.add_personal');
    }

    public function search_personal($poisk){
        $user_poisk_count = User::where('id', '=', $poisk)->count();

        if($user_poisk_count != 0){
            return 1;
        } else {
            return 2;
        }
    }

    public function user_personal($id){
        $user = User::where('id', '=', $id)->first();
        return view('control_panel.user_personal', ['user' => $user]);
    }

    public function downgrade($id){
        $user = User::find($id);

        if($user->status == 2) {
            $user->status = 0;
            $user->save();
            return $user->status;
        } elseif ($user->status == 7) {
            $user->status = 2;
            $user->save();
            return $user->status;
        } elseif ($user->status == 9) {
            $user->status = 7;
            $user->save();
            return $user->status;
        }
    }

    public function raise($id){
        $user = User::find($id);

        if($user->status == 0) {
            $user->status = 2;
            $user->save();
            return $user->status;
        } elseif ($user->status == 2) {
            $user->status = 7;
            $user->save();
            return $user->status;
        } elseif ($user->status == 7) {
            $user->status = 9;
            $user->save();
            return $user->status;
        }
    }
}
