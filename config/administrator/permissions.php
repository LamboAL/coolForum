<?php

use Spatie\Permission\Models\Permission;

return [
    'title'   => 'Permission',
    'single'  => 'Permission',
    'model'   => Permission::class,

    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    'action_permissions' => [
        'create' => function ($model) {
            return true;
        },
        'update' => function ($model) {
            return true;
        },
        'delete' => function ($model) {
            return false;
        },
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'Mark',
        ],
        'operation' => [
            'title'    => 'management',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Marking (please modify carefully)',

            'hint' => 'Modifying the permission ID will affect the call of the code, please do not change it easily.'
        ],
        'roles' => [
            'type' => 'relationship',
            'title' => 'Character',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'name' => [
            'title' => 'Mark',
        ],
    ],
];