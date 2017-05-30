<?php
Route::get("/offres-membre/{fulfilment}", "UserController@offer")->where("fulfilment", ".+");
Route::controller("/membre-ai/", "UserController");
