<?php

class Example extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        /*
        ** Load the mcurl library
        */
        $this->load->library('mcurl');

        /*
        ** Example 1: Adding a Basic GET Request
        */
        $this->mcurl->add_call("call1","get","http://chadhutchins.com");

        /*
        ** Example 2: Adding a Basic POST Request
        */
        $this->mcurl->add_call("call2","post","http://twitter.com/chadhutchins");

        /*
        ** Example 3: Adding a more complex Request with Variables and Curl Options
        */
        $vars = array(
            "v" => "1.0",
            "q" => "blogHer"
        );

        $options = array(
            CURLOPT_SSL_VERIFYPEER => FALSE
        );

        $this->mcurl->add_call("call3","get","https://ajax.googleapis.com/ajax/services/search/blogs",$vars,$options);

        /*
        ** Example 4: Error Handling
        */
        $this->mcurl->add_call("call4","post","httpasdf://twitter.com/chadhutchins");

        /*
        ** Execute the requests with Multiple Curl
        */
        $data = $this->mcurl->execute();

        /*
        ** Display the results with debug method
        */
        $this->mcurl->debug();
    }
    
}

?>