<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolls extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("polls", function($table)
		{
			$table->increments("id");
			$table->integer("trip1")->unsigned()->nullable(false);
			$table->integer("tally1")->unsigned();
			$table->integer("trip2")->unsigned()->nullable(false);
			$table->integer("tally2")->unsigned();
			$table->integer("trip3")->unsigned();
			$table->integer("tally3")->unsigned();
			$table->integer("trip4")->unsigned();
			$table->integer("tally4")->unsigned();
			$table->integer("trip5")->unsigned();
			$table->integer("tally5")->unsigned();
			$table->foreign("trip1")->references("id")->on("trips")
				->onUpdate("cascade")->onDelete("cascade");
			$table->foreign("trip2")->references("id")->on("trips")
				->onUpdate("cascade")->onDelete("cascade");
			$table->foreign("trip3")->references("id")->on("trips")
				->onUpdate("cascade")->onDelete("cascade");
			$table->foreign("trip4")->references("id")->on("trips")
				->onUpdate("cascade")->onDelete("cascade");
			$table->foreign("trip5")->references("id")->on("trips")
				->onUpdate("cascade")->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("polls");
	}

}
