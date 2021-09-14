<?php
require_once "vendor/autoload.php";
function create_cloudflare_subdomain($subdomain = '')
{
	// Cloudflare Credentials
	$email    = 'email@server.com';
	$auth_key = 'xxxxxxxxxx';
	$zone_id  = 'xxxxxxxxxx';

	// New Record Information
	$record_type = 'A';
	$servers_ip  = 'xxx.xxx.xxx.xxx';
	$ttl         = 120;
	$proxied     = false;

	$CFAPI = new Cloudflare\API\Auth\APIKey($email, $auth_key);
	$adapter = new Cloudflare\API\Adapter\Guzzle($CFAPI);	
	$dns = new Cloudflare\API\Endpoints\DNS($adapter);	
	echo $dns->addRecord($zone_id, $record_type, $subdomain, $servers_ip, $ttl, $proxied);	
}
$new_subdomain = 'xyz';
create_cloudflare_subdomain($new_subdomain);
?>