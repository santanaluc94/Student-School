<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

const USER_ALLOWED_ADMIN = [
    'root',
    'admin',
    'teacher_admin'
];

const USER_ALLOWED_TEACHERS = [
    'root',
    'teachers',
    'teacher_admin'
];

function hasAdminPermissions(string $userType): bool
{
    if (in_array($userType, USER_ALLOWED_ADMIN)) {
        return true;
    }

    return false;
}

function hasTeacherPermissions(string $userType): bool
{
    if (in_array($userType, USER_ALLOWED_TEACHERS)) {
        return true;
    }

    return false;
}
