### php-esign-sdk
1. 修改composer.json
```
"repositories": [
        {
            "type": "composer",
            "url": "https://mirrors.aliyun.com/composer/"
        },
        {
            "packagist": false
        },
        {
            "type": "git",
            "url": "git@github.com:thisisxiong/esign-php-sdk.git"
        }
    ]
```
2. 引入mili/esign
```
composer require mili/esign:v1.1
```
