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
                'url'    => 'http://ms-user-api.develop/',
                'login'  => 'users/login',
                'create' => 'users',
            ];
        }

        //set curl
        $this->setCurl($this->configs['url']);

        parent::__construct();
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

    public function getUserDetail($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['detail']);

        $this->curl->get($uri, $params);

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

    public function changePassword($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['change_password']);

        $this->curl->put($uri, $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }
}
