<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drive_test_id');
            $table->foreignId('candidate_id');
            $table->foreignId('test_id');
            $table->json('question_paper');
            $table->json('response')->nullable();
            $table->json('result')->nullable();
            $table->longText('feedback')->nullable();
            $table->boolean('is_completed')->nullable();
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
        Schema::dropIfExists('candidate_tests');
    }
}
