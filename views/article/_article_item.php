<?php
/** @var $model \app\models\Article */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
?>

<div>
    <a href="<?php echo Url::to(['article/view', 'slug' => $model->slug]) ?>">
        <h3><?php echo Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?php echo StringHelper::truncateWords($model->getEncodedBody(), 40) ?>
    </div>
    <p class="text-muted text-right">
        <small>Created At: <b><?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></b></small>

        By: <b><?php echo $model->createdBy->username ?></b>
    </p>
    <hr>
</div>