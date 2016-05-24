<?php

    namespace Martin\Technologies;

    use Backend;
    use Controller;
    use System\Classes\PluginBase;

    class Plugin extends PluginBase {

        public function pluginDetails() {
            return [
                'name'        => 'martin.technologies::lang.plugin.name',
                'description' => 'martin.technologies::lang.plugin.description',
                'author'      => 'Martin',
                'icon'        => 'icon-cubes'
            ];
        }

        public function registerNavigation() {
            return [
                'technologies' => [
                    'label'       => 'martin.technologies::lang.navigation.label',
                    'url'         => Backend::url('martin/technologies/items'),
                    'permissions' => ['martin.technologies.access_technologies'],
                    'icon'        => 'icon-cubes',
                    'order'       => 500,
                    'sideMenu' => [
                        'items' => [
                            'label' => 'martin.technologies::lang.navigation.sideMenu.items',
                            'icon'  => 'icon-list',
                            'url'   => Backend::url('martin/technologies/items')
                        ],
                    ]
                ]
            ];
        }

        public function registerPermissions() {
            return [
                'martin.technologies.access_technologies' => ['label' => 'Access Technologies page', 'tab' => 'Technologies'],
            ];
        }

        public function registerComponents() {
            return [
                'Martin\Technologies\Components\Technologies' => 'technologies'
            ];
        }

    }

?>