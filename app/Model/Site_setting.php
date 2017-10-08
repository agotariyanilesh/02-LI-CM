<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Site_setting extends Model
{
	protected $table = 'siteSettings';
    protected $fillable = ['site_name','site_logo','site_favicon','fb_url','tw_url','li_url','contact_email','contact_num','paypal_user','paypal_pwd','paypal_secret','smtp_user','smtp_pwd'];
}
