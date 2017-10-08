<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;

class EmailTemplate extends Model
{
    //
    use Sluggable;
    protected $table = 'emailTemplates';

    protected $fillable = [
        'constant','subject','message','slug','status',
    ];

    public function sluggable()
    {
    	return [
    		'slug' => [
    			'source' => ['constant']	
    		]
    	];
    }

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [];
}
