<?php

namespace loja;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
	
    protected $fillable = array("name", "description", "price", "image");
	
	public function categories()
    {
        return $this->belongsToMany('loja\Category');

    }
	
}
