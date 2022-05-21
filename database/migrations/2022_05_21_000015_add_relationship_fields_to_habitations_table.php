<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHabitationsTable extends Migration
{
    public function up()
    {
        Schema::table('habitations', function (Blueprint $table) {
            $table->unsignedBigInteger('panchayat_id')->nullable();
            $table->foreign('panchayat_id', 'panchayat_fk_6641486')->references('id')->on('panchayats');
        });
    }
}
