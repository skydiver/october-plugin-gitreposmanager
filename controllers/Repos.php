<?php

    namespace Martin\GitReposManager\Controllers;

    use BackendMenu;
    use Backend\Classes\Controller;
    use Flash;
    use Martin\GitReposManager\Models\Repo;
    use Lang;

    class Repos extends Controller {

        public $implement = [
            'Backend.Behaviors.FormController',
            'Backend.Behaviors.ListController'
        ];

        public $formConfig = 'config_form.yaml';
        public $listConfig = 'config_list.yaml';

        public $requiredPermissions = ['martin.gitreposmanager.access_repos'];

        public function __construct() {
            parent::__construct();
            BackendMenu::setContext('Martin.GitReposManager', 'gitreposmanager', 'repos');
        }

        public function index_onDelete() {
            if($checkedIds = post('checked')) {
                foreach($checkedIds as $itemId) {
                    if(! $table = Repo::find($itemId))
                        continue;
                    $table->delete();
                }
                Flash::success(Lang::get('backend::lang.form.delete_success', ['name' => Lang::get('martin.gitreposmanager::lang.controller.form.repos.title')]));
            }
            return $this->listRefresh();
        }

    }

?>