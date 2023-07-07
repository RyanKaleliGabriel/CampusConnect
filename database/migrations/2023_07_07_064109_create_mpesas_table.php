<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesas', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('reference_number')->nullable();
            $table->string('transaction_number')->nullable()->unique();
            $table->string('phone_number');
            $table->string('description');
            $table->double('amount')->default(0.00);
            $table->jsonb('payload')->default(json_encode([]));
            $table->tinyInteger('attempts')->default(0);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_successful')->default(false);
            $table->boolean('is_initiated')->default(false);
            $table->boolean('completed')->default(0);
            $table->boolean('confirmed')->default(0);
            $table->timestamp('queued_at');
            $table->timestamp('callback_received_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('mpesas');
    }
};
