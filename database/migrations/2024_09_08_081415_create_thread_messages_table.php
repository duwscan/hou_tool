<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('thread_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id');
            $table->string('sender');
            $table->dateTime('timestamp');
            $table->string('message');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('thread_messages');
    }
};
