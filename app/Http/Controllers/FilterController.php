<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(){
        $filter = Filter::all()->toArray();;

        return view('main', ['filter' => $filter]);
    }
}
