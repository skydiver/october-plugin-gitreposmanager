<?php

    namespace Martin\Technologies\Models;

    use Model;

    class Item extends Model {

        use \October\Rain\Database\Traits\Validation;

        public $table        = 'martin_technologies_items';
        public $translatable = ['title', 'link', 'image', 'target', 'enabled'];

        public $rules = [
            'title' => 'required|max:50',
            'image' => 'required',
            'order' => 'numeric'
        ];

        public $customMessages = [
            'link.url' => 'The link format is invalid (http:// or https://)'
        ];

        public static function boot() {
            parent::boot();
            if(!class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
                return;
            }
            self::extend(function($model){
                $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel';
            });
        }

    }

?>