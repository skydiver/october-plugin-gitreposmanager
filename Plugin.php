<?php

    namespace Martin\GitReposManager;

    use Backend;
    use Controller;
    use System\Classes\PluginBase;

    class Plugin extends PluginBase {

        public function pluginDetails() {
            return [
                'name'        => 'martin.gitreposmanager::lang.plugin.name',
                'description' => 'martin.gitreposmanager::lang.plugin.description',
                'author'      => 'Martin',
                'icon'        => 'icon-cubes'
            ];
        }

        public function registerNavigation() {
            return [
                'gitreposmanager' => [
                    'label'       => 'martin.gitreposmanager::lang.navigation.label',
                    'url'         => Backend::url('martin/gitreposmanager/repos'),
                    'permissions' => ['martin.gitreposmanager.access_repos'],
                    'icon'        => 'icon-cubes',
                    'order'       => 500,
                ]
            ];
        }

        public function registerPermissions() {
            return [
                'martin.gitreposmanager.access_repos' => ['label' => 'Access Git Repos Manager page', 'tab' => 'Git Repos Manager'],
            ];
        }

    }

?>