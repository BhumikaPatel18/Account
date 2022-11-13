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
        if (!Schema::hasTable('user_project'))
        {
            Schema::create('user_project', function (Blueprint $table) {
                $table->id();
                $table->uuid("user_id");
                $table->uuid("project_id");
                $table->foreign("user_id")->reference('id');
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
        Schema::dropIfExists('user_project');
    }
};
