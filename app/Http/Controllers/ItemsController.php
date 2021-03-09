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
                'id'=>$items->id,
                'name'=>$items->getTranslatedAttribute('name', $locale),
                'short_description'=>$items->getTranslatedAttribute('short_description', $locale),
                'long_description'=>$items->getTranslatedAttribute('long_description', $locale),
                'category_id'=>$items->category_id,
                'file' => json_decode($items->file),
                'year'=>$items->created_at->format('Y'),
                'created_at'=>$items->created_at->format('Y-m-d'),
            ];
        });
        return response()->json($items);

    }
}
