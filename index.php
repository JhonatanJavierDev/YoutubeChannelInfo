<?php
require_once 'vendor/autoload.php';

// Replace with your API key and channel ID
$apiKey = 'YOUR_API_KEY_HERE';
$channelId = 'YOUR_CHANNEL_ID_HERE';

// Create a Google API client
$client = new Google_Client();
$client->setDeveloperKey($apiKey);

// Create a YouTube service object
$youtube = new Google_Service_YouTube($client);

// Retrieve channel information
$channelResponse = $youtube->channels->listChannels('snippet,statistics', array('id' => $channelId));

// Extract channel data
$channel = $channelResponse['items'][0];
$snippet = $channel['snippet'];
$statistics = $channel['statistics'];

// Extract snippet information
$channelTitle = $snippet['title'];
$channelDescription = $snippet['description'];
$channelPublishedAt = $snippet['publishedAt'];

// Extract statistics
$subscriberCount = $statistics['subscriberCount'];
$viewCount = $statistics['viewCount'];
$videoCount = $statistics['videoCount'];

// Display channel information
echo 'Channel Name: ' . $channelTitle . '<br>';
echo 'Description: ' . $channelDescription . '<br>';
echo 'Creation Date: ' . $channelPublishedAt . '<br>';
echo 'Subscribers: ' . $subscriberCount . '<br>';
echo 'Total Views: ' . $viewCount . '<br>';
echo 'Total Videos: ' . $videoCount . '<br>';
?>
