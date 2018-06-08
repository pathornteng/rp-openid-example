<?php
require __DIR__ . '/vendor/autoload.php';

use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient(
  'https://ohm.auth0.com', // idp issuer
  'mPpr3rlx2tnAVM3eLnvQshxzxRvKpn9g', // client id
  'A_QN3eZ4aVW007R0DreCQh4T3eTItN_gL24o3s0ms-fuO2_NA3suxrwIhOXlawzZ'); //client secret

$oidc->providerConfigParam(array(
  'token_endpoint'=>'https://ohm.auth0.com/oauth/token',
  'jwks_uri'=>'https://ohm.auth0.com/.well-known/jwks.json',
  'response_type'=>'code',
));
$oidc->setRedirectURL("http://localhost:8000");
$oidc->addScope(array('openid')); 
$oidc->authenticate();
$sub = $oidc->getVerifiedClaims();

print_r($sub);


?>
