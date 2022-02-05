<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Puncts;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $base = new Categories();
        $puncts = new Puncts;
        View::share('menu_categories', $base->orderBy('id', 'asc')->get());
        View::share('puncts', $puncts->get());
    }
}
