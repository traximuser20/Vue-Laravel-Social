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
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();
            $table->string('status', 255);
            $table->string('role', 255);
            $table->string('token', 1024)->nullable();
            $table->timestamp('token_expired_date')->nullable();
            $table->timestamp('token_used')->nullable();
            $table->foriegnId('group_id')->constrained('groups');
            $table->foriegnId('user_id')->constrained('users');
            $table->foriegnId('created_by')->constrained('users');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
