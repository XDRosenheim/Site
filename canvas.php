<div id="map">
  <div id="hall">
    <div id="group">
      <?php
      # Fill this array via a database...
      # Or do it by hand, that's up to you.
      $isSeatStack = [6,  7,  8,  9,  10, 11, 12, 13, 14, 15, 56, 57, 59, 60, 62, 63, 65, 66, 68, 69, 74, 75, 77,
                      78, 80, 81, 83, 84, 86, 87, 92, 93, 95, 96, 98, 99, 101,102,104,105,110,111,113,
                      114,116,117,119,120,122,123,128,129,131,132,134,135,137,138,140,141,146,147,149,
                      150,152,153,155,156,158,159,164,165,167,168,170,171,173,174,176,177,182,183,185,
                      186,188,189,191,192,194,195,200,201,203,204,206,207,209,210,212,213,218,219,221,
                      222,224,225,227,228,230,231,272,273,275,276,278,279,281,282,284,285];
      $crewStack = [6,7,8,9,10,11,12,13,14,15];
      $seatTakenStack = [56,57,110,86];

      # Used for seat values
      $iteration = 0;

      # Room size
      $seatrows = 28; # x axis
      $seatcols = 18; # y axis

      for ($i=0; $i < $seatrows; $i++) {
        echo "<div id='col'>";
        for ($j=0; $j < $seatcols; $j++) {
          # empty | taken | online | playing | crew | vip
          # white | dgray |  blue  |  green  | yelo | orng
          if (in_array($iteration, $crewStack)) {
            $SEAT_STATUS = "crew"; # Not for sale.
          } elseif (in_array($iteration, $seatTakenStack)) {
            $SEAT_STATUS = "taken"; # Taken seat
          } elseif (in_array($iteration, $isSeatStack)) {
            $SEAT_STATUS = "empty"; # Open seat.
          } else {
            $SEAT_STATUS = "hidden"; # This is just a spacer... Nothing more...
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
