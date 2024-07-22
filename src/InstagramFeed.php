<?php
namespace Yizack;

require_once "Config.php";

class InstagramFeed extends Config {
    protected const TOKEN_REFRESH_INTERVAL = 1; // 24 hours in seconds

    protected function fetch($path) {
        return json_decode(file_get_contents($path), true); 
    }

    protected function refreshToken() {
        $path = $this->getPath();
        $filename = $this->getFilename();
        $filePath = "$path/$filename";
        $date = date("Y-m-d H:i:s");
        $array = ["updated" => $date];

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if (!file_exists($filePath)) {
            file_put_contents($filePath, json_encode($array));
        }

        $updatedJson = $this->fetch($filePath);
        $updatedDate = $updatedJson["updated"] ?? $date;
        
        if (strtotime($date) - strtotime($updatedDate) > self::TOKEN_REFRESH_INTERVAL) {
            $this->fetch("https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=" . $this->getToken());
            file_put_contents($filePath, json_encode($array));
        }
    }

    function getFeed($fields = null) {
        $fields = $fields ?? 'username,permalink,timestamp,caption';
        $this->refreshToken();
        $feed = $this->fetch("https://graph.instagram.com/me/media?fields=" . $fields . "&access_token=" . $this->getToken());
        return $feed["data"] ?? [];
    }
}
?>
