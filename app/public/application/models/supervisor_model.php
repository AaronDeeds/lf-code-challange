<?php

if(!defined('BASEPATH')) {
    http_response_code(404) && die();
}

class Supervisor_model extends CI_Model
{

  public function download_supervisors()
  {
    $url = "https://o3m5qixdng.execute-api.us-east-1.amazonaws.com/api/managers";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    return $result;
  }

  public function sort_supervisors($supervisors_array)
  {
    $jurisdiction_keys = array_column($supervisors_array, 'jurisdiction');
    $lastname_keys = array_column($supervisors_array, 'lastName');
    $firstname_keys = array_column($supervisors_array, 'firstName');

    array_multisort($jurisdiction_keys, SORT_ASC, $lastname_keys, SORT_ASC, $firstname_keys, SORT_ASC, $supervisors_array);

    return $supervisors_array;
  }

  public function filter_supervisors($supervisors_array)
  {
    foreach ($supervisors_array as $key => $supervisor) {
      if(is_numeric($supervisor->jurisdiction)) {
          unset($supervisors_array[$key]);
      }
    }
    return $supervisors_array;
  }

  public function create_json($supervisors_array)
  {
    $return_array = array();
    foreach ($supervisors_array as $key => $supervisor) {
      $return_array[] = "{$supervisor->jurisdiction} - {$supervisor->lastName}, {$supervisor->firstName}";
    }
    return json_encode($return_array);

  }

  public function get_supervisors()
  {
    $supervisors = $this->download_supervisors();
    $supervisors = json_decode($supervisors);
    $supervisors = $this->filter_supervisors($supervisors);
    $supervisors = $this->sort_supervisors($supervisors);
    return $supervisors;
  }
}
