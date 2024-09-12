<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('payment_date');
            $table->string('pay_month', 45);
            $table->string('admin_fee', 45);
            $table->string('total_payment', 100);
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('bills_id')->constrained('bills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
