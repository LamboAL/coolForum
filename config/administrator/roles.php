<?php

use Spatie\Permission\Models\Role;

return [
    'title'   => 'Character',
    'single'  => 'Character',
    'model'   => Role::class,

    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'Identification'
        ],
        'permissions' => [
            'title'  => 'Permission',
            'output' => function ($value, $model) {
                $model->load('permissions');
                $result = [];
                foreach ($model->permissions as $permission) {
                    $result[] = $permission->name;
                }

                return empty($result) ? 'N/A' : implode($result, ' | ');
            },
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'management',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Identification',
        ],
        'permissions' => [
            'type' => 'relationship',
            'title' => 'Permission',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'Identification',
        ]
    ],

    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
    ],

    'messages' => [
        'name.required' => 'ID cannot be empty',
        'name.unique' => 'Identification already exists',
    ]
];