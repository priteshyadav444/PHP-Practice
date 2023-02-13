<?PHP
// $data = serialize(1);
// var_dump($data);
// var_dump(unserialize($data));

$jdata = json_encode(array("name" => "Pritesh"));
// $jdata = json_encode($jdata);
var_dump($jdata);
$jdata = serialize($jdata);
var_dump($jdata);
var_dump(unserialize($jdata));
