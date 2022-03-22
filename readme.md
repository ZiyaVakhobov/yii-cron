# Yii cron package

-----
## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require ziya/yii-cron
```

or add

```
"ziya/yii-cron": "*"
```

to the require section of your `composer.json` file.

------

## Configuration

Before using you must migrate

`php yii migrate --migrationPath="@vendor/ziya/yii-cron/src/migrations`

## Usage

Send sms cron
```php

<?php

class SendSmsCron extends \Ziya\YiiCron\BaseCron
{
    public static function key(){
        return 'send_sms_cron'
    }

    public function execute(){
        $sms = new Sms();
        $sms->phone_number = 123456789;
        $sms->body = "Hello world !";
        $sms->send();
    }
}
?>
```


Running crons
```php

<?php

$list = [
    SendSmsCron::class
];


$cron = new \Ziya\YiiCron\CronList($list);
$cron->execute();
?>

```