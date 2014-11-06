<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource', function(Blueprint $table)
		{
                    $table->increments('id');
                    $table->string('name'); 
                    $table->string('pattern'); 
                    $table->string('target'); 
                    $table->string('before_filter'); 
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
            Schema::drop('resource');
		
	}

}
