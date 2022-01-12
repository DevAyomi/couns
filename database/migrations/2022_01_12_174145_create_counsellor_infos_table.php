<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounsellorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counsellor_infos', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('email');
            $table->foreignId('counsellor_id')->constrained('users')->cascadeOnDelete();
            $table->enum('available', ['yes', 'no'])->default('yes');
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
        Schema::dropIfExists('counsellor_infos');
    }
}
