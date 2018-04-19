<?php
namespace Ry\Analytics\Models;

use Illuminate\Database\Eloquent\Model;
use Ry\Md\Models\Traits\StructuredData;
use Ry\Analytics\Models\Traits\LinkableTrait;

class Wish extends Model
{
	use StructuredData, LinkableTrait;
	
	protected $table = "ry_analytics_wishes";
	
	protected $fillable = ["keywords", "ry_categories_category_group_id"];
	
	public function owner() {
		return $this->belongsTo("App\User", "user_id");
	}
	
	public function category() {
		return $this->belongsTo("Ry\Categories\Models\Categorygroup", "ry_categories_category_group_id");
	}
	
	public function showAdditionals() {
		return true;
	}
	
	public function getNameAttribute() {
		return $this->keywords;
	}
	
	public function offers() {
		return $this->hasMany("Ry\Analytics\Models\Fulfilment", "wish_id");
	}
	
	public function getSlugAttribute() {
		return str_slug($this->keywords);
	}
}