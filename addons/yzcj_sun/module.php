<?php

/**

 * -微圈小程序模块定义

 *

 * @author 新睿社区

 * @url http://www.010xr.com/

 */

defined('IN_IA') or exit('Access Denied');



class yzcj_sunModule extends WeModule {





	public function welcomeDisplay()

    {   
    	global $_GPC, $_W;

        $url = $this->createWebUrl('index');
        if ($_W['role'] == 'operator') {
        	$url = $this->createWebUrl('account');
        }

        Header("Location: " . $url);

    }

}