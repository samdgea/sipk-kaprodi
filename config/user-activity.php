<?php

return [
    'activated'        => true, // active/inactive all logging
    'middleware'       => ['web', 'auth', 'role:Super User'],
    'route_path'       => null,
    'admin_panel_path' => 'admin/dashboard',
    'delete_limit'     => 30, // default 7 days

    'model' => [
        'user' => "App\Models\User"
    ],

    'log_events' => [
        'on_create'     => false,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_lockout'    => true
    ]
];
