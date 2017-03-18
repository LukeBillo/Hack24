<?php
include("../config.php");

function GoBack(){
  if(isset($_GET['calendarId'])){
    header('Location: ' . $GLOBALS['DOMAIN'] . '/calendars/show.php?calendarId=' . $_GET['calendarId']);
  } else {
    header('Location: ' . $GLOBALS['DOMAIN'] . '/profiles/');
  }
  die;
}

if(!isset($_GET['eventUid'])){
  GoBack();
}

$calendars = $cronofy->list_calendars()["calendars"];

for($i = 0; $i < count($calendars); $i++){
  if($calendars[$i]["calendar_id"] == $_GET['calendarId']){
    $calendar = $calendars[$i];
  }
}

if(!isset($calendar)){
  GoBack();
}

$events = $cronofy->read_events(array("tzid" => "Etc/UTC", "include_managed" => true, "calendar_ids" => array($calendar["calendar_id"])));

foreach($events->each() as $e){
  if($e["event_uid"] == $_GET['eventUid']){
    $event = $e;
  }
}

if(!isset($event)){
  GoBack();
}

include("../header.php");

echo '<div class="row">
  <div class="col-xs-8">
    <h2><?= $calendar["calendar_name"] ?> - <?= $event["summary"] ?></h2>
  </div>
  <? if(isset($event["event_id"])){ ?>
    <div class="col-xs-4 text-right">
      <a href="/events/edit.php?calendarId=' . $calendar["calendar_id"] . '&eventUid=' . $event["event_uid"] . '" class="btn btn-primary">
        Edit
      </a>
      <form action="/events/delete.php" method="post" class="button_to">
        <input type="hidden" name="event[event_id]" value="' . $event["event_id"] .'" />
        <input type="hidden" name="event[calendar_id]" value="' . $event["calendar_id"] . '" />
        <input type="submit" value="Delete" class="btn btn-danger" />
      </form>
    </div>
</div>';

echo '<dl class="dl-horizontal">';
  if(isset($event["event_id"])) {
    echo '<dt>Event ID</dt>
    <dd>' . $event["event_id"] . '</dd>

  <dt>Event UID</dt>
  <dd>' . $event["event_uid"] . '</dd>

  <dt>Summary</dt>
  <dd>' . $event["summary"] . '</dd>

  <dt>Created</dt>
  <dd>' . $event["created"] . '</dd>

  <dt>Description</dt>
  <dd>' . $event["description"] . '</dd>

  <dt>Start Date</dt>
  <dd>' . $event["start"] . '</dd>

  <dt>End Date</dt>
  <dd>' . $event["end"] . '</dd>';

    if (isset($event["location"]["description"])) {
      echo '<dt>Location</dt>
  <dd>' . $event["location"]["description"] . '</dd>';
    }

    if (isset($event["location"]["lat"]) && isset($event["location"]["long"]))
      if (isset($GLOBALS["GOOGLE_MAPS_EMBED_API_KEY"])) {
        echo '<dt>Map location</dt>
    <dd>
      <iframe
      width="600"
      height="450"
      frameborder="0" style="border:0"
      src="https://www.google.com/maps/embed/v1/place?key=' . $GLOBALS["GOOGLE_MAPS_EMBED_API_KEY"] .
            '&q=' . $event["location"]["lat"] . ',' . $event["location"]["long"] . 'allowfullscreen>
    </iframe>
    </dl>';
      } else {
        echo '<dt>Latitude, Longitude</dt>
    <dd>' . $event["location"]["lat"] . ',' . $event["location"]["long"] . '</dd>';
      }
    echo '</dd>';
  }

echo '</dl>';

include("../footer.php"); ?>
