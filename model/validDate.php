<?php
function validUsername($username)
{
    $sql = "SELECT * FROM users WHERE username = '$username'";
    return getOne($sql);
}
function validEmail($email)
{
    $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email) ? true : false;
}
function validPhoneNumber($phoneNumber)
{
    $pattern = '/^[0-9]{10}$/';
    return preg_match($pattern, $phoneNumber) ? true : false;
}
