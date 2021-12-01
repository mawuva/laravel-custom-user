<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUuidColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $usersTable     = config('custom-user.user.table.name');
        $usersTablePK   = config('custom-user.user.table.primary_key');

        $uuidEnabled    = config('custom-user.uuids.enabled');
        $uuidColumn     = config('custom-user.uuids.column', '_id');

        if ($uuidEnabled && $uuidColumn !== null) {
            Schema::table($usersTable, function (Blueprint $table)
            use($uuidColumn, $usersTablePK) {
                $table->uuid($uuidColumn) ->after($usersTablePK);
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
        $usersTable     = config('custom-user.user.table.name');
        $uuidColumn     = config('custom-user.uuids.column', '_id');

        Schema::table($usersTable, function (Blueprint $table) use ($uuidColumn) {
            $table->dropColumn($uuidColumn);
        });
    }
}
