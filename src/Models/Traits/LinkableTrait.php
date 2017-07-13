<?php
namespace Ry\Analytics\Models\Traits;

trait LinkableTrait
{
	public function slugs() {
		return $this->morphOne("Ry\Analytics\Models\Slug", "linkable");
	}
	
	public function getRouteKeyName() {
		return "slug";
	}
}