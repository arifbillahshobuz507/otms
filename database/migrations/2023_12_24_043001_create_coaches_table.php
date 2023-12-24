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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('coach_number  ');
            $table->text('capacity');
            // cacch_type_id foregin key
            $table->unsignedBigInteger('coach_type_id ');
            // location_id  foregin key
            $table->unsignedBigInteger('location_id  ');
            // add foreign key constraints cacch_type_id
            $table->foreign('coach_type_id')->references('id')->on('coach_types')->cascadeOnUpdate()->restrictOnDelete();
              // add foreign key constraints location_id
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnUpdate()->restrictOnDelete();


            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
