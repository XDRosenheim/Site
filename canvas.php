<div id="map">
    <div id="hall">
        <div id="group" class="group-row">
            <?php
                for ($i=0; $i < 5; $i++) {
                    # empty | taken | online | playing | crew | vip
                    $SEAT_STATUS = "playing";
                    echo '<div id="seat" class="' . $SEAT_STATUS . '"></div>';
                }
            ?>
        </div>
        <div id="group" class="group-row">
            <?php
                for ($i=0; $i < 10; $i++) {
                    # empty | taken | online | playing | crew | vip
                    $SEAT_STATUS = "playing";
                    echo '<div id="seat" class="' . $SEAT_STATUS . '"></div>';
                }

            ?>
        </div>
    </div>
</div>
