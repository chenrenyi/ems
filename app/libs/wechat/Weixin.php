<?php
require_once(dirname(__FILE__)."/autoload.php");

use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\Broadcast;
use Overtrue\Wechat\Auth as WeixinAuth;
use Overtrue\Wechat\Staff;
use Overtrue\Wechat\User;


//$server->on('message', function($message){
    //return "这是毕设的测试账号，相关功能正在开发中...";
//});
//echo $server->serve();

class Weixin {

    private static $instance;
    private static $apps;
    private static $appId = 'wxcdf4bed6d3babbe8';
    private static $sercet = 'f4e94154e2251f83b62af260ddd1dabe';
    private static $token = "weixin";

    public static function test() {
        echo "yes";
    }

    public function test2() {
        echo 'test2 successed';
    }

    public function __constrct() {
    }

    public function __clone() {
        trigger_error('Clone is not allow', E_USER_ERROR);
    }

    // 返回单例
    public static function sigleton() {
        if(!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function app($type) {
        if(!in_array($type, ['serve', 'broadcast', 'js', 'auth', 'staff', 'user'])) {
            throw new Exception('app type is not correct');
        }

        if(!isset(self::$apps[$type])) {
            if($type == 'serve') {
                 $app = new Server(self::$appId, self::$token);
            }
            if($type == 'broadcast') {
                 $app = new Broadcast(self::$appId, self::$sercet);
            }
            if($type == 'auth') {
                 $app = new WeixinAuth(self::$appId, self::$sercet);
            }
			if($type == 'staff') {
				$app = new Staff(self::$appId, self::$sercet);
			}
            if($type == 'user') {
                $app = new User(self::$appId, self::sercet);
            }
            self::$apps[$type] = $app;
        }
        return self::$apps[$type];
    }

    //群发消息
    public function send($message, $groupId=null) {
        $boardcast = self::app('broadcast');
        if($groupId === null) {
            $boardcast->send($message)->to();
        } else {
            $boardcast->send($message)->to($groupId);
        }
    }

	//新建消息
    public static function makeMsg($type, $content) {
        if($type == 'text') {
            $message = Message::make('text')->content($content);
        }
        return $message;
    }

    //时间转换函数(把时间显示人性化)
    public static function formatTime($time)
    {
        $time = strtotime($time);
        $rtime = date("m-d H:i",$time);     
        $htime = date("H:i",$time);           
        $time = time() - $time;       
        if ($time < 60) {         
            $str = '刚刚';       
        } elseif ($time < 60 * 60){         
            $min = floor($time/60);         
            $str = $min.'分钟前';     
        } elseif ($time < 60 * 60 * 24){         
            $h = floor($time/(60*60));         
            $str = $h.'小时前 '.$htime;     
        } elseif ($time < 60 * 60 * 24 * 3){         
            $d = floor($time/(60*60*24));         
            if ($d==1){
                $str = '昨天 '.$rtime;
            } else {
                $str = '前天 '.$rtime;     
            }
        } else {         
            $str = $rtime;     
        }     

        return $str; 
    }
}
