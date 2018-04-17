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

        parent::__construct();
    }

    public function login($params)
    {
        //set curl
        $this->setCurl($this->configs['url']);
        
        $this->curl->post($this->configs['login'], $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function getUserList($params)
    {
        //set curl
        $this->setCurl($this->configs['url']);
        
        $this->curl->get($this->configs['list'], $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function getUserDetail($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['detail']);

        //set curl
        $this->setCurl($this->configs['url']);
        
        $this->curl->get($uri, $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function createUser($params)
    {
        //set curl
        $this->setCurl($this->configs['url']);
        
        $this->curl->post($this->configs['create'], $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function updateUser($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['update']);

        //set curl
        $this->setCurl($this->configs['url']);
        
        $this->curl->put($uri, $params, true);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function deleteUser($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['delete']);

        //set curl
        $this->setCurl($this->configs['url']);
        
        $this->curl->delete($uri, $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }

    public function changePassword($params)
    {
        //complete uri
        $uri = str_replace('[id]', $params['id'], $this->configs['change_password']);

        //set curl
        $this->setCurl($this->configs['url']);
        
        $this->curl->put($uri, $params);

        return $this->manageResponse($this->curl, $this->serviceName);
    }
}
