<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;

class Faq extends Model
{
    //
    use Sluggable;
    protected $table ='faq';

    protected $fillable = [ 
    	'faqCatId','question','answer','slug','status',
    ];

	public function sluggable()
    {
    	return [
    		'slug' => [
    			'source' => ['question']	
    		]
    	];
    }

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [];


}
