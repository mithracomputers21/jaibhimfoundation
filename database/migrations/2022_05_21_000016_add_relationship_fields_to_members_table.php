<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMembersTable extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_6641673')->references('id')->on('paymentmethods');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id', 'district_fk_6641662')->references('id')->on('districts');
            $table->unsignedBigInteger('block_id')->nullable();
            $table->foreign('block_id', 'block_fk_6641663')->references('id')->on('blocks');
            $table->unsignedBigInteger('panchayat_id')->nullable();
            $table->foreign('panchayat_id', 'panchayat_fk_6641664')->references('id')->on('panchayats');
            $table->unsignedBigInteger('habitation_id')->nullable();
            $table->foreign('habitation_id', 'habitation_fk_6641665')->references('id')->on('habitations');
        });
    }
}
