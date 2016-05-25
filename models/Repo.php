<?php

    namespace Martin\GitReposManager\Models;

    use Flash, Model;
    use GitElephant\Repository;

    class Repo extends Model {

        use \October\Rain\Database\Traits\Validation;

        public $table = 'martin_gitreposmanager_repos';

        public $rules = [
            'title' => 'required|max:50',
            'path'  => 'required|isReadable',
        ];

        public function beforeSave() {
            $path   = $this->getAttribute('path');
            $git    = Repository::open($path);
            $branch = $git->getMainBranch()->getName();
            $commit = $git->getCommit()->getSha();
            $this->branch = $branch;
            $this->commit = $commit;
        }

    }

?>