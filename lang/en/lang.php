<?php

return [

    'plugin' => [
        'name'        => 'Git Repos Manager',
        'description' => 'Keep track of your repos.'
    ],

    'navigation' => [
        'label' => 'Git Repos Manager'
    ],

    'controller' => [
        'view' => [
            'repos' => [
                'new'                 => 'Add Repo',
                'refresh'             => 'Refresh Repos',
                'breadcrumb_label'    => 'Repos',
                'return'              => 'Return to repositories list',
                'creating'            => 'Adding new repository ...',
                'delete_confirmation' => 'Do you really want to delete this item?',
                'after_refresh'       => 'Repos Updated'
            ]
        ],
        'list' => [
            'repos' => 'Manage Repos',
        ],
        'form' => [
            'repos' => [
                'title'       => 'Repository',
                'create'      => 'Add New Repository',
                'update'      => 'Update Repository',
                'flashCreate' => 'The repository has been created successfully',
                'flashUpdate' => 'The repository has been updated successfully',
                'flashDelete' => 'The repository has been deleted successfully'
            ]
        ]
    ],

    'model' => [
        'columns' => [
            'repo' => [
                'title'  => 'Title',
                'path'   => 'Path',
                'branch' => 'Branch',
                'commit' => 'Commit'
            ]
        ]
    ]

];