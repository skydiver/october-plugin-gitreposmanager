<?php

    namespace Martin\Technologies\Controllers;

    use BackendMenu;
    use Backend\Classes\Controller;
    use Flash;
    use Martin\Technologies\Models\Item;
    use Lang;

    class Items extends Controller {

        public $implement = [
            'Backend.Behaviors.FormController',
            'Backend.Behaviors.ListController'
        ];

        public $formConfig = 'config_form.yaml';
        public $listConfig = 'config_list.yaml';

        public $requiredPermissions = ['martin.technologies.access_technologies'];

        public function __construct() {
            parent::__construct();
            BackendMenu::setContext('Martin.Technologies', 'technologies', 'items');
        }

        public function index_onDelete() {
            if($checkedIds = post('checked')) {
                foreach($checkedIds as $itemId) {
                    if(! $table = Item::find($itemId))
                        continue;
                    $table->delete();
                }
                Flash::success(Lang::get('backend::lang.form.delete_success', ['name' => Lang::get('martin.technologies::lang.controller.form.items.title')]));
            }
            return $this->listRefresh();
        }

    }

?>