<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBlocksTable extends Migration
{
    public function up()
    {
        Schema::table('blocks', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id', 'district_fk_6641073')->references('id')->on('districts');
        });
    }
}
