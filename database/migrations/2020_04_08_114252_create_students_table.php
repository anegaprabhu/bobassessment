<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id')->index();      
            $table->integer('franchisee_id')->unsigned()->nullable()->default(null);      
            $table->string('franchisee_code', 100)->nullable()->default(NULL); 
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->string('student_name', 55)->nullable()->default(NULL); 
            $table->date('dob')->nullable(); 
            $table->string('school_name', 55)->nullable()->default(NULL); 
            $table->string('grade', 55)->nullable()->default(NULL); 
            $table->string('programme', 55)->nullable()->default(NULL); 
            $table->string('level', 55)->nullable()->default(NULL); 
            $table->dateTime('last_test_date')->nullable(); 
            $table->integer('last_test_id')->unsigned()->nullable()->default(null);
            $table->dateTime('utc_created_on')->nullable(); 
            $table->dateTime('local_created_on')->nullable(); 
            $table->string('local_timezone', 32)->nullable()->default(NULL); 
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
        Schema::dropIfExists('students');
    }
}
