<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewUsersTableFields extends Migration
{
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->string('position', 150);
            $table->string('department', 150);
            $table->string('supervisor', 150);
            $table->date('birthday');
        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('position');
            $table->dropColumn('department');
            $table->dropColumn('supervisor');
            $table->dropColumn('birthday');
        });
    }
}
