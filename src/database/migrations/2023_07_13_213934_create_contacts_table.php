<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',255)->nullable(false);
            $table->tinyInteger('gender')->unsigned()->comment('性別 1:男、2:女')->nullable(false);
            $table->string('email',255)->unique('email')->comment('メールアドレス')->nullable(false);
            $table->string('postcode',8)->nullable(false);
            $table->string('address',255)->nullable(false);
            $table->string('building_name',255)->nullable(false);
            $table->string('opinion')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
