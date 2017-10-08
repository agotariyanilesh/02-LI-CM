<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    //
    use Sluggable;
    protected $table ='category';

    protected $fillable = [
        'category_name', 'category_desc','category_slug','status',
    ];


    public function sluggable()
    {
    	return [
    		'category_slug' => [
    			'source' => ['category_name']	
    		]
    	];
    }
    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [];
}
