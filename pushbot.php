<?php
$access_token = 'FNa3VPoZVkcHeEOvrLUU5f+mlLXfcOR1TahFxN7KA1oYPiesjIjDmeYsOGvS0OJjkkFIi/gCgp+Q0iJ+L7cA9L884JLpeynm/PqwDOUC9EavTEHRX3oaYyXd1AtBelObWHeR6G1iJW/w+y3fKo9erAdB04t89/1O/w1cDnyilFU=';

// Get POST body content 
$content = file_get_contents('php://input');    // อ่านไฟล์ออกมาเป็น string ด้วยฟังก์ชัน file_get_contents()
// Parse JSON
$events = json_decode($content, true);	// แปลงข้อมูลรูปแบบ row data ให้อยู่ในรูปแบบ array ของ php
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') { //  && $event['source']['userId'] == 'kikuanone.aor'
			// Get text sent
			$text = "";
			if($event['message']['text'] == 'กินข้าวยัง') {
				$text = "ยังไไม่ได้กิน";
			}
			
			// $text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/push';
			//$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' = 'kikuanone.aor',
				'messages' => [$messages],
			];
			$post = json_encode($data);    // แปลงค่าที่เราส่งให้ (argument) ให้ออกมาเป็น json
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			echo "aa";
			echo $post;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			
			echo $result . "\r\n";
		}
	}
}
echo "OK";
