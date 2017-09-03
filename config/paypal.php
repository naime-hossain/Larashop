<?php 
 return[
 /** set your paypal credential **/
'client_id' =>'AW5sVbXsg_OBLl10W8rrMTj9KmCORS1N1gvuDem1zMsyVKXjHQKqNL9vHWda1T2VWhjJSQeHRF_KI4zL',
'secret' => 'EKjpFMhpm7VPdMKzSRaaztlJJlI8fqEly3pE6V8Lv_Rf83lnCcpK_9gf1g6pjQF2ar6mLnviDEdjh5l0',
/**
* SDK configuration 
*/
'settings' => array(
	/**
	* Available option 'sandbox' or 'live'
	*/
	'mode' => 'sandbox',
	/**
	* Specify the max request time in seconds
	*/
	'http.ConnectionTimeOut' => 1000,
	/**
	* Whether want to log to a file
	*/
	'log.LogEnabled' => true,
	/**
	* Specify the file that want to write on
	*/
	'log.FileName' => storage_path() . '/logs/paypal.log',
	/**
	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	*
	* Logging is most verbose in the 'FINE' level and decreases as you
	* proceed towards ERROR
	*/
	'log.LogLevel' => 'FINE'
	),

 ]

 ?>