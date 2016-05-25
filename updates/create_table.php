<?php

    namespace Martin\GitReposManager\Updates;

    use Schema;
    use October\Rain\Database\Updates\Migration;

    class CreateTable extends Migration {

        public function up() {
            Schema::create('martin_gitreposmanager_repos', function($table) {
                $table->increments('id')->unsigned();
                $table->string('title' ,  50);
                $table->string('path'  , 200)->unique();
                $table->timestamps();
            });
        }

        public function down() {
            Schema::drop('martin_gitreposmanager_repos');
        }

    }

?>