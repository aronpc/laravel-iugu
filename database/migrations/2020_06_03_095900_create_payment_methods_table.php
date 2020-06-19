<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{

    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('iugu_id')->index()->nullable();
            $table->foreignId('customer_id')->constrained('customers');
            $table->string('description');
            $table->string('token');
            $table->boolean('set_as_default')->default(false);
        });
    }

    public function down()
    {

    }
}