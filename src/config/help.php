<?php

return [
    'method_list' => ['login', 'getUserList', 'getUserDetail', 'createUser', 'updateUser', 'deleteUser', 'changePassword'],
    'login' => [
        'params' => [
            'username' => 'required',
            'password' => 'required',
            'ref_type' => 'required',
        ],
        'output' => [
            'attributes.username'   => 'Username',
            'attributes.ref_type'   => 'Reference Type',
            'attributes.ref_id'     => 'Reference ID',
            'attributes.status'     => 'User Status',
            'attributes.created_at' => 'Create date time',
            'attributes.updated_at' => 'Update date time',
            'id'                    => 'User ID',
        ]
    ],
    'getUserList' => [
        'params' => [
            'username' => 'not required',
            'ref_type' => 'not required',
            'ref_id'   => 'not required',
            'limit'    => 'not required',
            'offset'   => 'not required',
            'order_by' => 'not required (ex => username:asc)',
        ],
        'output' => [
            [
                'attributes.username'   => 'Username',
                'attributes.ref_type'   => 'Reference Type',
                'attributes.ref_id'     => 'Reference ID',
                'attributes.status'     => 'User Status',
                'attributes.created_at' => 'Create date time',
                'attributes.updated_at' => 'Update date time',
                'id'                    => 'User ID',
            ]
        ]
    ],
    'getUserList' => [
        'params' => [],
        'output' => [
            'attributes.username'   => 'Username',
            'attributes.ref_type'   => 'Reference Type',
            'attributes.ref_id'     => 'Reference ID',
            'attributes.status'     => 'User Status',
            'attributes.created_at' => 'Create date time',
            'attributes.updated_at' => 'Update date time',
            'id'                    => 'User ID',
        ]
    ],
    'createUser' => [
        'params' => [
            'username' => 'required',
            'password' => 'required',
            'ref_type' => 'required',
            'status'   => 'required (active/inactive)',
        ],
        'output' => [
            'attributes.username'   => 'Username',
            'attributes.password'   => 'Password',
            'attributes.ref_type'   => 'Reference Type',
            'attributes.ref_id'     => 'Reference ID',
            'attributes.created_at' => 'Create date time',
            'attributes.updated_at' => 'Update date time',
            'id'                    => 'User ID',
        ]
    ],
    'updateUser' => [
        'params' => [
            'id'       => 'required'
        ],
        'output' => [
            'attributes.username'   => 'Username',
            'attributes.password'   => 'Password',
            'attributes.ref_type'   => 'Reference Type',
            'attributes.ref_id'     => 'Reference ID',
            'attributes.created_at' => 'Create date time',
            'attributes.updated_at' => 'Update date time',
            'id'                    => 'User ID',
        ]
    ],
    'deleteUser' => [
        'params' => [
            'id'       => 'required'
        ],
        'output' => [
            'attributes.username'   => 'Username',
            'attributes.password'   => 'Password',
            'attributes.ref_type'   => 'Reference Type',
            'attributes.ref_id'     => 'Reference ID',
            'attributes.created_at' => 'Create date time',
            'attributes.updated_at' => 'Update date time',
            'id'                    => 'User ID',
        ]
    ],
    'changePassword' => [
        'params' => [
            'old' => 'required'
            'new' => 'required'
        ],
        'output' => [
            'attributes.username'   => 'Username',
            'attributes.password'   => 'Password',
            'attributes.ref_type'   => 'Reference Type',
            'attributes.ref_id'     => 'Reference ID',
            'attributes.created_at' => 'Create date time',
            'attributes.updated_at' => 'Update date time',
            'id'                    => 'User ID',
        ]
    ],
    'configs' => [
        'url'             => 'http://ms-user-api.develop/',
        'login'           => 'users/login',
        'list'            => 'users',
        'detail'          => 'users/[id]',
        'create'          => 'users',
        'update'          => 'users/[id]',
        'delete'          => 'users/[id]',
        'change_password' => 'users/[id]/change/password',
    ]
];