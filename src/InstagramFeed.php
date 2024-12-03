<?php
namespace Yizack;

require_once "Config.php";

class InstagramFeed extends Config {
    private const BASE_URL = "https://graph.instagram.com";
    private const TOKEN_REFRESH_INTERVAL = 86400; // 24 hours in seconds

    private function fetch($path) {
        return json_decode(file_get_contents(self::BASE_URL . $path), true); 
    }

    private function refreshToken() {
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
            $refresh = $this->fetch("/refresh_access_token?grant_type=ig_refresh_token&access_token=" . $this->getToken());
            if (!$refresh) {
                error_log("Warning: Failed to refresh token, please check your configuration or generate a new token.");
            }
            file_put_contents($filePath, json_encode($array));
        }
    }

    /**
     * Get Instagram feed
     * 
     * For a list of all available fields see: https://developers.facebook.com/docs/instagram-basic-display-api/reference/media#fields
     * 
     * @param string|null $fields Comma-separated list of fields to retrieve. Defaults to 'username,permalink,timestamp,caption'.
     * @return array The Instagram feed data.
     */
    public function getFeed($fields = null) {
        $fields = $fields ?? 'username,permalink,timestamp,caption';
        $this->refreshToken();
        $feed = $this->fetch("/me/media?fields=" . $fields . "&access_token=" . $this->getToken());
        return $feed["data"] ?? [];
    }
}
?>
