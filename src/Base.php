<?php

namespace UserProvider;

use UserProvider\Core\Curl;

class Base
{
	protected $curl;
	protected $messages;
    public $helps;

	public function __construct()
	{
		define('BASE_DIR', dirname(__DIR__) . '/src');
		$this->messages = include BASE_DIR . '/config/messages.php';
        $this->helps    = include BASE_DIR . '/config/help.php';
	}

	protected function setCurl($url)
	{
		$this->curl = new Curl($url);
	}

	//Method for manage erroe message
    protected function manageErrroMessage($errors)
    {
        //Define output
        $errorMsg = '';

        foreach ($errors as $error) {
            $eachMsg = '';
            if (isset($error['source']) && !empty($error['source'])) {
                foreach ($error['source'] as $source) {
                    if (!empty($eachMsg)) $eachMsg .= ',';    
                    $eachMsg .= $source['msgError'];
                }
                $eachMsg = $error['detail'].": ({$eachMsg})";
            }
            if (!empty($errorMsg)) $errorMsg .= '|';    
            $errorMsg .= $eachMsg;
        }
        return $errorMsg;
       
    }

	//Method for manage response
    protected function manageResponse($curl, $serviceName, $successCode=200)
    {
        //Define output
        $result = [
            'success' => true,
            'message' => '',
            'data'    => [],
        ];

        $response = $curl->response;

        if (empty($response)) {
            $result['success'] = false;
            $result['message'] = str_replace('[servicename]', $serviceName, $this->messages['serverError']);
            return $result;
        }

        $body = json_decode($response, true);

        if ($curl->http_status_code != $successCode) {
            $result['success'] = false;
            if (isset($body['message'])) {
                $result['message'] = $body['message'];
                return $result;
            }

            if (isset($body['errors']) && !empty($body['errors'])) {
                $result['message'] = $this->manageErrroMessage($body['errors']);
                return $result;
            }

            $result['message'] = str_replace('[servicename]', $serviceName, $this->messages['serverError']);

        } else {
            //success
            $result = array_merge($result, $body);
        }

        return $result;
    }
}
