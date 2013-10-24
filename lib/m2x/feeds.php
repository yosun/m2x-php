<?php

class Feeds extends CurlRequest {

  const RESOURCE_BASE = "/feeds";
  
  public function __construct($endpoint, $api_key) {
    parent::__construct($endpoint, $api_key);
  }
  
  public function all() {
    return $this->get(self::RESOURCE_BASE); 
  }

  public function view($id) {
    return $this->get(self::RESOURCE_BASE . "/$id"); 
  }

  public function log($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/log"); 
  }

  public function location($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/location");
  }

  public function update_location($id, $params = array()) {
    return $this->put(self::RESOURCE_BASE . "/$id/location", $params);
  }

  public function streams($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams");
  }

  public function stream($id, $name) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams/$name");
  }

  public function stream_values($id, $name) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams/$name/values");
  }

  public function add_stream_values($id, $name, $values) {
    return $this->post(self::RESOURCE_BASE . "/$id/streams/$name/values", array("values" => $values));
  }

  public function update_stream($id, $name, $params) {
    return $this->put(self::RESOURCE_BASE . "/$id/streams/$name", $params);
  }
}
