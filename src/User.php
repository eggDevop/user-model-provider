<?php

namespace UserProvider;

use UserProvider\Base;

/**
 * @SWG\Definition(definition="Author", type="object", required={"name"})
 */
class User extends Base
{
    private $configs;
    private $serviceName = 'user';

    public $helps = [
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

    // $config = [
    //     'url'    => 'http://ms-user-api.develop:8001/',
    //     'login'  => 'users/login',
    //     'create' => 'users',
    // ];

    public function __construct($configs = null)
    {

        if (!empty($configs)) {
            $this->configs = $configs;
        } else {
            $this->configs = [
                'url'    => 'http://ms-user-api.develop:8001/',
                'login'  => 'users/login',
                'create' => 'users',
            ];
        }

        //set curl
        $this->setCurl($this->configs['url']);

    }

    public function login($params)
    {
        $this->curl->post($this->configs['login'], $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function getUserList($params)
    {
        $this->curl->get($this->configs['list'], $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function createUser($params)
    {
        $this->curl->post($this->configs['create'], $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function updateUser($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['update']);

        $this->curl->put($uri, $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function deleteUser($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['delete']);

        $this->curl->delete($uri, $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }
}
