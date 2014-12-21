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
			$table->unsignedInteger("destination_id")->nullable(false);
			$table->foreign("destination_id")->references("id")
				->on("destinations")->onUpdate("cascade")->onDelete("cascade");
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
