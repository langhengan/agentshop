<?php
/**
 * Created by PhpStorm.
 * User: yjy
 * Date: 2018/11/20
 * Time: 22:05
 */

namespace App\Http\Common;

class SmsRest
{
    //主帐号,对应开官网发者主账号下的 ACCOUNT SID
    public $accountSid = '8aaf07085f004cdb015f0e728a5d05e0';

    //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
    public $accountToken= 'a6b8a429a29845df9c03d2a0529fe35e';

    //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
    //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
    public $appId = '8a216da85f008800015f0e8f05810518';

    //请求地址
    //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
    //生产环境（用户应用上线使用）：app.cloopen.com
    public $serverIP = 'app.cloopen.com';


    //请求端口，生产环境和沙盒环境一致
    public $serverPort = '8883';

    //REST版本号，在官网文档REST介绍中获得。
    public $softVersion = '2013-12-26';

    public function __construct()
    {
    }

    public function sendTemplateSMS($to,$datas,$tempId)
    {
        // 初始化REST SDK
        $rest = new Rest($this->serverIP,$this->serverPort,$this->softVersion);
        $rest->setAccount($this->accountSid,$this->accountToken);
        $rest->setAppId($this->appId);

        // 发送模板短信
//        echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
//        dd($result);
        if($result == NULL ) {
            return "result error!";
        }
        if($result->statusCode!=0) {
       /*     echo "error code :" . $result->statusCode . "<br>";
            echo "error msg :" . $result->statusMsg . "<br>";*/
            $data=array('errorMsg'=>$result->statusMsg,'errorCode'=>$result->statusCode);
            return $data;
            //TODO 添加错误处理逻辑
        }else{
//            echo "Sendind TemplateSMS success!<br/>";
            // 获取返回信息
            $smsmessage = $result->TemplateSMS;
//            echo "dateCreated:".$smsmessage->dateCreated."<br/>";
//            echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
            return "success";
            //TODO 添加成功处理逻辑
        }
    }
}