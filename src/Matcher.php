<?php
namespace Ry\Analytics;

use Mail, Auth;
use Ry\Analytics\Models\Wish;

class Matcher
{
	public function wish($keywords, $group) {
		$user = Auth::user();
		if($user && !$user->wishes()->where("keywords", "LIKE", $keywords)->exists()) {
			Wish::unguard();
			$user->wishes()->create([
					"keywords" => $keywords,
					"ry_categories_category_group_id" => $group
			]);
			Wish::reguard();
			$ar = ["content" => $keywords, "user" => $user];
			Mail::send("ryanalytics::emails.wishlist", $ar, function($message) use ($user){
				$message->to(env("contact"));
				$message->from(env("contact", "manager@topmora.com"), env("SHOP", "TOPMORA SHOP"));
				$message->subject("Wish list de " . $user->name);
			});
		}
	}
	
	public function offer($wish, $offers) {
		$user = Auth::user();
		
		if($wish->user_id == $user->id)
			abort(404);
		
		foreach ($offers as $offer) {
			if(!$offer->applications()->where("wish_id", "=", $wish->id)->exists()) {
				$application = $offer->applications()->create([
						"wish_id" => $wish->id,
						"user_id" => $user->id
				]);
				Mail::send("ryanalytics::emails.match", [
						"offer" => $application
				], function($message){
					$message->to(env("contact"));
					$message->subject("Un offre pour vous sur " . env("SHOP", "TOPMORA SHOP"));
					$message->from(env("contact", "manager@topmora.com"), env("SHOP", "TOPMORA SHOP"));
				});
			}
		}
	}
}