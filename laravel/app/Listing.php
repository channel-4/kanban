<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'lists';
     
    public function cards()
    {
        return $this->hasMany('App\Card', 'list_id');
    }
}
