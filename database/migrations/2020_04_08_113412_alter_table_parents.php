<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableParents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parents', function (Blueprint $table) {
            $table->integer('country_id')->after('is_super')->nullable()->default(NULL);
            $table->integer('state_id')->after('country_id')->nullable()->default(NULL);
            $table->integer('city_id')->after('state_id')->nullable()->default(NULL);
            $table->string('area', 155)->after('city_id')->nullable()->default(NULL);
            $table->string('postal_code',55)->after('area')->nullable()->default(NULL);
            $table->bigInteger('mobile_no')->after('postal_code')->unsigned()->nullable()->default(null);
            $table->enum('profile_status', ['Y','N'])->after('mobile_no')->nullable(false)->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parents', function (Blueprint $table) {
            //
        });
    }
}
