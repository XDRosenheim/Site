<div id="map">
  <div id="hall">
    <div id="group">
      <?php

        $isSeatStack = [7,8,9,10,11,12,13,56,57,59,60,62,63,65,66,68,69,74,75,77,78,80,81,83,84,86,87];
        $crewStack = [7,8,9,10,11,12,13];
        $seatTakenStack = [];

        $iteration = 0;

        # Room size
        $seatrows = 28; # x axis
        $seatcols = 18; # y axis

        for ($i=0; $i < $seatrows; $i++) {
          echo "<div id='col'>";
          for ($j=0; $j < $seatcols; $j++) {
            # empty | taken | online | playing | crew | vip
            # lgray | dgray |  blue  |  green  | yelo | orng
            if (in_array($iteration, $crewStack)) {
              $SEAT_STATUS = "crew";
            } elseif (in_array($iteration, $seatTakenStack)) {
              $SEAT_STATUS = "taken";
            } elseif (in_array($iteration, $isSeatStack)) {
              $SEAT_STATUS = "empty";
            } else {
              $SEAT_STATUS = "hidden";
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
