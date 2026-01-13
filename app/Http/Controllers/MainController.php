<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\Pizza;
use App\Models\Sorting;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
        $filter = Filter::all()->toArray();
        $sorting = Sorting::all()->toArray();

        // $pizza = Pizza::query()->find(1);
        // $ingredients = $pizza->ingredients->toArray();
        // $pizzaThickness = $pizza->thicknesses->toArray();

        $pizzas = Pizza::with(['ingredients', 'thicknesses', 'sizes'])->get();

        foreach($pizzas as $pizza){
            $pizza->quantity = 1;
            $pizza->finelPrice = 0;
            $pizza->finelCalories = 0;
            $pizza->finelWeight = 0;
            $pizza->finelThicknesses = $pizza->thicknesses->firstWhere('thickness', 'Тонкое');
            $pizza->size = $pizza->sizes->firstWhere('name', 'средняя');
            $pizza->price = $pizza->ingredients->sum('price');
            $pizza->calories = 0;

            foreach($pizza->ingredients as $el){
                $el->quantity = 1;
                $el->finelPrice = $el->price;
                $el->finelCalories = 0;
                $el->finelWeight = 0;
                $pizza->calories += $el->calories;
                $pizza->weight += $el->weight;
            }
        }

        if($request->cookie('authToken')){
            $loggedUser = true;
        }else{
            $loggedUser = false;
        }

        return view('main', [
            'filter' => $filter,
            'sorting' => $sorting,
            'pizzas' => $pizzas,
            'loggedUser' => $loggedUser
        ]);
    }
}
