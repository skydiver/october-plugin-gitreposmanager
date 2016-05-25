<?php

    namespace Martin\GitReposManager\Models;

    use Model;

    class Repo extends Model {

        use \October\Rain\Database\Traits\Validation;

        public $table        = 'martin_gitreposmanager_repos';

        public $rules = [
            'title' => 'required|max:50',
            'path'  => 'required',
        ];

    }

?>