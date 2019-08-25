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
}