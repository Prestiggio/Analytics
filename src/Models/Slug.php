<?php
namespace Ry\Analytics\Models;

use Illuminate\Database\Eloquent\Model;
class Slug extends Model
{
	protected $table = "ry_analytics_slugs";
	
	protected $fillable = ["slug"];
	
	public function linkable() {
		return $this->morphTo();
	}
}