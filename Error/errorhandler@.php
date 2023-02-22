<?php
@$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
@$http_forwarded_for = $_SERVER['HTTP_FORWARDED_FOR'];
$remote_addr = $_SERVER['REMOTE_ADDR'];

if (!empty($http_client_ip)) {
  $ipaddress = $http_client_ip;
} else if (!empty($http_forwarded_for)) {
  $ipaddress = $http_forwarded_for;
} else if (!empty($remote_addr)) {
  $ipaddress = $remote_addr;
}

$ipdat = @json_decode(file_get_contents(
  "http://www.geoplugin.net/json.gp?ip=" . $ipaddress
));
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Ip Details</title>
  <style type="text/css">
    body {
      margin: 100%;
    }

    table,
    th,
    td {
      border-collapse: collapse;

      margin-top: 70px;
      font-size: 20px;

      padding: 10px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <div div="details">

    <table align="center">

      <th colspan="2">
        <h1>Your Details</h1>
      </th>
      <tr>
        <td>Ip Address</td>
        <td> <?php echo $ipaddress ?></td>
      </tr>
      <tr>
        <td>Country</td>
        <td><?php echo $ipdat->geoplugin_countryName ?></td>
      </tr>
      <tr>
        <td>Region</td>
        <td><?php echo $ipdat->geoplugin_city ?></td>
      </tr>
      <tr>
        <td>Currency Symbol</td>
        <td><?php echo $ipdat->geoplugin_currencySymbol ?></td>
      </tr>
      <tr>
        <td>Currency Code</td>
        <td><?php echo $ipdat->geoplugin_currencyCode ?></td>
      </tr>
      <tr>
        <td>Timezone</td>
        <td><?php echo $ipdat->geoplugin_timezone ?></td>
      </tr>
    </table>
  </div>
</body>

</html>