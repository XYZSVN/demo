<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('account_item_id')->unsigned();
            $table->string('user_id'); //student or teacher
            $table->string('type'); // income or expense
            $table->tinyInteger('status');
            $table->string('invoice_created_by')->default('users_from_session'); //admin or users
            $table->string('note')->default('default note');
            
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('account_item_id')->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
