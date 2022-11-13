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
        if (!Schema::hasTable('account_project'))
        {
            Schema::create('account_project', function (Blueprint $table) {
                $table->id();
                $table->uuid("account_id");
                $table->uuid("project_id");
                $table->foreign("account_id")->reference('id');
                $table->foreign("project_id")->reference('id');
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
        Schema::dropIfExists('account_project');
    }
};
