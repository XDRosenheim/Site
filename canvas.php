<div id="map">
  <div id="hall">
    <div id="group">
      <?php
        $haystack = [5,6,7,8,9,10];
        $iteration = 0;
        $seatrows = 28;
        $seatcols = 18;
        for ($i=0; $i < $seatrows; $i++) {
          echo "<div id='col'>";
          for ($j=0; $j < $seatcols; $j++) {
            # empty | taken | online | playing | crew | vip
            # lgray | dgray |  blue  |  green  | yelo | orng
            if ($j == 0 OR $j == 1 OR $j == $seatcols - 1 OR $j == $seatcols - 2) {
              $SEAT_STATUS = "hidden";
            } elseif (in_array($iteration, $haystack)) {
              $SEAT_STATUS = "crew";
            } else {
              $SEAT_STATUS = "empty";
            }
            echo '<div id="seat" class="' . $SEAT_STATUS . '" value="' . $iteration . '"></div>';
            $iteration += 1;
          }
          echo "</div>";
        }
      ?>
    </div>
  </div>
</div>
