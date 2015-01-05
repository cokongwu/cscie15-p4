<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("groups", function($table) {
			$table->increments("id");
			$table->string("name", 40)->unique()->nullable(false);
			$table->unsignedInteger("owner");
			$table->foreign("owner")->references("id")->on("users")
				->onUpdate("cascade")->onDelete("cascade");
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
		//
		Schema::drop("groups");
	}

}
