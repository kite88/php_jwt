<?php
require_once 'Jwt.php';

$jwt = new Jwt();
$jwt->setKey('123123123');//key
$jwt->setIss('Auth0');//JWT的签发者
$jwt->setIat(time());//签发时间
$jwt->setExp(time() + 60 * 60 * 24);//过期时间为1天
$jwt->setClaim(['id' => 100, 'nickname' => '志在卓越']);//存储数据
//生成token并获取
$token = $jwt->getToken();
var_dump($token);

//token验证
$verifyResult = $jwt->verifyToken($token);
if (!$verifyResult) {
    var_dump("token 无效");
} else {
    var_dump($jwt->getClaim());//获取存储数据
    var_dump($jwt->getExp());//获取token过期时间
}
