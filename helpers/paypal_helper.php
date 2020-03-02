<?php

  //start session in all pages
  if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
  //if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

	// sandbox or live
	define('PPL_MODE', 'sandbox');

	if(PPL_MODE=='sandbox'){
		
		define('PPL_API_USER', 'fa-facilitator_api1.bezaleelsolutions.com');
		define('PPL_API_PASSWORD', 'ZT7RL599B6V7GC57');
		define('PPL_API_SIGNATURE', 'AXlv5viNs2yT2MDR7RbOqxhYiFHrAg87wf7lBMY0dIlf0jHwZTY5GZO4');
	}
	else{
		
		define('PPL_API_USER', 'fa_api1.bezaleelsolutions.com');
		define('PPL_API_PASSWORD', 'RCGDD9VLU5JZYRAC');
		define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AlgQszdFJV-J27Ot6UQ9SGbVjn1I');
	}
	
	define('PPL_LANG', 'EN');
	
	define('PPL_LOGO_IMG', 'http://url/to/site/logo.png');
	
	define('PPL_RETURN_URL', site_url('home/') . '/success');
	define('PPL_CANCEL_URL', site_url('home/') . '/cancel');

	define('PPL_CURRENCY_CODE', 'GBP');
