<?php
use yii\helpers\Html;
?>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php
		foreach ($input_css as $key => $value) {
			echo '<link rel="stylesheet" href="css/'.$value.'" />';
		}

		foreach ($input_js as $key => $value) {
			echo '<script src="js/'.$value.'"></script>';
		}

	?>


</head>