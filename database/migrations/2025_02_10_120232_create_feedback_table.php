<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Links to the users table
            $table->text('feedback'); // Store feedback text
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
