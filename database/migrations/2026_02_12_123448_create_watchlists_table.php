<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('watchlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('movie_id'); // TMDB ID
            $table->string('title');
            $table->string('poster_path')->nullable();
            $table->enum('status', ['plan_to_watch', 'watching', 'completed'])->default('plan_to_watch');
            $table->timestamps();

            // Prevent duplicate movies for the same user
            $table->unique(['user_id', 'movie_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watchlists');
    }
};
