<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Pizza;
use App\PriceCalculator\PizzaPriceCalculator;
use Illuminate\Http\Request;

use App\Http\Requests;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result["pizzas"] = Pizza::with('ingredients')->get();
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Falta validacion de input
        $pizza = $request->get("pizza");
        $ingredients = $pizza["ingredients"];

        $pizzaDb = new Pizza();
        $this->inflatePizza($pizza, $pizzaDb);
        $pizzaDb->save();
        $this->saveIngredients($pizzaDb, $ingredients);
        return $pizzaDb->with("ingredients")->find($pizzaDb->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Falta validacion input

        $pizza = $request->get("pizza");
        $ingredients = $pizza["ingredients"];

        $pizzaDb = Pizza::find($id);
        $this->inflatePizza($pizza, $pizzaDb);
        $pizzaDb->save();
        $this->saveIngredients($pizzaDb, $ingredients);
        return $pizzaDb->with("ingredients")->find($pizzaDb->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result["result"] = "success";
        if($pizza = Pizza::find($id)) {
            $pizza->delete();
        }
        else {
            $result["result"] = "fail";
        }
        return $result;
    }

    protected function saveIngredients($pizzaDb, $ingredients) {
        $pizzaDb->ingredients()->delete();
        foreach($ingredients as $ingredient) {
            if(array_key_exists("id", $ingredient)) {
                $ingredientDb = Ingredient::find($ingredient["id"]);
            }
            else {
                $ingredientDb  = new Ingredient();
                $ingredientDb->name = $ingredient["name"];
                $ingredientDb->amount = $ingredient["amount"];
            }

            $pizzaDb->ingredients()->save($ingredientDb);
        }
    }

    /**
     * @param $pizza
     * @param $pizzaDb
     */
    private function inflatePizza($pizza, $pizzaDb)
    {
        $pizzaDb->name = $pizza["name"];
        $pizzaDb->image = $pizza["image"];
    }
}
