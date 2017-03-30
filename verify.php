<?php
$access_token = 'FNa3VPoZVkcHeEOvrLUU5f+mlLXfcOR1TahFxN7KA1oYPiesjIjDmeYsOGvS0OJjkkFIi/gCgp+Q0iJ+L7cA9L884JLpeynm/PqwDOUC9EavTEHRX3oaYyXd1AtBelObWHeR6G1iJW/w+y3fKo9erAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
