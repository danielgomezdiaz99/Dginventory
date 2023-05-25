<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected static $subcategoryModel = 'App\Models\Subcategory';

    // Artículo	Subfamilia	RAT-110	Ubicación	Asignación	Fecha entrega	Fecha revisión	Disponible	Estado	Estado	OBSERVACIONES

    protected $fillable = [
        'name',
        'stock',
        'subcategory_id',
        'photo_path',
        'available',
        'visible',
        'status',
    ];

    public function subcategory(){
        return $this->belongsTo(self::$subcategoryModel);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_article', 'article_id', 'order_id');
    }
}
