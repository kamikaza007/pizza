<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
	public function getImageUrlAttribute()
	{
		return asset('uploads/pizzas/'.$this->id.'.jpg');
	}

	public function getThumbnailUrlAttribute()
	{
		return asset('uploads/pizzas/thumbnail_'.$this->id.'.jpg');
	}

    public function creator()
    {
    	return $this->belongsTo(User::class, 'created_by');
    }
}
