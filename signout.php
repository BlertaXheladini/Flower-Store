<?php

class SessionManager {
    public function __construct() {
        session_start();
    }

    public function destroySessionAndRedirect($redirectLocation) {
        session_destroy();
        header("Location: $redirectLocation");
        exit();
    }
}

$sessionManager = new SessionManager();
$sessionManager->destroySessionAndRedirect('home.php');

?>
