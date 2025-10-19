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
        Schema::table('setting_website', function (Blueprint $table) {
            $table->boolean('register_page')->default(true)->after('terms_conditions');
            $table->text('register_page_content')->nullable()->after('register_page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting_website', function (Blueprint $table) {
            //
        });
    }
};
