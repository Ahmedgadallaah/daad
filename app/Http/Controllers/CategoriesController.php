<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class CategoriesController extends Controller
{
    // main Categories
    public function main_categories($locale)
    {
        $categories  = Category::where('parent_id' , null)->get()
            ->map(function ($categories) use ($locale){
            return [
                'id' =>$categories->id,
                'name' => $categories->getTranslatedAttribute('name' , $locale) ,
                'description' => $categories->getTranslatedAttribute('description' , $locale) ,
                'file' => json_decode($categories->file)
            ];
        });
        return response()->json($categories);

    }    // Sub Categories
    public function sub_categories($locale , $id)
    {
        $categories  = Category::where('parent_id' ,$id)->get()
            ->map(function ($categories) use ($locale){
            return [
                'id' =>$categories->id,
                'name' => $categories->getTranslatedAttribute('name' , $locale) ,
                'description' => $categories->getTranslatedAttribute('description' , $locale) ,
                'file' => json_decode($categories->file)
            ];
        });
        return response()->json($categories);

    }


//    // Categories
//    public function sub_categories($locale , $id)
//    {
//        $categories  = Category::where('parent_id' ,$id)->get()
//            ->map(function ($categories) use ($locale){
//                return [
//                    'id' =>$categories->id,
//                    'name' => $categories->getTranslatedAttribute('name' , $locale) ,
//                    'description' => $categories->getTranslatedAttribute('description' , $locale) ,
//                    'file' => json_decode($categories->file)
//                ];
//            });
//        return response()->json($categories);
//
//    }
}
