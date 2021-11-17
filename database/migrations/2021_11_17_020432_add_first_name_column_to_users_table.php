<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstNameColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $usersTable         = config('custom-user.user.table.name');
        $firstNameEnabled   = config('custom-user.attributes.first_name.enabled');

        if ($firstNameEnabled) {
            Schema::table($usersTable, function (Blueprint $table) {
                $table->string('first_name') ->nullable() ->after('name');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $usersTable = config('custom-user.user.table.name');

        Schema::table($usersTable, function (Blueprint $table) {
            $table->dropColumn('first_name');
        });
    }
}
