<?php 
namespace Ry\Analytics;

class Analytic
{
	public function js(&$setup) {
		$setup["google"] = [
    					"key" => env("googlekey")
    			];
		$setup["ga"] = env("ga");
		$setup["captcha"] = env("captcha");
	}
}

?>