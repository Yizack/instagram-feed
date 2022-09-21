<?php
namespace Yizack;

class Config {
    public $token;
    public $path;
    public $filename;

    function __construct($token, $path = "ig_token", $filename = "updated.json") {
        $this->token = $token; // long-lived-access-token
        $this->path = $path; // your path to save the token for auto update
        $this->filename = $filename; // your filename
    }

    function getToken() {
        return $this->token;
    }

    function getPath() {
        return $this->path;
    }

    function getFilename() {
        return $this->filename;
    }
}
?>
