<?php

namespace Ry\Analytics\Console\Commands;

use Illuminate\Console\Command;
use Ry\Analytics\Models\Slug;
use Illuminate\Database\Eloquent\Model;

class Slugify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analytics:slugify {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Slugify l\'attribut d\'un model';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $classname = $this->argument("model");
        
        $use_trait = array_has(class_uses($classname), "Ry\Analytics\Models\Traits\LinkableTrait");
        while(!$use_trait) {
        	if(!$this->confirm("Ampio trait Ry\Analytics\Models\Traits\LinkableTrait aloha le user e")) {
        		$this->warn("Tsy manana linkable zany ny $classname an");
        		break;
        	}
        	$use_trait = array_has(class_uses($classname), "Ry\Analytics\Models\Traits\LinkableTrait");
        	if(!$use_trait) {
        		$this->error("Mbol ts hita ian");
        	}
        }
        
        while(!method_exists(new $classname(), "getSlugAttribute")) {
        	$this->error("mila getSlugAttribute io model io an");
        	$this->confirm("Enter when ok !", true);
        }
        
        $all = call_user_func([$classname, "all"]);
        Model::unguard();
        foreach($all as $a) {
        	if(!$a->slugs()->exists()) {
        		$a->slugs()->create([
        			"slug" => $a->slug
        		]);	
        	}
        }
        Model::reguard();
    }
    
    protected function getArguments() {
    	return ["model"];
    }
}
