<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Database\Eloquent\Builder;

class DishController extends Controller
{
    public function index () {

        $slug = $_GET['query']; //recupero il parametro query (id di category)

      if($slug) { //se la categoria e' selezionata
        $dishes = Dish::whereHas('restaurant', function (Builder $query) use ($slug)  {
          $query->where('slug', '=', $slug);
        })->get(); //cerco quei ristoranti che hanno una categoria con id specifica
      } else {
          $dishes = Dish::all();
          // $dishes = [];

      }

         // prendo tutti i post
        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $dishes
        ]);
    }

}
