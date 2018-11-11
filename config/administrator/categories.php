<?php

use App\Models\Category;

return [
    'title'   => 'classification',
    'single'  => 'classification',
    'model'   => Category::class,

    'action_permissions' => [
        'delete' => function () {
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'name',
            'sortable' => false,
        ],
        'description' => [
            'title'    => 'description',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'management',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'name' => [
            'title' => 'name',
        ],
        'description' => [
            'title' => 'description',
            'type'  => 'textarea',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'classification ID',
        ],
        'name' => [
            'title' => 'name',
        ],
        'description' => [
            'title' => 'description',
        ],
    ],
    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique'   => 'The category name is duplicated in the database. Please choose a different name.',
        'name.required' => 'Please make sure the name is at least one character or more',
    ],
];