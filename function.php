<?php
include 'database.php';

setlocale(LC_ALL, 'IND');
setlocale(LC_TIME, 'id_ID');

date_default_timezone_set('Asia/Pontianak');

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function get_youtube_title($ref)
{
  $json = file_get_contents('http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json'); //get JSON video details
  $details = json_decode($json, true); //parse the JSON into an array
  return $details['title']; //return the video title
}
