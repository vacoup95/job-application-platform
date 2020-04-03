<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProgressTableAddActionRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('progresses')) {
            Schema::table('progresses', function ($table) {
                $table->unsignedBigInteger('action_id')->nullable()->after('application_id');
                $table->foreign('action_id')->references('id')->on('actions');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
