<?php
include_once './Route/Request.php';
include_once './Route/Router.php';
$route = new Router(new Request);

$route->get('/', function () {
  return "<h1> hallo world </h1>";
});


$route->get('/profile', function ($request) {
  echo "<pre>";
  print_r($request);
  header('Content-Type: text/html');
  return "<h1> hallo world </h1>";
});

$route->post('/data', function ($request) {
  return json_encode($request->getBody());
});
