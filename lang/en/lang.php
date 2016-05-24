<?php

return [

    'plugin' => [
        'name'        => 'Technologies Collection',
        'description' => 'Draws a bootstrap list of technologies for your portfolio website.'
    ],

    'navigation' => [
        'label' => 'Technologies',
        'sideMenu' => [
            'items' => 'Technologies List'
        ]
    ],

    'controller' => [
        'view' => [
            'items' => [
                'new'                 => 'New Item',
                'breadcrumb_label'    => 'Items',
                'return'              => 'Return to items list',
                'creating'            => 'Creating Item...',
                'delete_confirmation' => 'Do you really want to delete this item?'
            ]
        ],
        'list' => [
            'items' => 'Manage Items',
        ],
        'form' => [
            'items' => [
                'title'       => 'Item',
                'create'      => 'Create Item',
                'update'      => 'Update Item',
                'flashCreate' => 'The Item has been created successfully',
                'flashUpdate' => 'The Item has been updated successfully',
                'flashDelete' => 'The Item has been deleted successfully'
            ]
        ]
    ],

    'columns' => [
        'item' => [
            'title'   => 'Title',
            'link'    => 'Link',
            'image'   => 'Image',
            'order'   => 'Order',
            'target'  => 'Open in new window',
            'enabled' => 'Enabled'
        ]
    ],

    'fields' => [
        'item' => [
            'title'   => 'Title',
            'link'    => 'Link',
            'image'   => 'Image',
            'order'   => 'Order',
            'target'  => 'Open in new window',
            'enabled' => 'Enabled'
        ]
    ],

    'components' => [
        'technologies' => [
            'name'        => 'Technologies list',
            'description' => 'Display a technologies list in page.',
            'properties' => [
                'category' => [
                    'title' => 'Category',
                    'placeholder' => 'Select Category',
                    'all' => 'All'
                ],
                'pageNumber' => [
                    'title' => 'Page Number',
                    'description' => 'This value is used to determine what page the user is on.'
                ],
                'itemsPerPage' => [
                    'title' => 'Items per page',
                    'validationMessage' => 'Invalid format of the items per page value'
                ]
            ]
        ],
    ]

];