<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_generators', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('student_id');
            
            $table->string('invoice_title');
            $table->string('invoice_amount');
            $table->string('created_by')->default('user_from_session');
            $table->string('invoice_status')->default(0);
            
            $table->softDeletes();
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
        Schema::dropIfExists('invoice_generators');
    }
}
