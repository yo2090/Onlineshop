<?php
session_start();

class Middleware {
    public static function isGuest() {
        if (!isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public static function isUser(): bool {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public static function isAdmin(): bool {
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
            return true;
        }
        return false;
    }
}