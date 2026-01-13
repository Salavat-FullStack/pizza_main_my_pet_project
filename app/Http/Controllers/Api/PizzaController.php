<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::paginate(9);
        return response()->json($pizzas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    
    // public function setSessionPizza(Request $request)
    // {
    //     $pizza = $request->input('pizza', []);

    //     if (!isset($pizza['name']) || empty($pizza['ingredients'])) {
    //         return redirect()->back()->with('error', 'Некорректные данные пиццы');
    //     }

    //     if (is_array($pizza)) {
    //         $pizza['finelPrice'] = 0;
    //         $pizza['finelCalories'] = 0;
    //         $pizza['finelWeight'] = 0;
    //         $pizza['price'] = 0;
    //         $pizza['calories'] = 0;

    //         foreach($pizza['ingredients'] as &$el){
    //             $el['finelPrice'] = $el['price'] * $el['quantity'];
    //             $el['finelCalories'] = $el['calories'] * $el['quantity'];
    //             $el['finelWeight'] = $el['weight'] * $el['quantity'];

    //             $pizza['calories'] += $el['calories'];
    //             $pizza['weight'] += $el['weight'];

    //             $pizza['price'] += $el['price'];
    //             $pizza['finelPrice'] += $el['finelPrice'];
    //             $pizza['finelWeight'] += $el['finelWeight'];
    //             $pizza['finelCalories'] += $el['finelCalories'];
    //         }
    //     }
    //     session(['pizza' => $pizza]);

    //     return response()->json([
    //         'redirect_url' => url('/pizza/view')
    //     ]);
    // }


    // public function getSessionPizza(Request $request)
    // {
    //     $pizza = session('pizza');

    //     return response()->json([
    //         'pizza' => $pizza
    //     ]);
    // }

    public function showPizzaView(Request $request)
    {

        $pizza = json_decode($request->input('pizza', '{}'), true);

        if (!isset($pizza['name']) || empty($pizza['ingredients'])) {
            return redirect()->back()->with('error', 'Некорректные данные пиццы');
        }

        if (is_array($pizza)) {
            $pizza['finelPrice'] = 0;
            $pizza['finelCalories'] = 0;
            $pizza['finelWeight'] = 0;
            $pizza['price'] = 0;
            $pizza['calories'] = 0;
            

            foreach($pizza['sizes'] as $size){
                if($size['name'] == 'средняя'){
                    $pizza['size'] = $size;
                }
            }

            foreach($pizza['thicknesses'] as $item){
                if(trim($item['thickness']) == 'Тонкое'){
                    $pizza['finelThicknesses'] = $item;
                }
            }

            foreach($pizza['ingredients'] as &$el){
                $el['finelPrice'] = $el['price'] * $el['quantity'];
                $el['finelCalories'] = $el['calories'] * $el['quantity'];
                $el['finelWeight'] = $el['weight'] * $el['quantity'];

                $pizza['calories'] += $el['calories'];
                $pizza['weight'] += $el['weight'];

                $pizza['price'] += $el['price'];
                $pizza['finelPrice'] += $el['finelPrice'];
                $pizza['finelWeight'] += $el['finelWeight'];
                $pizza['finelCalories'] += $el['finelCalories'];
            }
        }

        if (!$pizza) {
            return redirect('/')->with('error', 'Ошибка');
        }

        // return response()->json([
        //     'redirect_url' => url('/pizza/view')
        // ]);

        if($request->cookie('authToken')){
            $loggedUser = true;
        }else{
            $loggedUser = false;
        }

        return view('pizza.view', compact('pizza'), ['loggedUser' => $loggedUser]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
