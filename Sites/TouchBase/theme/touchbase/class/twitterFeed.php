<?php

class twitterFeed {
    function get_twitter_feed($userId, $count) {
        $oauth_access_token         = "1128615379-YhUfD4w4UaTLYkAUuVGlUpPT0AcNW2SHmc22I9p";
        $oauth_access_token_secret  = "ylUCJfjjEXw6GqZlwLYKfDikyRbaEKfCEnR2Ra5fwYRiw";
        $consumer_key               = "HkYAhmJalNEPj7Cq6Lnxb6K9o";
        $consumer_secret            = "MEWTuGMYkqrcXtCgxh3MlR7IeA25sV8d68bIMXkh924iVs3lyp";

        $twitter_timeline           = "user_timeline";  //  mentions_timeline / user_timeline / home_timeline / retweets_of_me

        //  create request
            $request = array(
                'screen_name'       => $userId,
                'count'             => $count
            );

        $oauth = array(
            'oauth_consumer_key'        => $consumer_key,
            'oauth_nonce'               => time(),
            'oauth_signature_method'    => 'HMAC-SHA1',
            'oauth_token'               => $oauth_access_token,
            'oauth_timestamp'           => time(),
            'oauth_version'             => '1.0'
        );

    //  merge request and oauth to one array
        $oauth = array_merge($oauth, $request);

    //  do some magic
        $base_info              = buildBaseString("https://api.twitter.com/1.1/statuses/$twitter_timeline.json", 'GET', $oauth);
        $composite_key          = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature']   = $oauth_signature;

    //  make request
        $header = array(buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
                          CURLOPT_HEADER => false,
                          CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?". http_build_query($request),
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);

        $feed_text = json_decode($json, true);
        display_feed($feed_text);
    }
}

function display_feed($feed_text) {
    $time = strtotime($feed_text[0]["created_at"]);
    echo format_links($feed_text[0]["text"]) . "<br /><br /><br />";

    echo "Posted: " . date(__('gA l jS'), $time);
    echo "<br />FOLLOW <a href='https://twitter.com/TouchbaseUK' target='_blank' >TOUCHBASE</a> ON TWITTER";
}

function format_links ($text) {
    $formatted_text = preg_replace('/(\b(www\.|http\:\/\/)\S+\b)/', "<a target='_blank' href='$1'>$1</a>", $text);
    $formatted_text = preg_replace('/\#(\w+)/', "<a target='_blank' href='https://twitter.com/hashtag/$1?src?hash'>#$1</a>", $formatted_text);
    $formatted_text = preg_replace('/\@(\w+)/', "<a target='_blank' href='https://twitter.com/$1'>@$1</a>", $formatted_text);
    return $formatted_text;
}

function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}

function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
}


?>