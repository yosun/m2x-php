<?php

class CurlRequest {
  const VERSION = "0.0.1";
  private $endpoint = "";
  private $key = "";

  private $request;
  private $headers = array();

  public function __construct($endpoint, $key) {
    $this->endpoint = $endpoint;
    $this->key = $key;

    $this->headers["X-M2X-KEY"] = $key;
    $this->headers["Content-Type"] = "application/json";
  }

  public function head($url, $vars = array()) {
    return $this->request('head', $url, $vars);
  }

  public function options($url, $vars = array()) {
    return $this->request('options', $url, $vars);
  }

  public function get($url, $vars = array()) {
    return $this->request('get', $url, $vars);
  }

  public function post($url, $vars = array()) {
    return $this->request('post', $url, $vars);
  }

  public function put($url, $vars = array()) {
    return $this->request('put', $url, $vars);
  }

  public function delete($url, $vars = array()) {
    return $this->request('delete', $url, $vars);
  }

  public function request($method, $url, $vars = array()) {
    $this->request = curl_init();

    // set url and agent
    curl_setopt($this->request, CURLOPT_URL, $this->endpoint . $url); 
    curl_setopt($this->request, CURLOPT_USERAGENT, "M2X/" . self::VERSION . " (PHP curl)");
    //return the transfer as a string
    curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->request, CURLOPT_SSL_VERIFYPEER , false);
    // set curl timeout
    curl_setopt($this->request, CURLOPT_TIMEOUT, 60); 

    // retrieve headers
    curl_setopt($this->request, CURLOPT_HEADER, true);
    curl_setopt($this->request, CURLINFO_HEADER_OUT, true);

    $this->set_request_method($method);
    $this->set_request_headers();

    if(in_array($method, array("post", "delete", "put"))) {
      curl_setopt($this->request, CURLOPT_POSTFIELDS, json_encode($vars));
    }
    
    // make call
    $result = curl_exec($this->request);
    $headers = curl_getinfo($this->request);
    $curl_error = curl_error($this->request);

    // close curl resource to free up system resources 
    curl_close($this->request);

    $output = substr($result, $headers['header_size']);

    // catch errors
    if(!empty($curl_error)) { 
      throw new CurlException("CURL ERROR: $curl_error, Output: $output", $headers['http_code'], null, $headers);
    }

    return new Response($headers, $output);
  }

  private function set_request_method($method) {
    switch (strtoupper($method)) {
    case 'HEAD':
      curl_setopt($this->request, CURLOPT_NOBODY, true);
      break;
    case 'GET':
      curl_setopt($this->request, CURLOPT_HTTPGET, true);
      break;
    case 'POST':
      curl_setopt($this->request, CURLOPT_POST, true);
      break;
    default:
      curl_setopt($this->request, CURLOPT_CUSTOMREQUEST, $method);
    }
  }

  protected function set_request_headers() {
    $headers = array();
    foreach ($this->headers as $key => $value) {
      $headers[] = $key.': '.$value;
    }
    curl_setopt($this->request, CURLOPT_HTTPHEADER, $headers);
  }
}
