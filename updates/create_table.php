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
                $table->string('branch',  50)->nullable();
                $table->string('commit',  40)->nullable();
                $table->string('author', 100);
                $table->text  ('message');
                $table->datetime('date');
                $table->timestamps();
            });
        }

        public function down() {
            Schema::drop('martin_gitreposmanager_repos');
        }

    }

?>