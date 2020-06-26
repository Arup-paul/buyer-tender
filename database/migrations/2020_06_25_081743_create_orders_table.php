<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'orders', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->integer( 'supplier_id' )->nullable();
            $table->integer( 'user_id' )->nullable();
            $table->string( 'order_date' )->nullable();
            $table->string( 'order_status' )->nullable();
            $table->string( 'total_products' )->nullable();
            $table->string( 'sub_total' )->nullable();
            $table->string( 'vat' )->nullable();
            $table->string( 'total' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'orders' );
    }
}
