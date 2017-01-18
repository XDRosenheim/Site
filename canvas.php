<div id="map">
  <div id="hall">
    <div id="group">
      <?php
        for ($i=0; $i < 30; $i++) {
          echo "<div id='row'>";
          $iteration = 0;
          for ($j=0; $j < 23; $j++) {
            # empty | taken | online | playing | crew | vip
            if ($j == rand(0, 23)) {
              $SEAT_STATUS = "hidden";
            } elseif ($j == rand(0, 23) OR $j == rand(0, 23) OR $j == rand(0, 23) OR $j == rand(0, 23)) {
              $SEAT_STATUS = "playing";
            } elseif ($j == rand(0, 23) OR $j == rand(0, 23)) {
              $SEAT_STATUS = "online";
            } elseif ($j == rand(0, 23) OR $j == rand(0, 23)) {
              $SEAT_STATUS = "vip";
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
