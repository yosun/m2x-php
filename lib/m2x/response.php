<?php

class Response {
  private $header = array();
  private $output = "";

  public function __construct($header, $output) {
    $this->header = $header;
    $this->output = $output;
  }

  public function code() {
    return $this->header['http_code'];
  }

  public function headers() {
    return $this->header;
  }

  public function raw() {
    return $this->output;
  }

  public function json() {
    return json_decode($this->output);
  }
}
