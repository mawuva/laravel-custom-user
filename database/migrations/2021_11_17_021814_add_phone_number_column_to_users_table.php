<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneNumberColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $usersTable         = config('custom-user.user.table.name');
        $phoneNumberEnabled = config('custom-user.attributes.phone_number.enabled');

        if ($phoneNumberEnabled) {
            Schema::table($usersTable, function (Blueprint $table) {
                if (get_attribute('phone_number', 'unique')) {
                    $table->string('phone_number') ->nullable() ->unique() ->after('email_verified_at');
                }

                else {
                    $table->string('phone_number') ->nullable() ->after('email_verified_at');
                }
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
            $table->dropColumn('phone_number');
        });
    }
}
