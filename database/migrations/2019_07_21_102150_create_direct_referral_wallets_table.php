<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectReferralWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = config('referral.wallets');

        if ($config['migrate']) {
            Schema::create(config('referral.table_names.wallets'), function (Blueprint $table) use ($config) {
                $table->bigIncrements('id');

                $table->bigInteger($config['belongs_to_column'])
                    ->unsigned()->unique()->index();

                $table->double('balance', 15, 2)->unsigned()->default(0);
                $table->timestamp('disabled_at')->nullable();
                $table->timestamps();

                if ($config['soft_deletes'])
                    $table->softDeletes();

                $table->foreign($config['belongs_to_column'])
                    ->references($config['belongs_to_references'])
                    ->on($config['belongs_to_table']);
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
        Schema::dropIfExists('direct_referral_wallets');
    }
}
