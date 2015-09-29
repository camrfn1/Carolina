<?php
function createInvoice($len = 6) {
	$chars = "0123456789";
	$charsLength = strlen($chars);
	$randomString = '';
    for ($i = 0; $i < $len; $i++) {
        $randomString .= $chars[rand(0, $charsLength - 1)];
    }
    return $randomString;
}
$invoicenumber=createInvoice() ;
?>
