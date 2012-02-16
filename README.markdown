mcurl - Codeigniter library for multi-curl functionality
========================================================

Overview
--------
A codeigniter library to help make using multi curl functionality easier. Multi curl alows you to make multiple curl requests simultaneously, without having to process each curl request one after another. This library is great if you're having to make multiple web API calls to one or more APIs.

How to use it
-------------
Move mcurl.php to your libraries folder. To view the examples in your application, move example.php to your controllers folder and point your app to http://your_app/index.php/example 

	
	$this->load->library('mcurl');
	
	// add_call( KEY, METHOD, URL, array of PARAMS, array of CURL_OPTS )
	$this->mcurl->add_call("call1","get","http://google.com");
	$this->mcurl->add_call("call2","post","http://twitter.com");
	$this->mcurl->add_call("call3","get","http://google.com",array("q"=>"codeigniter"));
	$this->mcurl->add_call("call4","get","https://facebook.com",array(),array(CURLOPT_SSL_VERIFYPEER => FALSE));
	
	// execute the calls
	$responses = $this->mcurl->execute();
	
	// retrieve a specific call by key
	// this will return the response of the google.com request
	$response = $this->mcurl->calls["call1"]["response"];
	
	// available data to use
	$this->mcurl->calls["key"]["method"]; // the method POST/GET used in request
	$this->mcurl->calls["key"]["url"]; // the uri of the request
	$this->mcurl->calls["key"]["params"]; // the data parameters sent in request
	$this->mcurl->calls["key"]["options"]; // the curl options used in the request
	$this->mcurl->calls["key"]["curl"]; // the php curl object
	$this->mcurl->calls["key"]["response"]; // the response of the request
	$this->mcurl->calls["key"]["error"]; // if not null, there are some errors
	
	// show some debugging on all calls
	$this->mcurl->debug();
	

See the Example controller in the code for more details.