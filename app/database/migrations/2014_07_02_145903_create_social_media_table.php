<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocialMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social_media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('icon');
			$table->string('title');
			$table->string('url');
			$table->integer('pos');
			$table->boolean('active');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('social_media');
	}

}
