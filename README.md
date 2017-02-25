# 版本说明 php5.4 + php5.5.0

> 此library依赖guzzlehttp库
>
> 目前master分支要求php>=5.5.0，默认安装该分支
>
> php<5.5.0的版本可安装jzweb/sdk:dev-php5.4的分支

# 安装 

## 1.修改composer配置（项目）将镜像地址指向国内代理

>```
>composer config repo.packagist composer https://packagist.composer-proxy.org
>```

## 2.上述命令执行成功后会看到以下变化

>```
>"repositories": {
>      "packagist": {
>          "type": "composer",
>          "url": "https://packagist.composer-proxy.org"
>      }
>  }
>```

## 3.安装jzweb/sdk
```
composer require jzweb/sdk
```


# jzweb/sdk 使用示例
```
<?php
//平台请求配置
$config = array(
        'key' => 'apiKey', //您的应用key
        'prefix' => 'Prefix', //签名前缀
        'secret' => 'Your Secret', //您的应用secret 密钥
        'url' => 'http://www.server.com', //API请求地址
        'debug' => false, //是否启用debug模式
        );
$client = new \jzweb\sdk\client($config);

//单个参数赋值
$client->api = 'test.api';
$client->user_id = 1000;

//批量赋值
$client->setParams(array('name'=>'yeyupl','email'=>'yeyupl@qq.com'));

//GET请求
$response = $client->get();

//POST请求
$response = $client->post();

//获得组装GET参数后的URL
echo $client->getUrl();

//获得所有参数
print_r($client->getParams());

```

------

# 问题（git 提交vendor目录至项目）

* 如果当前开发的项目中包含vender目录，安装后提交代码，发现版本库中并没有jzweb/sdk的代码文件
* 出现这种情况后，马上去服务器查看，发现也没有，是什么问题？
* 仔细查阅了一些文档，发现是因为该安装包包含.git的缘故，于是可这样操作
* 1.vendor目录已经存在

    ```
    如果已经执行了composer update/install，需要先删除vendor目录 执行：rm -rf vendor
    git add -A
    git commit -m "remove vendor"
    composer update --prefer-dist
    git add . -A 
    git commit -m "recover vendor"
    ```
* 2.vendor目录不存在
    
    ```
    composer update --prefer-dist
    git add . -A 
    git commit -m "recover vendor"
    ```
* Notice: composer update --prefer-dist 优先从缓存取，不携带组件内的.git目录。
* 对于稳定版本 compose默认采用--prefer-dist模式安装
* --optimize-autoloader (-o): 转换 PSR-0/4 autoloading 到 classmap 可以获得更快的加载支持。特别是在生产环境下建议这么做，但由于运行需要一些时间，因此并没有作为默认值。


