<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->enum('brand', array('master_card', 'visa_card', 'verve_card', 'others'));
            $table->string('card_number', 16)->unique();
            $table->timestamp('expire_at');
            $table->timestamps();
           
        });
    }


    // transaction log table
    // add the deleted_at field to delete card
    // first 6 digits
    // last 4 digits
    // the hash 16 digits
    // SHA256 or 384 for credit card

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
