<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrips extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("trips", function($table)
		{
			$table->increments("id");
			$table->date("depart")->nullable(false);
			$table->date("return")->nullable(false);
			$table->string("destination", 128)->nullable(false);
			$table->foreign("destination")->references("name")
				->on("destinations");
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
		Schema::drop("trips");
	}

}
