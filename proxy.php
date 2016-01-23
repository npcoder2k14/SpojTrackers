<?php
/*$auth=base64_encode('edcguest:edcguest');
    			$Context=array('http'=>array(
	        			'proxy'=>'tcp://172.31.102.14:3128',
	        			'request_fulluri'=>true,
	        			'header'=>"Proxy-Authorization:Basic $auth"
   )
);
$cxt=stream_context_create($Context);   */
      $proxy='172.31.102.14:3128';
      $proxyauth='edcguest:edcguest';

?>
