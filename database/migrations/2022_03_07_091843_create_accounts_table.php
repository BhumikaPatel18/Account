<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Trait\Uuid;

return new class extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("user_name");
            $table->string("first_name");
            $table->string("last_name");
            $table->date("dob");
            $table->string("phone");
            $table->string("email");
            $table->string("address");
            $table->string("country");
            $table->string("state");
            $table->string("gender");
            $table->string("hobby");
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
        Schema::dropIfExists('accounts');
    }
};
