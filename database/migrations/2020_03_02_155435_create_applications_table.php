<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Foreign key to identify user
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // Foreign key to identify current status
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');
            // Foreign key to identify used resume of application
            $table->unsignedBigInteger('resume_id')->nullable();
            $table->foreign('resume_id')->references('id')->on('resumes');

            // Application user applied to
            $table->string('name');

            // Role the user applied for
            $table->string('role')->nullable();

            // URL of application
            $table->string('application_url')->nullable();

            // Define when application was send
            $table->timestamp('application_send_at');
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
        Schema::dropIfExists('companies');
    }
}
