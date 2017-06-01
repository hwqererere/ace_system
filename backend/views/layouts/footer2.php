<?php

use yii\helpers\Html;
?>
		
       
 <?php
        foreach ($foot_js as $key => $value) {
            echo '<script src="js/'.$value.'"></script>';
        }

    ?>
      
<!--[if lte IE 8]>
          <script src="js/excanvas.min.js"></script>
        <![endif]-->
      

<script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

        

