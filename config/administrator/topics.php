<?php

use App\Models\Topic;

return [
    'title'   => 'topic',
    'single'  => 'topic',
    'model'   => Topic::class,

    'columns' => [

        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'topic',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return '<div style="max-width:260px">' . model_link($value, $model) . '</div>';
            },
        ],
        'user' => [
            'title'    => 'Author',
            'sortable' => false,
            'output'   => function ($value, $model) {
                $avatar = $model->user->avatar;
                $value = empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" style="height:22px;width:22px"> ' . $model->user->name;
                return model_link($value, $model);
            },
        ],
        'category' => [
            'title'    => 'classification',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return model_admin_link($model->category->name, $model->category);
            },
        ],
        'reply_count' => [
            'title'    => 'comment',
        ],
        'operation' => [
            'title'  => 'management',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'title',
        ],
        'user' => [
            'title'              => 'user',
            'type'               => 'relationship',
            'name_field'         => 'name',

            'autocomplete'       => true,

            'search_fields'      => ["CONCAT(id, ' ', name)"],

            'options_sort_field' => 'id',
        ],
        'category' => [
            'title'              => 'classification',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => ["CONCAT(id, ' ', name)"],
            'options_sort_field' => 'id',
        ],
        'reply_count' => [
            'title'    => 'comment',
        ],
        'view_count' => [
            'title'    => 'View',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'content ID',
        ],
        'user' => [
            'title'              => 'user',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'category' => [
            'title'              => 'classification',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
    ],
    'rules'   => [
        'title' => 'required'
    ],
    'messages' => [
        'title.required' => 'Please fill in the title',
    ],
];