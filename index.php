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
  <!-- Self style -->
  <link id="customStyle" rel="stylesheet" type="text/css" href="css/style.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<?php
  if ($DBConn->ping()) {
    printf ("Our connection is ok!\n");
  } else {
    printf ("Error: %s\n", $DBConn->error);
  }
?>
<br>
<label for="mapRows">Rows</label>
<input type="number" id="mapRows" name="mapRows">
<label for="mapCols">Cols</label>
<input type="number" id="mapCols" name="mapCols">
<br>
<button onclick="updatePage()">CLICK ME !</button>
<br>

<div id="content" style="float: left">
  <div id="pageCaller">
    <?php
      include_once("canvas.php");
    ?>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
  var $content = $("#content"); // Where to load.
  function updatePage() {
    $content.load("index.php #pageCaller"); // What to load
  };
  var $style = $("#head");
  function updateStyle() {
    $style.load("index.php #customStyle"); // What to load
  };
</script>
</body>
</html>
