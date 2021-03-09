<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class ItemsController extends Controller
{
    public function items($locale){
        $items = Item::get()
        ->map(function ($items ) use($locale){

            return[
                'name'=>$items->getTranslatedAttribute('name', $locale)
            ];
        });
        return response()->json($items);

    }
}
