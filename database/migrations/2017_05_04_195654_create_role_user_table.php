<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::defaultStringLength(191);
        try {
            Schema::create('role_user', function (Blueprint $table) {
                $table->integer('role_id')->unsigned();
                $table->integer('user_id')->unsigned();

                $table->foreign('role_id')->references('id')->on('roles')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
                $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            });
        } catch (\Exception $e) {
            $this->down();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('role_user');
    }

}
