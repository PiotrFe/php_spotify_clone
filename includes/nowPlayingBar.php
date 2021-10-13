<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
$resultArray = array();

while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row["id"]);
}

$jsonArray = json_encode($resultArray);

?>

<script>
    $(document).ready(function() {
        currentPlayList = <?php echo $jsonArray ?>;
        audioElement = new Audio();
        setTrack(currentPlayList[0], currentPlayList, false);
    });

    function setTrack(trackId, newPlaylist, play) {
        if (play) {
            audioElement.play();
        }

    }
</script>

<div id="nowPlayingBar">
    <div id="nowPlayingLeft">
        <div class="content">
            <span class="albumLink">
                <img class="albumArtwork" src="https://imagebee.org/patterns/square/square-4-3000x3000.jpg" alt="">
            </span>
            <div class="trackInfo">
                <span class="trackName">
                    <span>Happy Birthday</span>
                </span>
                <span class="artistName">
                    <span>Piotr</span>
                </span>
            </div>
        </div>
    </div>
    <div id="nowPlayingCenter">
        <div class="content playerControls">
            <div class="buttons">
                <button class="controlButton shuffle" title="Shuffle">
                    <img src="./assets//images//icons/shuffle.png" alt="Shuffle">
                </button>
                <button class="controlButton previous" title="Previous">
                    <img src="./assets//images//icons/first.png" alt="Previous">
                </button>
                <button class="controlButton play" title="Play">
                    <img src="./assets//images//icons/play.png" alt="Play">
                </button>
                <button class="controlButton pause" title="Pause" style="display: none">
                    <img src="./assets//images//icons/pause.png" alt="Pause">
                </button>
                <button class="controlButton next" title="Next">
                    <img src="./assets//images//icons/last.png" alt="Next">
                </button>
                <button class="controlButton repeat" title="Repeat">
                    <img src="./assets//images//icons/repeat.png" alt="Repeat">
                </button>

            </div>

            <div class="playbackBar">
                <span class="progressTime current">0.00</span>
                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
                <span class="progressTime remaining">0.00</span>
            </div>
        </div>
    </div>
    <div id="nowPlayingRight">
        <div class="volumeBar">
            <button class="controlButton volume" title="Volume">
                <img src="./assets//images//icons/volume.png" alt="volume">
            </button>
            <div class="progressBar">
                <div class="progressBarBg">
                    <div class="progress"></div>
                </div>
            </div>
        </div>
    </div>
</div>