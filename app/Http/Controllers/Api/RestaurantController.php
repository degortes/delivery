<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Course;
use Illuminate\Database\Eloquent\Builder;

class RestaurantController extends Controller

//filtro per selezione categoria
{
    public function index () {


    //recupero il parametro query (id di category)

      if(isset($_GET['query'])) {
          $category_id = $_GET['query'];//se la categoria e' selezionata
          $show = [];

          foreach ($category_id as $category) {
              // code...
              $restaurants = Restaurant::whereHas('categories', function (Builder $query) use ($category)  {
                  $query->where('id', '=', $category);
              })->get();
              foreach ($restaurants as $restaurant) {
                  if (!in_array($restaurant , $show )) {
                      // code...
                      $show[] = $restaurant;
                  }
                  // code...
              }
          }
          $restaurants = $show;
         //cerco quei ristoranti che hanno una categoria con id specifica
      } else {
        //recupero il parametro query (id di category)

        $restaurants = Restaurant::limit(8)->orderBy('id' , 'desc')->get();
      }

         // prendo tutti i post
        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $restaurants
        ]);
    }

}
