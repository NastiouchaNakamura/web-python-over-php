<?php
print_r($_SERVER);

if (shell_exec("which python")) {
    echo shell_exec("python server.py");
} elseif (shell_exec("which python3")) {
    echo shell_exec("python3 server.py");
} else {
    throw new Error("Python 3 is not installed on this server");
    // Apache routes to error 500 html page, this message shows only when the server is not Apache (PHP built-in server)
}
exit();
