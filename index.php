<?php
  if (! isset($HTML_TITLE) OR $HTML_TITLE == "") {
    $HTML_TITLE = "Front page";
  }
  include 'functions.php';
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
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<?php
  if (! $DBConn->ping()) {
    printf ("Database Error: %s\n", $DBConn->error);
    exit();
  }
?>
<div style="float: left" id="map">
  <div id="seat-map"></div>
</div>
<div id="seat-map-legend"></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- jQuery-Seat-Charts -->
<script type="text/javascript" src="submodules/jQuery-Seat-Charts/jquery.seat-charts.js"></script>
<!-- Mini-version <script type="text/javascript" src="submodules/jQuery-Seat-Charts/jquery.seat-charts.min.js"></script> -->
<?php
  // TODO: UPDATE QUERY, GET ALL THE INFO.
  //$result = $DBConn->query("SELECT * FROM Seatmap ORDER BY SeatmapID DESC LIMIT 1");
  $result = $DBConn->query("SELECT * FROM Seatmap WHERE SeatmapID = 2");
  if ($result -> num_rows) {
    $row = $result->fetch_assoc();
    #echo print_r($row);
    //$seats = str_split($row['SeatString'], $row['Width']);
  }
?>
<script type="text/javascript">
$(document).ready(function() {
  var sc = $('#seat-map').seatCharts({
    map: [<?php seatmap_generation($row['SeatString'], $row['Width']) ?>],
    seats: {
      A: { classes: 'seatStyle_Arkade' },
      s: { classes: 'seatStyle_Stage' },
      c: { classes: 'seatStyle_Crew' },
      k: { classes: 'seatStyle_Kiosk' },
      n: { classes: 'seatStyle_Nothing' }
    },
    legend : {
      node  : $('#seat-map-legend'),
      items : [
        [ 'a', 'available', 'Fri plads' ],
        [ 'c', 'unavailable', 'Crew plads'],
        [ 's', 'unavailable', 'Scene / Storskærm'],
        [ 'A', 'unavailable', 'Arkade'],
        [ 'k', 'unavailable', 'Kiosk'],
        [ 'a', 'unavailable', 'Optaget' ]
      ]
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
  sc.find('A.available').status('unavailable');
  sc.find('c.available').status('unavailable');
  sc.find('s.available').status('unavailable');
  sc.find('n.available').status('unavailable');
  sc.find('k.available').status('unavailable');

  //Make unavailable seats, unavailable...
  <?php
    $query = "SELECT Tickets.SeatNumber FROM Tickets INNER JOIN TicketPrices ON Tickets.TicketPriceID = TicketPrices.TicketPriceID INNER JOIN Event ON TicketPrices.EventID = Event.EventID WHERE Event.EventID = 2";
    $result = $DBConn->query($query);
    if ($result -> num_rows) {
      #echo print_r($row);
      echo "sc.get([";
      while ($row = $result->fetch_assoc()) {
        echo "'" . $row['SeatNumber'] . "',";
      }
      echo "]).status('unavailable')";
    }
    unset($row, $query, $result);
  ?>
});
</script>
</body>
</html>
