<?php

use yii\helpers\Html;
?>
 <?php
        foreach ($foot_js as $key => $value) {
            echo '<script src="js/'.$value.'"></script>';
        }

    ?>

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>

        <!-- inline scripts related to this page -->

        