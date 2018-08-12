<?php
require_once("src/helper/DatabaseHelper.php");
require_once("src/data/DatabaseVars.php");

$db = new DatabaseHelper($host, $dbname, $username, $password);

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Countries</title>
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <script type="text/javascript" src="js/ui.js"></script>
</head>
<body>

<div id="header"> <?php require_once("templates/header.php") ?></div>
<div class="lurking-form">
    <label class="switch">
        <input id="toggle-form" type="checkbox">
        <span class="slider round"></span>
    </label>
    <label id="toggle-label">Show Added</label>
    <div id="form-add" style="display: none;"><?php require_once("forms/country-add.php") ?></div>

</div>


<div id="content"> <?php require_once("templates/content.php") ?></div>


<?php ob_flush(); ?>
</body>
</html>