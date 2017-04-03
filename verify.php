<?php


$access_token = 'FNa3VPoZVkcHeEOvrLUU5f+mlLXfcOR1TahFxN7KA1oYPiesjIjDmeYsOGvS0OJjkkFIi/gCgp+Q0iJ+L7cA9L884JLpeynm/PqwDOUC9EavTEHRX3oaYyXd1AtBelObWHeR6G1iJW/w+y3fKo9erAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);
echo $headers;
// curl คือฟังก์ชันที่ถูกใส่เข้ามาใน php ตั้งแต่ PHP 4.0.2. 
// เป็นฟังก์ชันสำหรับใช้ในการติดต่อสื่อสารกับ server โดยสามารถติดต่อได้หลากหลาย protocal เช่น http, https, ftp เป็นต้น

// ต.p.
// $curlResource = curl_init();
// curl_setopt($curlResource, CURLOPT_URL, "http://www.example.com/");
// curl_exec($curlResource);
// curl_close($curlResource);

$ch = curl_init($url);    //  สร้าง curl resource ด้วยฟังก์ชัน curl_init()
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //  set option ให้ curl resource ด้วยฟังก์ชัน curl_setopt()
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);    //  set option ให้ curl resource ด้วยฟังก์ชัน curl_setopt()
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);       //  set option ให้ curl resource ด้วยฟังก์ชัน curl_setopt()
$result = curl_exec($ch);   // Execute curl resource ด้วยฟังก์ชัน curl_exec()
curl_close($ch);  // close curl resource ด้วยฟังก์ชัน curl_close()

echo $result;
