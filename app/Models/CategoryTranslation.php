<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    // protected $table = 'product_translations';
    public $timestamps = false;
    protected $fillable = ['name', 'content'];
}
