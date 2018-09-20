<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQFailedJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('q_failed_jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('connection', 65535);
			$table->text('queue', 65535);
			$table->text('payload');
			$table->timestamp('failed_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('q_failed_jobs');
	}

}
