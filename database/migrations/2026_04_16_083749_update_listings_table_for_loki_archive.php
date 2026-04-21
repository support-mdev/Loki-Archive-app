<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('listings', function (Blueprint $table) {

        $table->renameColumn('company', 'source');
        $table->renameColumn('location', 'origin');
        $table->renameColumn('email', 'contact');

    });

    Schema::table('listings', function (Blueprint $table) {

        $table->string('category')->default('Merchandise');
        $table->string('image')->nullable();

    });
}


public function down()
{
    Schema::table('listings', function (Blueprint $table) {

        $table->renameColumn('source', 'company');
        $table->renameColumn('origin', 'location');
        $table->renameColumn('contact', 'email');

    });

    Schema::table('listings', function (Blueprint $table) {

        $table->dropColumn(['category','image']);

    });
}
};
