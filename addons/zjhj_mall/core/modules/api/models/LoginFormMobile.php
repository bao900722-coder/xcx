<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/8
 * Time: 11:15
 */

namespace app\modules\api\models;

use app\models\User;
use Curl\Curl;
use yii\helpers\VarDumper;

class LoginFormMobile extends ApiModel
{
    public $contact_way;

    public $password;

    public function rules()

    {

        return [

            [['contact_way', 'password',], 'required'],

        ];

    }
    //登录
    public function searchOne($contact_way,$password)
    {
        $list=array();
        $list = User::find()->select(['id', 'type', 'username', 'password', 'auth_key', 'access_token', 'addtime', 'is_delete', 'wechat_open_id', 'wechat_union_id', 'nickname','avatar_url','store_id','is_distributor','parent_id','time','total_price','price','is_clerk','we7_uid','shop_id','level','integral','total_integral','money','contact_way','comments','binding','wechat_platform_open_id','platform'])
            ->where(['contact_way' => $contact_way, 'password' => md5($password)])->asArray()->one();
        if($list){
            $code=0;
            $msg='';
        }else{
            $code=400;
            $msg='手机号或密码错误';
        }
        return [
            'code' => $code,
            'msg' => '',
            'data' => $list
        ];
    }
    //注册
    public function register($contact_way,$password)
    {
        $list = User::find()->where(['contact_way'=>$contact_way])->one();
        if($list){
            return [
                'code' => 401,
                'msg' => "该手机号已被注册",
                'data' => '',
            ];
        }
        $User = new User();
        $User->type        =1;
        $User->contact_way =$contact_way;
        $User->password    =md5($password);
        $User->username = "呵呵哒";
        $User->auth_key = \Yii::$app->security->generateRandomString();
        $User->access_token = \Yii::$app->security->generateRandomString();
        $User->addtime = time();
        $User->is_delete = 0;
        $User->wechat_open_id = 1;
        $User->nickname = "呵呵哒";
        $User->avatar_url = "123456";
        $User->store_id = 0;
        $User->platform = 1; // 支付宝
        if($User->save()){
            $code=0;
            $msg='';
            $id=$User->id;
        }else{
            // $this->log($User->errors);
            $code=400;
            $msg='注册失败';
            $id=0;

        }
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $id
        ];
    }
    //忘记密码
    public function forgetPassword($contact_way,$password)
    {
        $list = User::find()->where(['contact_way'=>$contact_way])->one();

        if($list){
            $list->password=md5($password);
            if($list->save()){
                $code=0;
                $msg='';
                $id=$list->id;
            }else{
                $code=400;
                $msg='修改失败';
                $id=0;
            }
            
        }else{
            $code=401;
            $msg='手机号或密码错误';
            $id=0;
        }

        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $id
        ];
    }

    public function log($error_array){
        $time = microtime(true);
        $log = new FileTarget();
        $log->logFile = Yii::$app->getRuntimePath() . '/logs/songlin.log';
        $log->messages[] = ['这个地方出问题了'.PHP_EOL ,1,json_encode($error_array),$time];
        $log->export();
}
}
