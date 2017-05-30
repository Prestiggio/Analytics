<?php
namespace Ry\Analytics\Models;

use Illuminate\Database\Eloquent\Model;
class Reaction extends Model
{
	protected $table = "ry_analytics_fulfilment_reactions";
	
	public function fulfilment() {
		return $this->belongsTo("Ry\Analytics\Models\Fulfilment", "fulfilment_id");
	}
}