<?php

class Feeds extends CurlRequest {

/**
 * The base path to the resource, this will be appeneded
 * to the api endpoint.
 *
 * @var string
 */
  const RESOURCE_BASE = "/feeds";

  public function __construct($endpoint, $api_key) {
    parent::__construct($endpoint, $api_key);
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function all() {
    return $this->get(self::RESOURCE_BASE); 
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function view($id) {
    return $this->get(self::RESOURCE_BASE . "/$id"); 
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function log($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/log"); 
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function location($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/location");
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function update_location($id, $params = array()) {
    return $this->put(self::RESOURCE_BASE . "/$id/location", $params);
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function streams($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams");
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function stream($id, $name) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams/$name");
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function stream_values($id, $name) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams/$name/values");
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function add_stream_values($id, $name, $values) {
    return $this->post(self::RESOURCE_BASE . "/$id/streams/$name/values", array("values" => $values));
  }

/**
 * TODO: Write the description
 *
 * @return Response
 */
  public function update_stream($id, $name, $params) {
    return $this->put(self::RESOURCE_BASE . "/$id/streams/$name", $params);
  }
}
