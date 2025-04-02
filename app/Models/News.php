<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'tieu_de', 'mo_ta', 'noi_dung', 'hinh_anh', 
        'luot_xem', 'an_hien', 'the_tag', 'noi_bat', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}