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
//          $items = Shop::searchByQuery(['match' => ['title' => 'Sed']]);
//            $items = Shop::complexSearch(array(
//                'body' => array(
//                    'query' => array(
//                        'match' => array(
//                            'title' => 'Moby Dick'
//                        )
//                    )
//                )
//            ));
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
//        $shop = Shop::where('id', '<', 200)->get();
//        $shop->addToIndex();
//        Book::reindex();
//        $shop->removeFromIndex;
        $items = "";
        return view('ItemSearch',compact('items'));
    }
}
