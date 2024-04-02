<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketNumberSeatsioToOrderChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_child', function (Blueprint $table) {
            $table->string('ticket_number_seatsio', 251)->nullable()->after('ticket_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_child', function (Blueprint $table) {
            $table->dropColumn('ticket_number_seatsio');
        });
    }
}
