<div id="map">
    <div id="hall">
        <div id="group" class="seat-hidden">
            <?php
                for ($i=0; $i < 23; $i++) {
                    # empty | taken | online | playing | crew | vip
                    $SEAT_STATUS = "online";
                    echo '<div id="seat" class="' . $SEAT_STATUS . '"></div>';
                }
            ?>
        </div>
    </div>
</div>
