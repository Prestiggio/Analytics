<?php
namespace Ry\Analytics\Models\Traits;

trait LinkableTrait
{
	public function slugs() {
		return $this->morphMany("Ry\Analytics\Models\Slug", "linkable");
	}
	
	public function getRouteKeyName() {
		return "slug";
	}
}