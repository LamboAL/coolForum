<?php

use App\Models\User;

return [
    'title'   => 'user',

    'single'  => 'user',

    'model'   => User::class,

    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
    },

    'columns' => [

        'id',

        'avatar' => [
            'title'  => 'Avatar',

            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
            },

            'sortable' => false,
        ],

        'name' => [
            'title'    => 'username',
            'sortable' => false,
            'output' => function ($name, $model) {
                return '<a href="/users/'.$model->id.'" target=_blank>'.$name.'</a>';
            },
        ],

        'email' => [
            'title' => 'mailbox',
        ],

        'operation' => [
            'title'  => 'management',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'username',
        ],
        'email' => [
            'title' => 'mailbox',
        ],
        'password' => [
            'title' => 'password',

            'type' => 'password',
        ],
        'avatar' => [
            'title' => 'profile picture',

            'type' => 'image',

            'location' => public_path() . '/uploads/images/avatars/',
        ],
        'roles' => [
            'title'      => 'User role',

            'type'       => 'relationship',

            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [

            'title' => 'User ID',
        ],
        'name' => [
            'title' => 'username',
        ],
        'email' => [
            'title' => 'mailbox',
        ],
    ],
];