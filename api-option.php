<?php
/*
$apiData = array(
    'api_username' => 'test', 'api_password' => 'test1', 'firstname' => 'Leonid', 'lastname' => 'Levin', 'phone' => '123-123-123'
, 'email' => 'test@email.com', 'userip' => '120.120.120', 'country' => 'RU', 'language' => 'IT', 'pid' => 'pid', 'cid' => 'cid'
, 'zid' => 'zid', 'mid' => 'mid', 'referrer' => 'testref', 'custom' => 'testcustom');


*/

$apiData = array(
    'api_username' => 'test',
    'api_password' => 'test1',
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'phone' => '123-123-123',
    'email' => $_POST['email'],
    'userip' => '120.120.120',
    'country' => 'RU',
    'language' => 'IT',
    'pid' => 'pid',
    'cid' => 'cid',
    'zid' => 'zid',
    'mid' => 'mid',
    'referrer' => 'testref',
    'custom' => 'testcustom');

$URL = 'https://smartadserv.com/script/createlead.php';
$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($apiData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch); // run the whole process
echo $result;
curl_close($ch);





?>