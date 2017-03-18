<?php

/*
 * CreateMap() creates an iframe using Google maps API
 *
 * $width: width of iframe
 * $height: height of iframe
 * $location: location marked on map; null by default
 *          format -> Space+Needle,Seattle+WA
 *                 -> Place of interest, city, state/county
 */

function CreateMap($width, $height, $location = null)
{
    echo '<iframe 
    width="' . $width . '"
    height="' . $height . '"
    frameborder="0" style="border:0"
    src="https://www.google.com/maps/embed/v1/place?key=' . $GLOBALS['GOOGLE_MAPS_EMBED_API_KEY']  .
    '&q=' . $location . '" allowfullscreen>
    </iframe>';
}

?>