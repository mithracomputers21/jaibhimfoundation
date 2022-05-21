<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('type');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->longText('address')->nullable();
            $table->string('payment')->nullable();
            $table->date('payment_date');
            $table->string('amount');
            $table->string('transaction')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
