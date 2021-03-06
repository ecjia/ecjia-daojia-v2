<?php

use Royalcms\Component\Database\Schema\Blueprint;
use Royalcms\Component\Database\Migrations\Migration;

class AddColumnIsPromoteToCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! RC_Schema::hasTable('cart')) {
            return ;
        }

        //添加字段
        RC_Schema::table('cart', function (Blueprint $table) {
            if (!RC_Schema::hasColumn('cart', 'is_promote')) $table->integer('is_promote')->unsigned()->default(0)->comment('添加购物车时商品是否在促销，0否1是');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除字段
        RC_Schema::table('cart', function (Blueprint $table) {
            $table->dropColumn('is_promote');
        });
    }
}
