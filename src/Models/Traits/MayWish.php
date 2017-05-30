<?php
namespace Ry\Analytics\Models\Traits;

trait MayWish
{
	public function wishes() {
		return $this->hasMany("Ry\Analytics\Models\Wish", "user_id");
	}
}