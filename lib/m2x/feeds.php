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
 * Returns all feeds
 *
 * @return Response
 */
  public function all() {
    return $this->get(self::RESOURCE_BASE); 
  }

/**
 * View the feed details
 *
 * @param $id feed id
 * @return Response
 */
  public function view($id) {
    return $this->get(self::RESOURCE_BASE . "/$id"); 
  }

/**
 * Retrieve list of HTTP requests received lately by the specified feed (up to 100 entries)
 *
 * @param $id $id feed id
 * @return Response
 */
  public function log($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/log"); 
  }

/**
 * Get location details of the datasource associated with a specific feed.
 *
 * @param $id feed id
 * @return Response
 */
  public function location($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/location");
  }

/**
 * Update the current location of the datasource associated with the specified feed
 *
 * @param $id feed id
 * @return Response
 */
  public function update_location($id, $params = array()) {
    return $this->put(self::RESOURCE_BASE . "/$id/location", $params);
  }

/**
 * Retrieve list of data streams associated with the specified feed.
 *
 * @param $id feed id
 * @return Response
 */
  public function streams($id) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams");
  }

/**
 * Get details of a specific data stream associated with an existing feed.
 *
 * @param $id feed id
 * @return Response
 */
  public function stream($id, $name) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams/$name");
  }

/**
 * List values from an existing data stream associated with a specific feed.
 *
 * @param $id feed id
 * @return Response
 */
  public function stream_values($id, $name) {
    return $this->get(self::RESOURCE_BASE . "/$id/streams/$name/values");
  }

/**
 * Post values to an existing data stream associated with a specific feed.
 *
 * @param $id feed id
 * @param $name
 * @param array $values
 * @return Response
 */
  public function add_stream_values($id, $name, $values) {
    return $this->post(self::RESOURCE_BASE . "/$id/streams/$name/values", array("values" => $values));
  }

/**
 * Update an existing data stream associated with the specified feed.
 * 
 * @param $id feed id
 * @param $name
 * @param $params
 * @return Response
 */
  public function update_stream($id, $name, $params) {
    return $this->put(self::RESOURCE_BASE . "/$id/streams/$name", $params);
  }
}
