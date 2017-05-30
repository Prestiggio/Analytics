<?php
namespace Ry\Analytics;

use Illuminate\Database\Eloquent\Model;
use Ry\Analytics\Models\Slug;
use Ry\Analytics\Models\Wish;
use Ry\Analytics\Models\Fulfilment;

class Slugger
{	
	public function __construct() {
		$this->register("wish", Wish::class);
		$this->register("fulfilment", Fulfilment::class);
	}
	
	public function register($route, $classname) {
		app('router')->bind($route, function($value){
			return Slug::where("slug", "=", $value)->first()->linkable;
		});
		
		call_user_func([$classname, "saved"], function($entity){
			if(!$entity->slugs()->exists()) {
				$entity->slugs()->create([
					"slug" => $entity->slug
				]);
			}
			else {
				$entity->slugs()->update([
					"slug" => $entity->slug
				]);
			}
		});
	}
}