<?PHP
  function sendMessage(){
	  
	  $headings = array (
	  'zh-Hant' => 'zh-Hant 公告',
	  'en' => 'en 公告'
	  );
	  
    $content = array(
	  'zh-Hant' => '從 OneSignal.php 傳來的訊息',
	  'en' => '從 OneSignal.php 傳來的訊息'
      );
    
    $fields = array(
      'app_id' => "336c85f4-a6c1-4e1c-943e-cc9bb7441215",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'contents' => $content,
	  'headings' => $headings,
	  'small_icon' => 'http://p.eagate.573.jp/game/kac5th/img/game/jubeat_icon.png',
	  'large_icon' => 'http://p.eagate.573.jp/game/kac5th/img/game/jubeat_icon.png',
	  'big_picture' => 'http://p.eagate.573.jp/game/kac5th/img/game/jubeat_pc.jpg'
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                           'Authorization: Basic NzNhMzI0ZTgtNzI5OS00MDY0LTkxZmMtZTJhOWI3NzgzZmU5'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
  }
  
  $response = sendMessage();
  $return["allresponses"] = $response;
  $return = json_encode( $return);
  
  print("\n\nJSON received:\n");
  print($return);
  print("\n");
?>