<?php

    namespace Martin\Technologies\Updates;

    use Schema;
    use October\Rain\Database\Updates\Migration;

    class CreateTable extends Migration {

        public function up() {
            Schema::create('martin_technologies_items', function($table) {
                $table->increments('id')->unsigned();
                $table->string('title' ,  50)->nullable();
                $table->string('image' ,  50)->nullable();
                $table->string('link'  , 250)->nullable();
                $table->string('target',  10)->nullable();
                $table->integer('order'     )->nullable();
                $table->boolean('enabled'   )->default(1);
                $table->timestamps();
            });
        }

        public function down() {
            Schema::drop('martin_technologies_items');
        }

    }

?>