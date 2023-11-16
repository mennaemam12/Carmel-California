<?php
session_start();
session_destroy();
header('Location: ' .$projectFolder. '/'); // Redirect to the home page
?>