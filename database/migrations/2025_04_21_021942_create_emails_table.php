<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('to_email');         // Email người nhận
            $table->string('subject');          // Tiêu đề email
            $table->text('body')->nullable();   // Nội dung email (nếu muốn lưu)
            $table->string('type')->nullable(); // Loại email (xác nhận, OTP, v.v.)
            $table->timestamp('sent_at')->nullable(); // Thời gian gửi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
