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
        Schema::table('scheduled_classes', function (Blueprint $table) {
            $table->renameColumn('data_time', 'date_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scheduled_classes', function (Blueprint $table) {
            $table->renameColumn('date_time', 'date_time');
        });
    }
};
