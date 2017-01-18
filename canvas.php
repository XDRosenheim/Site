<div id="map">
    <div id="hall">
        <div id="group">
            <?php
                for ($i=0; $i < 5; $i++) {
                    # empty | taken | online | playing | crew | vip
                    $SEAT_STATUS = "empty";
                    echo '<div id="seat" class="' . $SEAT_STATUS . '"></div>';
                }
            ?>
        </div>
        <div id="group" class="seat-row">
            <?php
                for ($i=0; $i < 5; $i++) {
                    # empty | taken | online | playing | crew | vip
                    $SEAT_STATUS = "online";
                    echo '<div id="seat" class="' . $SEAT_STATUS . '"></div>';
                }
            ?>
        </div>
    </div>
</div>
