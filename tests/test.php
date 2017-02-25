<?php

/**
 * jzweb-sdk集成测试
 *
 * @user 刘松森 <liusongsen@gmail.com>
 * @date 2017/2/24
 */

include "../vendor/autoload.php";

$sdk = new \jzweb\sdk\client(array());
var_dump($sdk);
