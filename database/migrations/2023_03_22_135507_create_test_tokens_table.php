<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token', 6)->unique();
            $table->foreignId('drive_test_id')->constrained('drive_tests');
            $table->dateTime('expiry');
            $table->boolean('is_expired')->default(true);
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
        Schema::dropIfExists('test_tokens');
    }
}
