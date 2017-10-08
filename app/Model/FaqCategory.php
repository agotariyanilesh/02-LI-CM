<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;

class FaqCategory extends Model
{
    //
	use Sluggable;
    protected $table = 'FaqCategory';

	protected $fillable = [
		'title','slug','status',
	];

	public function sluggable()
    {
    	return [
    		'slug' => [
    			'source' => ['title']	
    		]
    	];
    }

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [];
}
