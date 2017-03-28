<?php

    namespace Martin\GitReposManager;

    use Backend, Controller, Lang, Validator;
    use System\Classes\PluginBase;
    use System\Classes\SettingsManager;

    class Plugin extends PluginBase {

        public function pluginDetails() {
            return [
                'name'        => 'martin.gitreposmanager::lang.plugin.name',
                'description' => 'martin.gitreposmanager::lang.plugin.description',
                'author'      => 'Martin',
                'icon'        => 'icon-git'
            ];
        }

        public function registerSettings() {
            return [
                'gitreposmanager' => [
                    'label'       => 'martin.gitreposmanager::lang.navigation.label',
                    'description' => 'martin.gitreposmanager::lang.navigation.description',
                    'category'    => SettingsManager::CATEGORY_SYSTEM,
                    'icon'        => 'icon-git',
                    'url'         => Backend::url('martin/gitreposmanager/repos'),
                    'order'       => 500,
                    'permissions' => ['martin.gitreposmanager.access_repos'],
                ]
            ];
        }

        public function registerPermissions() {
            return [
                'martin.gitreposmanager.access_repos' => ['label' => 'Access Git Repos Manager page', 'tab' => 'Git Repos Manager'],
            ];
        }
        
        public function register() {
            Validator::extend('isReadable', function($attribute, $value, $parameters, $validator) {
                return is_readable($value);
            }, Lang::get('martin.gitreposmanager::lang.model.errors.validator_is_readable'));
        }

    }

?>