<?php
namespace Ry\Analytics\Models\Traits;

trait Fulfil
{
	public function applications() {
		return $this->morphMany("Ry\Analytics\Models\Fulfilment", "fulfil");
	}
}