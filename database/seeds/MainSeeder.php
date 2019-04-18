<?php

use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$threads->each(function ($thread) { factory('App\Reply', 10)->create(['thread_id' => $thread->id]); });
	}
}
