<?php

    namespace Martin\GitReposManager\Controllers;

    use Backend, BackendMenu, Flash, Lang;
    use Backend\Classes\Controller;
    use Martin\GitReposManager\Models\Repo;
    use System\Classes\SettingsManager;

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
            BackendMenu::setContext('October.System', 'system', 'config');
            SettingsManager::setContext('Martin.GitReposManager', 'gitreposmanager');
            $this->addJs('/plugins/martin/gitreposmanager/assets/js/scripts.js');
        }

        public function onCreateRepo() {
            $this->asExtension('FormController')->create();
            return $this->makePartial('create_repo');
        }

        public function onCreate() {
            $this->asExtension('FormController')->create_onSave();
            return $this->listRefresh();
        }

        public function onUpdateRepo() {
            $this->asExtension('FormController')->update(post('id'));
            $this->vars['id'] = post('id');
            return $this->makePartial('update_repo');
        }

        public function onUpdate()     {
            $this->asExtension('FormController')->update_onSave(post('id'));
            return $this->listRefresh();
        }

        public function onDelete() {
            $checkedIds = post('checked') ?: (array) post('id');
            if(is_array($checkedIds) && count($checkedIds)) {
                foreach($checkedIds as $recordId) {
                    if(!$record = Repo::find($recordId)) {
                        continue;
                    }
                    $record->delete();
                }
                Flash::success(Lang::get('backend::lang.list.delete_selected_success'));
            } else {
                Flash::error(Lang::get('backend::lang.list.delete_selected_empty'));
            }
            return $this->listRefresh();
        }

        public function onRefresh() {
            $repos = Repo::all();
            foreach($repos as $repo) {
                $repo->touch();
            }
            Flash::success(Lang::get('martin.gitreposmanager::lang.controller.view.repos.after_refresh'));
            return $this->listRefresh();
        }

    }

?>