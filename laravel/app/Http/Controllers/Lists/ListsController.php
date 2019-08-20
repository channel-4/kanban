<?php

namespace App\Http\Controllers\Lists;

use App\Listing;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ListsController extends Controller
{
    /**
     * ログインしていない場合は
     * ログインページに遷移させる
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
        dd('test');
    }
}
