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
        $list_title = Listing::find($list_id);
        return view('card/new', [
            'list_id' => $list_id,
            'list_title' => $list_title->title
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
    
    public function edit(int $list_id, int $card_id)
    {
        $list_title = Listing::find($list_id);
        $card = Card::find($card_id);
        
        return view('card.edit', [
            'list_id' => $list_id,
            'list_title' => $list_title->title,
            'card' => $card
        ]);
    }
    
    public function update(int $list_id, int $card_id, StoreCardPost $request)
    {
        // 現状list_idは使わない
        // TODO カードを別のリストに移動させる機能実装時に使用
        $card = Card::find($card_id);
        
        $card->title = $request->title;
        $card->memo  = $request->memo;

        $card->save();
        
        return redirect('/')->with('flash_message', 'カードを編集しました');
    }
    
    public function destroy(int $card_id)
    {
        $card = Card::find($card_id);
        $card->delete();
        
        return redirect('/')->with('flash_message', 'カードを削除しました');
    }
}
