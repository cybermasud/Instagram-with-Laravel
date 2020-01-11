<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->string('username', 45);
            $table->string('email', 45);
            $table->string('password', 256);
            $table->text('bio')->nullable();
            $table->UnsignedInteger('avatar_id')->nullable();
            $table->timestamps();
            $table->timestamp('blocked_at')->nullable();
            $table->string('remember_token', 60)->nullable();





            $table->foreign('avatar_id', 'avatar_id_idx')
                ->references('id')->on('media')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
