<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_resource', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->integer('group_id'); 
                    $table->integer('resource_id'); 
                    $table->integer('secure'); 
                    $table->timestamps();
                    $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_resource');
	}

}
