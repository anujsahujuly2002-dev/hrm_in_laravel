<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases');
            $table->foreignId('purchase_item_id')->constrained('purchase_items');
            $table->foreignId('dealer_id')->constrained('dealers');
            $table->foreignId('medicine_id')->constrained('medicines');
            $table->float('purchase_rate');
            $table->float('open_stock');
            $table->float('sold_stock')->default(0);
            $table->float('remain_stock');
            $table->string('status')->default('Inactive');
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
        Schema::dropIfExists('medicine_rates');
    }
}
