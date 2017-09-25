<?php

namespace Ry\Analytics\Models;

use Illuminate\Database\Eloquent\Model;
use Ry\Categories\Models\Traits\CategorizableTrait;

class Interest extends Model
{
	use CategorizableTrait;
	
    protected $table = "ry_analytics_interests";
    
    public function interesse() {
    	return $this->morphTo();
    }
}
