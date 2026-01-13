<?php

namespace App\Http\Controllers;

use App\Models\Sorting;
use Illuminate\Http\Request;

class SortingController extends Controller
{
    public function index(){
        $sorting = Sorting::all()->toArray();

        return view('main', ['sorting' => $sorting]);
    }
}
