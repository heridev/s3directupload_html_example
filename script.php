<?php
// retrieved example from:
// http://www.designedbyaturtle.co.uk/2013/direct-upload-to-s3-with-a-little-help-from-jquery/

// Fill These In!
$bucket = "";
$accesskey = "";
$secret = "";

$policy = json_encode(array(
  'expiration' => date('Y-m-d\TG:i:s\Z', strtotime('+6 hours')),
  'conditions' => array(
    array(
      'bucket' => $bucket
    ),
    array(
      'acl' => 'public-read'
    ),
    array(
      'starts-with',
      '$key',
      ''
    ),
    array(
      'success_action_status' => '201'
    )
  )
));
$base64Policy = base64_encode($policy);
$signature = base64_encode(hash_hmac("sha1", $base64Policy, $secret, $raw_output = true));
?>
