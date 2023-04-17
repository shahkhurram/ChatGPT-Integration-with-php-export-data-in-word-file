<?php
$message=$_POST['message'];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$postdata=array(
  
  "model"=> "text-davinci-001",
  "prompt"=> "$message",
  "temperature"=> 0.4,
  "max_tokens"=> 1400,
  "top_p"=> 1,
  "frequency_penalty"=> 0,
  "presence_penalty"=> 0

);
$postdata=json_encode($postdata);

curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer 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';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
  echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$result=json_decode($result,true);
echo $result['choices'][0]['text'];
$apidata=$result['choices'][0]['text'];

?>

