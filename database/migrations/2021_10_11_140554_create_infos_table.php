<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('address', 200);
            $table->string('phone', 20);
            $table->date('birthday');
            $table->tinyInteger('gender'); // 1 is male , 2 is female.
            $table->string('nationality', 50);
            $table->string('university', 200);
            $table->string('degree', 200);
            $table->string('summary', 2000);
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
}
