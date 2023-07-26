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
        Schema::table('rabbits', function (Blueprint $table) {

            $table -> foreignId('farmer_id') -> constrained();
        });
        Schema::table('farm_farmer', function (Blueprint $table) {

            $table -> foreignId('farm_id') -> constrained();
            $table -> foreignId('farmer_id') -> constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rabbits', function (Blueprint $table) {

            $table -> dropForeign("rabbits_farmer_id_foreign");
            $table -> dropColumn("farmer_id");
        });
        Schema::table('farm_farmer', function (Blueprint $table) {

            $table -> dropForeign("farm_farmer_farm_id_foreign");
            $table -> dropForeign("farm_farmer_farmer_id_foreign");

            $table -> dropColumn("farm_id");
            $table -> dropColumn("farmer_id");
        });
    }
};
