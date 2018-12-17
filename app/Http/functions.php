<?php

/**
 * 公共函数
 */
/**
 * Notes:验证码
 * Author:sjzlai
 */
 function imgCode()
{
    $app = app('code');//可以使用app全局函数 参数为code 生成code实例
    $app->make();    //make() 为生成验证码的方法
    //$app->fontSize = 16;// 设置字体大小
    //$app->num = 4;// 设置验证码数量
    //$app->width = 100// 设置宽度
    //$app->height = 30// 设置宽度
    //$app->font = ./1.ttf // 设置字体目录
    return $app->get(); //get() 为获取验证码的方法
}

function pic($file,$url_path)
{

    $rule = ['jpg', 'png', 'gif'];
    if ($file->isValid()) {

        $clientName = $file->getClientOriginalName();
        $tmpName = $file->getFileName();
        $realPath = $file->getRealPath();
        $entension = $file->getClientOriginalExtension();
        if (!in_array($entension, $rule)) {
            return '图片格式为jpg,png,gif';
        }
        $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
        $path = $file->move($url_path, $newName);
        $data= $url_path . '/' . $newName;
        return $data;
    }
}


function picArray($file,$url_path)
{

    $rule = ['jpg', 'png', 'gif'];
    foreach ($file as $value) {
        if ($value->isValid()) {

            $clientName = $value->getClientOriginalName();
            $tmpName = $value->getFileName();
            $realPath = $value->getRealPath();
            $entension = $value->getClientOriginalExtension();
            if (!in_array($entension, $rule)) {
                return '图片格式为jpg,png,gif';
            }
            $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
            $path = $value->move($url_path, $newName);
            $data[] = $url_path . '/' . $newName;

        }
    }
    return $data;
}
/**
 * @param $url 目标url
 * @param $type 1为get 2为post
 * @param array $data post数据
 * @name curl get & post
 * @author
 */
function http_curl($url,$type=1, array $data=null){
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    if($type==2 && !empty($data)){
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据
        $post_data =$data;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    }
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    return $data;
}
/**
 * @param $url
 * @return mixed
 * @name curl https get
 * @author
 */
function curl_get_https($url){
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
//    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
    $tmpInfo = curl_exec($curl);     //返回api的json对象
    //关闭URL请求
    curl_close($curl);
    return $tmpInfo;    //返回json对象
}

/**
 * @param $url
 * @param $data
 * @return mixed
 * @name curl https post
 * @author
 */
function curl_post_https($url,$data){ // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
//    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
        echo 'Errno'.curl_error($curl);//捕抓 异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据，json格式
}