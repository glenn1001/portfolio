<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([
				'title' 		=> 'title ' . $index,
				'body' 			=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
				'pos' 			=> $index . 0,
				'active' 		=> 1,
				'menu' 			=> 1
			]);
		}
	}

}