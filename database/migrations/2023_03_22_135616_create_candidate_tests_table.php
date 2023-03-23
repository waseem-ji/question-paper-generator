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
        Schema::disableForeignKeyConstraints();
        
        Schema::create('candidate_tests', function (Blueprint $table) {
            $table->id();
            $table->json('question_paper');
            $table->json('response')->nullable();
            $table->json('result')->nullable();
            $table->foreignId('link_to_drive')->constrained('drive_test_lists');
            $table->foreignId('candidate_id')->constrained('candidates');
            $table->foreignId('test_id')->constrained('tests');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
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
