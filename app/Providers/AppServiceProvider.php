<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use QCloud_WeApp_SDK\Conf as Conf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{

		/**
		 * --------------------------------------------------------------------
		 * 设置 SDK 基本配置
		 * --------------------------------------------------------------------
		 */
		Conf::setup([
			'ServerHost' => env('serverHost'),
			'AuthServerUrl' => env('authServerUrl'),
			'TunnelServerUrl' => env('tunnelServerUrl'),
			'TunnelSignatureKey' => env('tunnelSignatureKey'),
		]);
		/**
		 * 也可以调用独立方法进行设置
		 *
		 * Conf::setServerHost($config['serverHost']);
		 * Conf::setAuthServerUrl($config['authServerUrl']);
		 * Conf::setTunnelServerUrl($config['tunnelServerUrl']);
		 * Conf::setTunnelSignatureKey($config['tunnelSignatureKey']);
		 */
		// 设置网络请求超时时长（可选，默认 30 秒）
		// Conf::setNetworkTimeout(env('networkTimeout'));
		/**
		 * --------------------------------------------------------------------
		 * 设置 SDK 日志输出配置（主要是方便调试）
		 * --------------------------------------------------------------------
		 */
		// 开启日志输出功能
		Conf::setEnableOutputLog(TRUE);
		// 指定 SDK 日志输出目录（注意尾斜杠不能省略）
		Conf::setLogPath(storage_path().'/logs/');
		// 设置日志输出级别
		// 1 => ERROR, 2 => DEBUG, 3 => INFO, 4 => ALL
		Conf::setLogThresholdArray(array(2)); // output debug log only
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
