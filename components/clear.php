<?php
$requiredSessionVar = array('username','error');
foreach($_SESSION as $key => $value) {
    if(!in_array($key, $requiredSessionVar)) {
        unset($_SESSION[$key]);
    }
}
