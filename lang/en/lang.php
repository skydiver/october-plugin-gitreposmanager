<?php

return [

    'plugin' => [
        'name'        => 'Git Repos Manager',
        'description' => 'Keep track of your repos.'
    ],

    'navigation' => [
        'label'       => 'Git Repos Manager',
        'description' => 'Keep track of your GIT repos.'
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
                'after_refresh'       => 'Repositories information updated'
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
                'title'   => 'Repository Title',
                'path'    => 'Repository Path',
                'branch'  => 'Branch',
                'commit'  => 'Commit',
                'author'  => 'Author',
                'message' => 'Message',
                'date'    => 'Commit Date'
            ]
        ],
        'errors' => [
            'validator_is_readable' => 'Could not read from local repository'
        ]
    ]

];