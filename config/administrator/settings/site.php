<?php

return [
    'title' => 'Site settings',

    'permission'=> function()
    {
        
        return Auth::user()->hasRole('Founder');
    },

    'edit_fields' => [
        'site_name' => [
            'title' => 'Site name',

            'type' => 'text',

            'limit' => 50,
        ],
        'contact_email' => [
            'title' => 'Contact mailbox',
            'type' => 'text',
            'limit' => 50,
        ],
        'seo_description' => [
            'title' => 'SEO - Description',
            'type' => 'textarea',
            'limit' => 250,
        ],
        'seo_keyword' => [
            'title' => 'SEO - Keywords',
            'type' => 'textarea',
            'limit' => 250,
        ],
    ],

    
    'rules' => [
        'site_name' => 'required|max:50',
        'contact_email' => 'email',
    ],

    'messages' => [
        'site_name.required' => 'Please fill in the site name.',
        'contact_email.email' => 'Please fill in the correct contact email format.',
    ],

    

    'actions' => [

        'clear_cache' => [
            'title' => 'Update system cache',

            'messages' => [
                'active' => 'Emptying cache...',
                'success' => 'The cache has been cleared!',
                'error' => 'An error occurred while emptying the cache!',
            ],

            'action' => function(&$data)
            {
                \Artisan::call('cache:clear');
                return true;
            }
        ],
    ],
];