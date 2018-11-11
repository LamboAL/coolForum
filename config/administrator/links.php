<?php

use App\Models\Link;

return [
    'title'   => 'Resource recommendation',
    'single'  => 'Resource recommendation',

    'model'   => Link::class,

    'permission'=> function()
    {
        return Auth::user()->hasRole('Founder');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'name',
            'sortable' => false,
        ],
        'link' => [
            'title'    => 'link',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'management',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'name',
        ],
        'link' => [
            'title'    => 'link',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'label ID',
        ],
        'title' => [
            'title' => 'name',
        ],
    ],
];