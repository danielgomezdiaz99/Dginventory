<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected static $userModel = 'App\Models\User';

    protected $fillable = [
        'status',
    ];
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'order_article', 'order_id', 'article_id');
    }
    public function user(){
        return $this->belongsTo(self::$userModel);
    }
}
