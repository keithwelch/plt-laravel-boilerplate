<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddActiveAndAdminToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table) {
          $table->boolean('is_active')->default(false);
          $table->boolean('is_admin')->default(false);
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::table('users', function(Blueprint $table) {
        $table->dropColumn('is_active');
        $table->dropColumn('is_admin');
      });
	}

}
