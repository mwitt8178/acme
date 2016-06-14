<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatLngToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function(Blueprint $table)
        {
            $table->string('lat');
            $table->string('lng');
        });
    }

    public function down()
    {
        Schema::table('customers', function(Blueprint $table)
        {
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
}
