
<p align="center">
  <a href="https://github.com/codificar/yii2imagecache">
    <img alt="Codificar" src="https://codificar.com.br/wp-content/uploads/2019/04/logo-cod.png.webp" width="300">
  </a>
</p>

<h1 align="center">
  <a href="https://github.com/codificar/yii2imagecache">
    Yii2 ImageCache
  </a>
</h1>
<p align="center">
  Biblioteca desenvolvida pela Codificar .
</p>

<p align="center">
  <a href="https://github.com/facebook/react-native/blob/master/LICENSE">
    <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="React Native is released under the MIT license." />
  </a>
  <a href="https://github.com/codificar/yii2imagecache/releases/">
    <img src="https://img.shields.io/badge/vers%C3%A3o-0.0.5-green" alt="Versão" />
  </a>
  <a href="https://packagist.org/packages/codificar/yii2imagecache/stats">
    <img src="https://img.shields.io/packagist/dt/codificar/yii2imagecache.svg" alt="Downloads" />
  </a>
</p>


Based in [yii2-imagecache](https://github.com/iutbay/yii2-imagecache)

Installation
------------
The preferred way to install this helper is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "codificar/yii2imagecache" "0.0.5"
```

or add

```json
"codificar/yii2imagecache" : "0.0.5"
```

to the require section of your application's `composer.json` file.

Configuration
-------------
You should :
* Add `ThumbAction` in one of your controller.
* Modify your application configuration :
  * add _imageCache_ component,
  * add url rule to handle request to missing thumbs.

### Add _ThumbAction_
You need to add `ThumbAction` in one of your controller so that imageCache can handle requests to missing thumbs and create them on demand. You could use `site` controller :
```php
class SiteController extends Controller
{
  ...
  public function actions()
  {
      return [
        ...
        'thumb' => 'codificar\yii2imagecache\ThumbAction',
        ...
      ];
  }
  ...
}
```

### _imageCache_ component config
You should add _imageCache_ component in your application configuration :
```php
$config = [
    'components' => [
      ...
      'imageCache' => [
        'class' => 'iutbay\yii2imagecache\ImageCache',
        'sourcePath' => '@app/web/images',
        'sourceUrl' => '@web/images',
        //'thumbsPath' => '@app/web/thumbs',
        //'thumbsUrl' => '@web/thumbs',
        //'sizes' => [
        //    'thumb' => [150, 150],
        //    'medium' => [300, 300],
        //    'large' => [600, 600],
        //],
      ],
      ...
    ],
];
```

### _urlManager_ config
You should modify your _urlManager_ configuration :
```php
$config = [
    'components' => [
      ...
      'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
          ...
          'thumbs/<path:.*>' => 'site/thumb',
          ...
        ],
      ],
      ...
    ],
];
```

How to use
----------
```php
<?= Yii::$app->imageCache->thumb('/your-app/images/2014/test.jpg') ?>
// <img src="/your-app/thumbs/2014/test_thumb.jpg" alt="">

<?= Yii::$app->imageCache->thumbSrv('/your-app/images/2014/test.jpg') ?>
// url_string ="/your-app/thumbs/2014/test_medium.jpg"

```
