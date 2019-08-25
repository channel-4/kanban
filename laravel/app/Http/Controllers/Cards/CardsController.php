<?php

namespace App\Http\Controllers\Cards;

use Auth;
use App\Card;
use App\Listing;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardPost;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function new(int $list_id)
    {
        $list_title = Listing::find($list_id)->value('title');
        
        return view('card/new', [
            'list_id' => $list_id,
            'list_title' => $list_title
        ]);
    }
    
    public function store(int $list_id, StoreCardPost $request)
    {
        $card = new Card;
        $card->title   = $request->title;
        $card->memo    = $request->memo;
        $card->list_id = $request->list_id;
        
        $card->save();
        return redirect('/')->with('カードを追加しました');
    }
}
