<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("destinations", function($table)
		{
			$table->increments("id");
			$table->string("name", 128)->unique()->nullable(false);           
			$table->char("airport_code", 4)->nullable(false);
			$table->string("image", 128);
			$table->float("conv_rate");
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
		Schema::drop("destinations");
	}

}
