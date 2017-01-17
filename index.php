<?php
    if (! isset($HTML_TITLE) OR $HTML_TITLE == "") {
        $HTML_TITLE = "Front page";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head id="head">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $HTML_TITLE?></title>
    <?php require_once 'DBConn.php'; ?>
    <!-- Bootstrap -->
    <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Self style -->
    <link id="customStyle" rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container" id="content">
    <div class="row" id="pageCaller">
    <?php
        include_once("canvas.php");
    ?>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    /*var $content = $("#content"); // Where to load.
    setInterval(function () {
        $content.load("index.php #pageCaller"); // What to load
    }, 10 * 1000); // Interval in milliseconds
    var $style = $("#head");
    setInterval(function() {
        $style.load("index.php #customStyle");
    }, 10 * 1000);
</script>
</body>
</html>
