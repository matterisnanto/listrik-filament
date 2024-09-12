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
        Schema::create('usages', function (Blueprint $table) {
            $table->id();
            $table->enum('month', [
                'January', 'February', 'March', 'April', 'May', 
                'June', 'July', 'August', 'September', 'October', 
                'November', 'December'
            ]);
            $table->string('year', 45);
            $table->char('initial_meter', 45);
            $table->char('final_meter', 45);
            $table->foreignId('customer_id')->constrained('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usages');
    }
};
