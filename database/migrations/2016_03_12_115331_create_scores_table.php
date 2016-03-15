<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scores', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('sid');
            $table->smallInteger('score1')->default(0);
            $table->smallInteger('score2')->default(0);
            $table->smallInteger('score3')->default(0);
            $table->smallInteger('score4')->default(0);
            $table->smallInteger('scoresum')->default(0);
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
		Schema::drop('scores');
	}

}
