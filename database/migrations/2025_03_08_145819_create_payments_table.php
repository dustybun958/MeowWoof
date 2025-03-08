<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    // Menjalankan migrasi untuk membuat tabel payments
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('stories_id');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['bank_transfer', 'e-wallet', 'credit_card']);
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->timestamp('payment_date')->nullable();
            $table->timestamps(); // created_at dan updated_at

            // Menambahkan kunci asing
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('stories_id')->references('id')->on('stories')->onDelete('cascade');
        });
    }

    // Membatalkan migrasi untuk menghapus tabel payments
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
