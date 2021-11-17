<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $usersTable = config('custom-user.user.table.name');
        $extras     = config('custom-user.attributes.extra');

        Schema::table($usersTable, function (Blueprint $table) use ($extras) {
            foreach ($extras as $extra) {
                if ($extra['enabled']) {
                    $table ->{$extra['type']}($extra['name']) ->nullable() ->after('remember_token');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $usersTable = config('custom-user.user.table.name');
        $extras     = config('custom-user.attributes.extra');

        Schema::table($usersTable, function (Blueprint $table) use ($extras) {
            foreach ($extras as $extra) {
                if ($extra['enabled']) {
                    $table->dropColumn($extra['name']);
                }
            }
        });
    }
}
