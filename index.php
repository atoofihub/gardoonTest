<?php

ob_start();
require ('core/config.php');

require ('core/controller.php');

require ('core/model.php');
//
require ('core/app.php');
//
new APP;

?>