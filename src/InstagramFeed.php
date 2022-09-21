<?php
namespace Yizack;

require_once "Config.php";

class InstagramFeed extends Config {

    protected function request($path) {
        return json_decode(file_get_contents($path), true); 
    }

    protected function refreshToken() {
        $path = $this->getPath();
        $filename = $this->getFilename();
        $date = date("Y-m-d H:i:s");
        $array = ["updated" => $date];

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            $fp = fopen("$path/$filename", "w");
            fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));
            fclose($fp);
        }
        
        $date_json = $this->request("$path/$filename")["updated"];

        if (strtotime($date) - strtotime($date_json) > 86400) {
            $this->request("https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=" . $this->getToken());
            $array = ["updated" => $date];
            $fp = fopen("$path/$filename", "w");
            fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));
            fclose($fp);
        }
        
    }

    function getFeed() {
        $this->refreshToken();
        return $this->request("https://graph.instagram.com/me/media?fields=username,permalink,timestamp,caption&access_token=" . $this->getToken())["data"];
    }
}
?>
