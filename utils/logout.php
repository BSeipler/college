<?php 
session_start();

/* Unset the current session and redirect to the login */
session_unset();

header('Location: ../login/');