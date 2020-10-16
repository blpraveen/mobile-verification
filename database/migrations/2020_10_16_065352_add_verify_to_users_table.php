<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVerifyToUsersTable extends Migration
{
    /**
     * @var Repository
     */
    private $userTable;
	
	/**
     * User table constructor.
     */	
    public function __construct()
    {
        $this->userTable = config('mobile_verifier.user_table', 'users');
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->userTable, function (Blueprint $table) {
            $table->integer('verification_code');
            $table->dateTime('phone_verified_at',0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('verification_code');
            $table->dropColumn('phone_verified_at');
        });
    }
}
