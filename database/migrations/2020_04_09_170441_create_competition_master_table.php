<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
	
		$table->increments('competition_id');
		$table->dateTime('start_date')->nullable();
		$table->dateTime('end_date')->nullable();
		$table->enum('occurrence', ['D','W','F','M','Q','H','A'])->nullable(false)->default('D');
		$table->enum('day', ['SUN','MON','TUE','WED','THU','FRI','SAT'])->nullable(true)->default(null);
		$table->string('programme')->nullable()->default(NULL);
		$table->string('level')->nullable()->default(NULL);
		$table->float('total_points', 10, 2);
		$table->date('result_date')->nullable();
		$table->integer('created_by')->unsigned()->nullable(); 
		$table->integer('updated_by')->unsigned()->nullable();
		$table->dateTime('created_at')->nullable(); 
		$table->dateTime('updated_at')->nullable(); 
		$table->enum('active_status', ['Y','N'])->nullable(false)->default('N');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
}
