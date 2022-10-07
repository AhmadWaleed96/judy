<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('plan_id')->default(0);
            $table->integer('seat')->default(0);
            $table->decimal('price', 18,8)->default(0);
            $table->string('trx', 40)->nullable();
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
        Schema::dropIfExists('plan_logs');
    }
}
