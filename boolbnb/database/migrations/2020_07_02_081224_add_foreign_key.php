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

        $table->foreign('owner_id', 'owner_apt')
              ->references('id')
              ->on('owners')
              ->onDelete('cascade');
        $table->foreign('category_id', 'category_apt')
              ->references('id')
              ->on('categories')
              ->onDelete('cascade');

      });

      Schema::table('messages', function (Blueprint $table) {

        $table->foreign('apartment_id', 'apart_mess')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');


      });

      Schema::table('sponsorships', function (Blueprint $table) {

        $table->foreign('apartment_id', 'apart_spons')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');
        $table->foreign('sponsorshipstype_id', 'sponsor')
              ->references('id')
              ->on('sponsorshipstypes')
              ->onDelete('cascade');

      });

      Schema::table('apartment_service', function (Blueprint $table) {

        $table->foreign('apartment_id', 'apart_serv')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');
        $table->foreign('service_id', 'service')
              ->references('id')
              ->on('services')
              ->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {

          $table->dropForeign('owner_apt');
          $table->dropForeign('category_apt');

        });

        Schema::table('messages', function (Blueprint $table) {

          $table->dropForeign('apart_mess');

        });

        Schema::table('sponsorships', function (Blueprint $table) {

          $table->dropForeign('apart_spons');
          $table->dropForeign('sponsor');

        });

        Schema::table('apartment_service', function (Blueprint $table) {

          $table->dropForeign('apart_serv');
          $table->dropForeign('service');

        });
    }
}
