<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('apartments', function (Blueprint $table) {
          $table  -> foreign("owner_id", "owner_aprt")
                  -> references("id")
                  -> on("owners")
                  -> onDelete("cascade");
          $table  -> foreign("category_id", "category_aprt")
                  -> references("id")
                  -> on("categoies")
                  -> onDelete("cascade");
      });

      Schema::table('apartment_service', function (Blueprint $table) {
          $table  -> foreign("apartment_id", "apartment_ser")
                  -> references("id")
                  -> on("apartments")
                  -> onDelete("cascade");
          $table  -> foreign("service_id", "service_apart")
                  -> references("id")
                  -> on("services")
                  -> onDelete("cascade");

      });

      Schema::table('sponsorships', function (Blueprint $table) {
          $table  -> foreign("apartment_id", "apartment_spon")
                  -> references("id")
                  -> on("apartments")
                  -> onDelete("cascade");
          $table  -> foreign("sponsorType_id", "sponsorType")
                  -> references("id")
                  -> on("_sponsor_types")
                  -> onDelete("cascade");

      });
      Schema::table('sponsorships', function (Blueprint $table) {
          $table  -> foreign("apartment_id", "apartment_mess")
                  -> references("id")
                  -> on("apartments")
                  -> onDelete("cascade");

      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('sponsorships', function (Blueprint $table) {
        $table -> dropForeign("apartment_mess");
      });

      Schema::table('apartments', function (Blueprint $table) {
        $table -> dropForeign("owner_aprt");
        $table -> dropForeign("category_aprt");
      });
      Schema::table('apartment_service', function (Blueprint $table) {
        $table -> dropForeign("apartment_ser");
        $table -> dropForeign("service_apart");
      });
      Schema::table('sponsorships', function (Blueprint $table) {
        $table -> dropForeign("apartment_spon");
        $table -> dropForeign("sponsorType");
      });
    }
}
