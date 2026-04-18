<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogOrder extends Model
{
    protected $table = 'user_blogorder';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["order_id", "blog_item_id", "quantity"];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function blog() {
        return $this->belongsTo(Blog::class, 'blog_item_id', 'id');
    }

}
