<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if (!is_resource($socket)) {
    print("Failed to create socket");
}
if (!socket_bind($socket, "0.0.0.0", 9000)) {
    print("Failed to bind to 0.0.0.0:9000");
}
socket_listen($socket, 5);
$conn = socket_accept($socket);
