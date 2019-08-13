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
        Schema::table(config('referral.table_names.directable.table_name'), function (Blueprint $table) {
            if (config('referral.table_names.directable.indexed'))
                $table->bigInteger(config('referral.table_names.directable.column_name'))->nullable()->unsigned()->index();
            else
                $table->bigInteger(config('referral.table_names.directable.column_name'))->nullable()->unsigned();

            $table->foreign(config('referral.table_names.directable_column'))
                ->references('id')
                ->on(config('referral.table_names.directable_table'));
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
            //
        });
    }
}
