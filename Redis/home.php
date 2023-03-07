<?php
require 'vendor/autoload.php';

try {
  $redis = new Predis\Client();

  $key = "homepage1";
  $html = '';

  if ($redis->exists($key)) {
    // retrieve the home page from the cache

    echo $redis->ping();
    $html = $redis->get($key);
  } else {
    // generate the home page HTML
    $html = file_get_contents("page.html");
    // cache the home page HTML for 1 hour
    $redis->setex($key, 3600, $html);
  }
  $html = file_get_contents("page.html");

  // output the home page HTML
  echo $html;
} catch (Exception $e) {
  echo "Couldn't connected to Redis";
  echo $e->getMessage();
}



// connect to Redis
// $redis = new Predis\Client();
// $redis->set('foo', 'bar');
// $value = $redis->get('foo');

// set the cache key for the home page
// $key = 'home_page';

// // check if the home page is in the cache
