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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('username', 45);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->string('kwh_number', 45);
            $table->string('customer_name', 45);
            $table->string('address', 100);
            $table->foreignId('rates_id')->constrained('rates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
