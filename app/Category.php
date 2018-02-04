<?php

namespace loja;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
	
    protected $fillable = array("name", "image");
	
	public function products()
    {
        return $this->belongsToMany('loja\Product');

    }
}
