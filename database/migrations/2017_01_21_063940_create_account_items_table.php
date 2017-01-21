<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_items', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('account_item_name');
            $table->string('account_item_price');
            $table->integer('class_id')->unsigned()->nullable();
            $table->integer('head_items_id')->unsigned();
            $table->string('accuont_item_created_by')->default('users_from_session'); //admin or users
            $table->string('item_type');
            
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('class_names');
            $table->foreign('head_items_id')->references('id')->on('head_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_items');
    }
}
