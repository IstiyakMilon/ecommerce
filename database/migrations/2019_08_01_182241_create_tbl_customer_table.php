<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCustomerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name');
            $table->string('email_address');
            $table->string('password');
            $table->string('mobile_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customer');
    }
}
