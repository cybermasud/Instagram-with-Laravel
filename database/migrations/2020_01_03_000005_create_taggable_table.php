<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggableTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'taggable';

    /**
     * Run the migrations.
     * @table taggable
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('taggable_id');
            $table->string('taggable_type', 45);


            $table->foreign('tag_id', 'tag_taggable_idx')
                ->references('id')->on('tags')
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
