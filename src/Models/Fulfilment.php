<?php
namespace Ry\Analytics\Models;

use Illuminate\Database\Eloquent\Model;
use Ry\Analytics\Models\Traits\LinkableTrait;
class Fulfilment extends Model
{
	use LinkableTrait;
	
	protected $table = "ry_analytics_fulfilments";
	
	protected $fillable = ["wish_id", "user_id"];
	
	protected $appends = ["offer"];
	
	public function wish() {
		return $this->belongsTo("Ry\Analytics\Models\Wish", "wish_id");
	}
	
	public function editor() {
		return $this->belongsTo("App\User", "user_id");
	}
	
	public function fulfil() {
		return $this->morphTo();
	}
	
	public function getSlugAttribute() {
		return $this->wish->slug . "/" . str_slug($this->fulfil->title);
	}
	
	public function getLinkAttribute() {
		return action("\Ry\Analytics\Http\Controllers\UserController@offer", ["fulfilment" => $this]);
	}
	
	public function getOfferAttribute() {
		$this->fulfil->structured = false;
		return $this->fulfil;
	}
}