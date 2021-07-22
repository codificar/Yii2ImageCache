<?php

namespace codificar\yii2imagecache;

use Exception;
use Yii;
use yii\web\HttpException;

/**
 * TOD (Thumb On Demand) Action
 * @author Kevin LEVRON <kevin.levron@gmail.com>
 */
class ThumbAction extends \yii\base\Action
{

    public function run($path)
    {
        try {
            if (empty($path) || !Yii::$app->imageCache->output($path)) {
                throw new HttpException(404, Yii::t('yii', 'Page not found.'));
            }
        } catch(Exception $e) {
            throw new HttpException(404, Yii::t('yii', 'Page not found.'));
        }
    }

}
