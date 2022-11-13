<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('account_contact'))
        {
            Schema::create('account_contact', function (Blueprint $table) {
                $table->id();
                $table->uuid("account_id");
                $table->uuid("contact_id");
                $table->foreign("account_id")->references('id');
                $table->foreign("contact_id")->references('id');
                $table->timestamps();
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
        Schema::dropIfExists('account_contact');
    }
};
