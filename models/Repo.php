<?php

    namespace Martin\GitReposManager\Models;

    use Flash, Input, Model;
    use GitElephant\Repository;

    class Repo extends Model {

        use \October\Rain\Database\Traits\Validation;

        public $table = 'martin_gitreposmanager_repos';

        public $rules = [
            'title' => 'required|max:50',
            'path'  => 'required|isReadable',
        ];
        
        public function beforeValidate() {

            if(Input::get('Repo')['_clone']) {
                mkdir($this->getAttribute('path'));
                $this->rules['path'] = 'required';
            }
            
        }

        public function beforeSave() {

            $path = $this->getAttribute('path');

            if(Input::get('Repo')['_clone']) {
                $git = new Repository($path);
                $git->cloneFrom(Input::get('Repo')['_url'], $path);
            } else {
                $git = Repository::open($path);
            }

            $branch = $git->getMainBranch()->getName();
            $commit = $git->getCommit();
            $this->branch  = $branch;
            $this->commit  = $commit->getSha();
            $this->author  = $commit->getAuthor();
            $this->message = $commit->getMessage();
            $this->date    = $commit->getDatetimeAuthor();

        }

        public function filterFields($fields, $context = null) {

            if($context == 'create') {
                $fields->_url->required = true;
            }

            if($context == 'update') {
                $fields->path->disabled = true;
                $fields->path->required = false;
            }

        }

    }

?>