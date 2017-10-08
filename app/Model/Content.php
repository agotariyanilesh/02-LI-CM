<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Content extends Model
{
    //
    use Sluggable;
    protected $table ='content';

    protected $fillable = [
        'contentTypeId','title','content','slug','status',
    ];

    public function sluggable()
    {
    	return [
    		'slug' => [
    			'source' => ['title']	
    		]
    	];
    }

    public function contentType()
    {
        return $this->belongsTo('App\Model\ContentType','contentTypeId');
    }

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [];
}
	