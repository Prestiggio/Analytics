<?php
namespace Ry\Analytics\Http\Controllers;

use App\Http\Controllers\Controller;
use Ry\Analytics\Models\Fulfilment;
use Ry\Analytics\Models\Wish;
class UserController extends Controller
{
	public function __construct() {
		$this->middleware(["web", "auth"]);
	}
	
	public function offer(Wish $wish, Fulfilment $fulfilment) {
		return $fulfilment;
	}
}