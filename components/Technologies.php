<?php

    namespace Martin\Technologies\Components;

    use Cms\Classes\ComponentBase;
    use Cms\Classes\Page;
    use Martin\Technologies\Models\Item;
    use Lang;

    class Technologies extends ComponentBase {

        public $technologies;

        public function componentDetails() {
            return [
                'name'        => 'martin.technologies::lang.components.technologies.name',
                'description' => 'martin.technologies::lang.components.technologies.description'
            ];
        }

        public function onRun() {
            $this->technologies = Item::where('enabled', 1)->orderBy('order', 'asc')->get();
        }

    }

?>