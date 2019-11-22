<?php

class Mo2f_Api
{

    public function mo2f_wp_remote_post($url, $args = array()){
        $response = wp_remote_post($url, $args);
        if(!is_wp_error($response)){
            return $response['body'];
        } else {
            $message = 'Please enable curl extension. <a href="admin.php?page=miniOrange_2_factor_settings&amp;mo2f_tab=mo2f_help">Click here</a> for the steps to enable curl or check Help & Troubleshooting.';

            return json_encode( array( "status" => 'ERROR', "message" => $message ) );
        }
    }

    function get_timestamp() {
      
            $currentTimeInMillis = round( microtime( true ) * 1000 );
            $currentTimeInMillis = number_format( $currentTimeInMillis, 0, '', '' );
      
        return  $currentTimeInMillis ;
    }

    function make_curl_call( $url, $fields, $http_header_array =array("Content-Type"=>"application/json","charset"=>"UTF-8","Authorization"=>"Basic")) {

        if ( gettype( $fields ) !== 'string' ) {
            $fields = json_encode( $fields );
        }

        $args = array(
            'method' => 'POST',
            'body' => $fields,
            'timeout' => '5',
            'redirection' => '5',
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => $http_header_array
        );
		
		// 'sslverify'     =>  true,//MO_TEST_MODE ? false: true
		//wp_remote_retrieve_body

        $response = Mo2f_Api::mo2f_wp_remote_post($url, $args);
        return $response;

    }

    function get_http_header_array() {

        $customerKey = get_option( 'mo2f_customerKey' );
        $apiKey      = get_option( 'mo2f_api_key' );

        /* Current time in milliseconds since midnight, January 1, 1970 UTC. */
        $currentTimeInMillis = Mo2f_Api::get_timestamp();

        /* Creating the Hash using SHA-512 algorithm */
        $stringToHash = $customerKey . $currentTimeInMillis . $apiKey;;
        $hashValue = hash( "sha512", $stringToHash );

        $headers = array(
            "Content-Type" => "application/json",
            "Customer-Key" => $customerKey,
            "Timestamp" => $currentTimeInMillis,
            "Authorization" => $hashValue
        );

        return $headers;
    }

}