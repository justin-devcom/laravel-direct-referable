<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSponsorIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn(config('referral.table_names.directable.table_name'), config('referral.table_names.directable.column_name')))
            return;

        Schema::table(config('referral.table_names.directable.table_name'), function (Blueprint $table) {
            if (config('referral.table_names.directable.indexed'))
                $table->bigInteger(config('referral.table_names.directable.column_name'))->unsigned()->nullable()->index()->after('id');
            else
                $table->bigInteger(config('referral.table_names.directable.id_name'))->unsigned()->nullable()->after('column');

            $table->foreign(config('referral.table_names.directable.column_name'))
                ->references('id')
                ->on(config('referral.table_names.directable.table_name'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(config('referral.table_names.directable.table_name'));
        });
    }
}
