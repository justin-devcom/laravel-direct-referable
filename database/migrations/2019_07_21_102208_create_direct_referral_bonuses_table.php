<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectReferralBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = config('referral.bonuses');

        Schema::create(config('referral.table_names.bonuses'), function (Blueprint $table) use ($config) {
            $table->bigIncrements('id');

            $table->bigInteger($config['belongs_to_column'])
                ->unsigned()->index();

            $table->morphs('referable');

            $table->double('amount', 15, 2)->unsigned();
            $table->timestamps();

            if ($config['soft_deletes'])
                $table->softDeletes();

            $table->foreign($config['belongs_to_column'])
                ->references($config['belongs_to_references'])
                ->on($config['belongs_to_table']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direct_referral_bonuses');
    }
}
