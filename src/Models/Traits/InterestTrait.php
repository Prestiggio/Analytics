<?php
namespace Ry\Analytics\Models\Traits;

trait InterestTrait
{
	public function interest() {
		return $this->morphOne("\Ry\Analytics\Models\Interest", "interesse");
	}
}