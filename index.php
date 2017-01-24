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
  <link rel="stylesheet" type="text/css" href="submodules/jQuery-Seat-Charts/jquery.seat-charts.css">
  <link rel="stylesheet" type="text/css" href="css/hlpf_seatsStyling.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<?php
  if ($DBConn->ping()) {
    #printf ("Database: OK!\n");
  } else {
    printf ("Database Error: %s\n", $DBConn->error);
  }
?>
<div id="seat-map"></div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- jQuery-Seat-Charts -->
<script type="text/javascript" src="submodules/jQuery-Seat-Charts/jquery.seat-charts.js"></script>
<!-- Mini-version <script type="text/javascript" src="submodules/jQuery-Seat-Charts/jquery.seat-charts.min.js"></script> -->
<?php
  // TODO: UPDATE QUERY, GET ALL THE INFO.
  $result = $DBConn->query("SELECT * FROM  `Seatmap` WHERE  `SeatmapID` = 2");
  if ($result -> num_rows) {
    $row = $result->fetch_assoc();
    #echo print_r($row);
    $seats = str_split($row['SeatString'], $row['Width']);
  }
?>
<script type="text/javascript">
$(document).ready(function() {
  var sc = $('#seat-map').seatCharts({
    map: [
      <?php
      for ($i=0; $i < count($seats); $i++) {
        echo "'";
        $i_iteration = 0;
        for ($j=0; $j < strlen($seats[$i]); $j++) {
          if (substr($seats[$i], $j, 1) != "_") {
            $i_iteration += 1;
            // See https://github.com/mateuszmarkowski/jQuery-Seat-Charts#map
            // Grab a single seat in the row.    ## a[,LABEL]
            echo substr($seats[$i], $j, 1) . "[" . ($i + 1) . "_" . $i_iteration . "," . $i_iteration . "]";
          } else { echo substr($seats[$i], $j, 1); }
        }
        echo "',";
      }
      unset($seats, $result, $row, $i_iteration);
      ?>],
    seats: {
      a: { price: 10 },
      c: { price: 20, classes: 'seatStyle_Crew' }
    },
    click: function () {
      if (this.status() == 'available') {
        //do some stuff, i.e. add to the cart
        return 'selected';
      } else if (this.status() == 'selected') {
        //seat has been vacated
        return 'available';
      } else if (this.status() == 'unavailable') {
        //seat has been already booked
        return 'unavailable';
      } else {
        return this.style();
      }
    }
  });

  //Make all available 'c' seats unavailable
  //sc.find('c.available').status('unavailable');

  //Make unavailable seats, unavailable...
  //sc.get(['1_1', '1_2', '1_3', '1_4']).status('unavailable');

  console.log('Seat 1_1 costs ' + sc.get('1_1').data().price + ' and is currently ' + sc.status('1_1'));
});
</script>
</body>
</html>
