<?php
$auth=base64_encode('edcguest:edcguest');
    			$Context=array('http'=>array(
	        			'proxy'=>'tcp://172.31.103.29:3128',
	        			'request_fulluri'=>true,
	        			'header'=>"Proxy-Authorization:Basic $auth"
   )
);
$cxt=stream_context_create($Context);
?>
