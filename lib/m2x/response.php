<?php

class Response {

/**
 * The response headers
 *
 * @var array
 */
  private $header = array();

/**
 * The raw output
 *
 * @var string
 */
  private $output = "";

/**
 * Create a new Response instance
 *
 * @param array $header
 * @param string $output
 */
  public function __construct($header, $output) {
    $this->header = $header;
    $this->output = $output;
  }

/**
 * Returns the HTTP code
 *
 * @return integer
 */
  public function code() {
    return $this->header['http_code'];
  }

/**
 * Returns the HTTP header information
 *
 * @return array
 */
  public function headers() {
    return $this->header;
  }

/**
 * Returns the raw body data
 *
 * @return string
 */
  public function raw() {
    return $this->output;
  }

/**
 * Returns the body data as a json decoded object
 *
 * @return mixed
 */
  public function json() {
    return json_decode($this->output);
  }
}
