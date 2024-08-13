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
        Schema::create('kajian_comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kajian_id')->constrained('kajian')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->enum('status', ['approved', 'spam'])->default('approved');
            $table->foreignId('parent_id')->nullable()->constrained('news_comment')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kajian_comment');
    }
};
