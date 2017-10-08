<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;

class ContentType extends Model
{
    //
	use Sluggable;
    protected $table ='contentType';

    protected $fillable = [
        'contentType','slug','status',
    ];

    public function sluggable()
    {
    	return [
    		'slug' => [
    			'source' => ['contentType']	
    		]
    	];
    }
    
    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [];

    public function content()
    {
        $this->hasMany('App\Model\Content','contentTypeId','id');
    }

}
