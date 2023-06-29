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
        {
            Schema::create('todos', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description', 500)->nullable();
                $table->unsignedBigInteger('for_id');
                $table->unsignedBigInteger('by_id');
                $table->unsignedBigInteger('group_id');
                $table->boolean('status')->default(false);
                $table->timestamps();
    
                $table->foreign('for_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('by_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
