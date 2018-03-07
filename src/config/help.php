<?php

return [
    'method_list' => ['login', 'getUserList', 'createUser', 'updateUser', 'deleteUser'],
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
        'params' => [],
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
    ]
];