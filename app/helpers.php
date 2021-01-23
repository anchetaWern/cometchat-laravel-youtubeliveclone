<?php

function youtubeID($url) {
    $url_r = explode('/', $url);
    return array_pop($url_r);
}
