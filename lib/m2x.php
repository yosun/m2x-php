<?php

require_once 'm2x'.DIRECTORY_SEPARATOR.'response.php';
require_once 'm2x'.DIRECTORY_SEPARATOR.'curl_exception.php';
require_once 'm2x'.DIRECTORY_SEPARATOR.'curl_request.php';
require_once 'm2x'.DIRECTORY_SEPARATOR.'feeds.php';

class M2X {
  const VERSION = "0.0.1";
  const ENDPOINT = "http://api-m2x.att.com/v1";

  private $api_key = '';
  private $endpoint = '';

  public function __construct($api_key, $endpoint = self::ENDPOINT) {
    $this->api_key = $api_key;
    $this->endpoint = $endpoint;
  }

  public function change_endpoint($endpoint) {
    $this->endpoint = $endpoint;
  }

  public function feeds() {
    return new Feeds($this->endpoint, $this->api_key);
  }
} 
