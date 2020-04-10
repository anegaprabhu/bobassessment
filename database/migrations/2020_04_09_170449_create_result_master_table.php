<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('results', function (Blueprint $table) {

		$table->increments('result_id');
		$table->integer('student_id')->unsigned();
		$table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
		$table->integer('competition_id')->unsigned();
		$table->foreign('competition_id')->references('competition_id')->on('competitions')->onDelete('cascade');
		$table->integer('exam_id')->unsigned()->default(null);
		$table->date('exam_date')->nullable();
		$table->json('exam_data')->nullable()->default(NULL);
		$table->float('marks', 10, 2);
		$table->float('points', 10, 2);
		$table->string('time_taken')->nullable()->default(NULL);
		$table->string('time_taken_average')->nullable()->default(NULL);
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
        Schema::dropIfExists('results');
    }
}
