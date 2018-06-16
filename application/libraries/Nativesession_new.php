<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nativesession_new {

    public function __construct() {
        session_start();
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function sessionIsset($key) {
        if (isset($_SESSION[$key])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function regenerateId($delOld = false) {
        session_regenerate_id($delOld);
    }

    public function delete($key) {
        unset($_SESSION[$key]);
    }

}
