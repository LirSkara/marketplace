<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);

        if (auth('web')->attempt($data)) {
            return redirect()->route('cabinet');
        } else {
            return redirect()->route('login')->withErrors([
                'email' => 'Email или пароль введены неверно!'
            ]);
        }
    }

    public function register_process(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([
            'avatar' => 'default.png',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => 0,
        ]);

        if ($user) {
            auth('web')->login($user);
        }

        return redirect()->route('cabinet');
    }

    public function exit()
    {
        auth('web')->logout();
        return redirect()->route('home');
    }

    public function cabinet()
    {
        $user = auth()->user();
        return view('auth.cabinet', ['user' => $user]);
    }

    public function user_info_edit()
    {
        $user = auth()->user();
        return view('auth.user_info_edit', ['user' => $user]);
    }

    public function user_info_edit_avatar(Request $data)
    {
        $valid = $data->validate([
            'avatar' => ['required', 'image', 'mimetypes:image/jpeg,image/png']
        ]);

        $user = auth()->user();
        $review = User::find($user->id);
        $upload_folder = 'public/avatars';
        $file = $data->file('avatar');

        if (empty($review->avatar)) {
            $filename = 'User_ID_' . $user->id . '_' . $file->getClientOriginalName();
        } else {
            if ($user->avatar != 'default.png') {
                Storage::delete($upload_folder . '/' . $review->avatar);
            }
            $filename = 'User_ID_' . $user->id . '_' . $file->getClientOriginalName();
        }

        $review->avatar = $filename;
        $review->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return redirect()->route('cabinet');
    }

    public function user_info_edit_process(Request $data)
    {
        $valid = $data->validate([
            'firstname' => ['required', 'min:1'],
            'lastname' => ['required', 'min:1'],
            'patronymic' => ['required', 'min:1'],
            'adress' => ['required', 'min:5'],
            'tel' => ['required', 'min:10'],
            'gender' => ['required']
        ]);

        $user = auth()->user();

        $review = User::find($user->id);
        $review->firstname = $data->input('firstname');
        $review->lastname = $data->input('lastname');
        $review->patronymic = $data->input('patronymic');

        if (!empty($data->input('day'))) {
            $review->day = $data->input('day');
        }
        if (!empty($data->input('mounth'))) {
            $review->mounth = $data->input('mounth');
        }
        if (!empty($data->input('year'))) {
            $review->year = $data->input('year');
        }

        $review->adress = $data->input('adress');
        $review->tel = $data->input('tel');
        $review->gender = $data->input('gender');
        $review->save();

        return redirect()->route('cabinet');
    }

    public function delivery()
    {
        return view('my.delivery');
    }

    public function sale()
    {
        return view('my.sale');
    }

    public function coupons()
    {
        return view('my.coupons');
    }

    public function stocks()
    {
        return view('my.stocks');
    }

    public function expenses()
    {
        return view('my.expenses');
    }

    public function purchases()
    {
        return view('my.purchases');
    }

    public function activity()
    {
        return view('my.activity');
    }
}
