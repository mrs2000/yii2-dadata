# DaData Yii2 Input Widget
Components for working with Dadata

[DaData API](https://dadata.ru/api/suggest/)

### Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).
Either run
```
php composer.phar require --prefer-dist mrssoft/yii2-dadata "*"
```
or add
```
"mrssoft/yii2-dadata": "*"
```
to the require section of your `composer.json` file.

### Usage
```php
echo DaDataInputWidget::widget([
    'name' => 'name',
    'options' => [
        'class' => 'form-control'
        'placeholder' => 'you placeholder'
    ],
    'clientOptions' => [
        'token' => 'you token',
        'count' => 5,
        'type' => DaDataInputWidget::TYPE_PARTY,
    ],
    'clientEvents' => [
        'onSelect' => new \yii\web\JsExpression('function (suggestion) {
            console.log(suggestion);
        }')            
    ]
]);
```

```php
$ipLocate = new DaDataIpLocate(['token' => '...']);

$response = $ipLocate->address();
//or
$response = $ipLocate->address($ip);
```