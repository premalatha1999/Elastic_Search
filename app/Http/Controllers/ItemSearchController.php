<?php

namespace App\Http\Controllers;

use App\Item;
use App\Shop;
use Illuminate\Http\Request;

class ItemSearchController extends Controller
{
    /**
     * It will Display the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $items = Shop::search($request->input('search'))->toArray();
//            $articles = Shop::searchByQuery(['match' => ['title' => 'Sed']]);
        }
        return view('ItemSearch',compact('items'));
    }

    /**
     * It will Display the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Shop::addAllToIndex();
        $items = "";
        return view('ItemSearch',compact('items'));
    }
}
