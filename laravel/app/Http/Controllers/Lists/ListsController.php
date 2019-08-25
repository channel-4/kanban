<?php

namespace App\Http\Controllers\Lists;

use App\Listing;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListPost;

/**
 * リスト関連の処理
 * 名前空間で"List"が使えなかったので都合上"Lists"に
 */
class ListsController extends Controller
{
    /**
     * ログインしていない場合は
     * ログインページに遷移させる
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * トップページ
     * リスト一覧を取得し、Viewに渡す
     */
    public function index()
    {
        // ログインユーザーのリストを総取得
        // 作成日に応じて昇順で出す
        $lists = Listing::where('user_id', Auth::user()->id)
                 ->orderBy('created_at', 'asc')
                 ->get();

        return view('list/index', ['lists' => $lists]);
    }
    
    /**
     * 新規追加 getアクセス時 (= 追加画面表示)
     */
    public function new()
    {
        return view('list/new');
    }
    
    /**
     * 新規追加 postアクセス時 (= 保存処理)
     */
    public function store (StoreListPost $request)
    {
        // 保存処理
        $list = new Listing;
        $list->title = $request->title;
        $list->user_id = Auth::user()->id;

        $list->save();
        
        return redirect('/')->with('flash_message', 'リストを追加しました');
    }
    
    /**
     * 更新画面表示
     */
    public function edit(int $list_id)
    {
        $list = Listing::find($list_id);
        return view('list/edit', ['list' => $list]);
    }
    
    public function update(StoreListPost $request, int $list_id)
    {
        $list = Listing::find($list_id);
        $list->title = $request->title;
        $list->save();
        return redirect('/')->with('flash_message', 'リスト名を変更しました');
    }
    
    public function destroy(int $list_id)
    {
        $list = Listing::find($list_id);
        $list->delete();
        return redirect('/')->with('flash_message', 'リストの削除が完了しました');
    }
}
