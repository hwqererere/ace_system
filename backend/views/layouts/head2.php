<?php
use yii\helpers\Html;
?>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="overview &amp; stats" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(\Yii::t('app',$this->title)) ?></title>
    <!--basic styles-->

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
		foreach ($input_css as $key => $value) {
			echo "<link rel=\"stylesheet\" href=\"css/".$value."\" />\n";
		}
	?>

</head>