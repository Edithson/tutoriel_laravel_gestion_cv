<?php

use App\Models\CV;
use App\Models\Technology;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cv_technologies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CV::class)->onDelete('cascade');
            $table->foreignIdFor(Technology::class)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_technologies');
    }
};
