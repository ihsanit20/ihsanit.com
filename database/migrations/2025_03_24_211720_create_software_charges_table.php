<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('software_charges', function (Blueprint $table) {
            $table->id();
            $table->string('website', 100);
            $table->string('month', 7);
            $table->decimal('paid_amount', 10, 2);
            $table->timestamp('paid_at')->nullable();
            $table->string('trx_id', 100)->unique();
            $table->json('response')->nullable();
            $table->timestamps();

            $table->index(['website']);
            $table->index(['month']);
            $table->index(['website', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_charges');
    }
};
