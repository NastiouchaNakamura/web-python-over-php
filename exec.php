<?php
$b64http = base64_encode(json_encode([
    "method" => $_SERVER['REQUEST_METHOD'],
    "target" => $_SERVER['REQUEST_URI'],
    "protocol" => $_SERVER['SERVER_PROTOCOL'],
    "headers" => getallheaders(),
    "body" => file_get_contents('php://input')
]));

if (shell_exec("which python")) {
    echo shell_exec("python 2>&1 server.py $b64http");
} elseif (shell_exec("which python3")) {
    echo shell_exec("python3 2>&1 server.py $b64http");
} else {
    throw new Error("Python 3 is not installed on this server");
    // Apache routes to error 500 html page, this message shows only when the server is not Apache (PHP built-in server)
}
exit();
