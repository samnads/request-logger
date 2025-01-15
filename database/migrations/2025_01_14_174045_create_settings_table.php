<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('log_switch');
            $table->timestamps();
        });
        /**
         * Instead of seeder I'm going to directly insert a record
         * It's a bad practice but i'm using this to save my time for the machine test task
         * Basically I'll not use this for real projects
         */
        DB::table('settings')->insert([
            ['log_switch' => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
