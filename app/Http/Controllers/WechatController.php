<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QCloud_WeApp_SDK\Auth\LoginService as LoginService;
use QCloud_WeApp_SDK\Tunnel\TunnelService as TunnelService;
use App\Business\ChatTunnelHandler;

class WechatController extends Controller
{
	public function login()
	{
		$result = LoginService::login();
	}

	public function user()
	{
		$result = LoginService::check();
		// check failed
		if ($result['code'] !== 0) {
			return;
		}
		$response = array(
			'code' => 0,
			'message' => 'ok',
			'data' => array(
				'userInfo' => $result['data']['userInfo'],
			),
		);
		echo json_encode($response, JSON_FORCE_OBJECT);
    }

    public function tunnel()
    {
        $handler = new ChatTunnelHandler();
        TunnelService::handle($handler, array('checkLogin' => TRUE));
    }
}
