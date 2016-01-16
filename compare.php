<html>

	<head>
		<title>Search</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/search.css">
	    <script src="js/html5shiv.min.js"></script>
	    <script src="js/respond.min.js"></script>
	</head>

	<body>
		<nav class = "navbar navbar-default navbar-fixed-top" id ="my-navbar">
			<div class = "container-fluid">
			    <div class = "navbar-header">
			      	<button type="button" class ="navbar-toggle" data-toggle = "collapse" data-target ="#navbar-collapse">
				    	<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				  	</button>
		         	<a href="#" class="navbar-brand">SpojTrackers</a>	
			    </div>
		       
		      	<div class="collapse navbar-collapse" id="navbar-collapse">
		         	<ul class="nav navbar-nav">
					</ul>
		      	</div>
		    </div>
	   	</nav>

	   	<div class="jumbotron" id="search">
	      
	      	<div class="container text-center">
	      		<h1>Let the Comparison Begin!</h1>
	      		<p></p>
	      		
	      		<div class="row">
				  	<form action="compare.php" method="post">
					  	<div class="col-lg-6">
						    <div class="input-group">
						      <span class="input-group-addon" id="sizing-addon1">@</span>
						      <input type="text" class="form-control" placeholder="Search for..." name='coder1'>
						    </div><!-- /input-group -->
					  	</div><!-- /.col-lg-6 -->
						
						<div class="col-lg-6">
							<div class="input-group">
							    <span class="input-group-addon" id="sizing-addon1">@</span>
							    <input type="text" class="form-control" placeholder="Search for..." name='coder2'>
							    <span class="input-group-btn">
								    <button class="btn btn-default" type="submit">Go!</button>
							    </span>
							</div><!-- /input-group -->
						</div><!-- /.col-lg-6 -->
					</form>
				</div><!-- /.row -->
			</div>
	    </div>
	    <?php
                include('simple_html_dom.php');
                include('proxy.php');
                if(isset($_POST['coder1']) && isset($_POST['coder2'])) {
    		    	
		  

                
			//  $cxt=stream_context_create($Context);
			  			$coder1=$_POST['coder1'];
                        $url1="http://www.spoj.com/users/$coder1";
	        			$user1=file_get_html($url1,false,$cxt);
	        			$list=$user1->find('table[class=table table-condensed]',0);
	        			$list1=$list->find('a');
	        			
				    for($i=0;$i<sizeof($list1);$i++)
				    {
				    

				          $list2[$i] =  $list->find('a',$i)->innertext;
				    }
				    $list2=array_filter($list2);
                    sort($list2);

                    // for coder 2
                   
                   // $cxt=stream_context_create($Context);
                    $coder2=$_POST['coder2'];
                    $url2="http://www.spoj.com/users/$coder2";
                    $user2=file_get_html($url2,false,$cxt);
                    $list10=$user2->find('table[class=table table-condensed]',0);
                    $list11=$list10->find('a');
                    
                    
                    for($i=0;$i<sizeof($list11);$i++)
                    {
                    
                    	$list12[$i]=$list10->find('a',$i)->innertext;
                    }
                    $list12=array_filter($list12);
                   
                    sort($list12);
                    $compare=array_intersect($list2,$list12);
                    sort($compare);
                    $userl2=array_diff($list12,$list2);
                    $userl1=array_diff($list2,$list12);
                    sort($userl2);
                    sort($userl1);
                    //print_r($compare);
                }
                $lik="http://www.spoj.com/problems/";
                    ?>

                    <?php
                     if(isset($compare)){?>
                     <h3>Common Problems</h3>
                   <table class="table" width='70%'>
					<thead>
						<tr>
						<th><center>#</center></th>
           				<th><center>PId</center></th>
           				</tr>

           				</thead>
           				<tbody>
           				<?php
           			$i=0;
           			  
           				foreach ($compare as $x=>$x_ind)
					{
						if(isset($x_ind[0]))
							{
								?>
								<tr>
						 		 	<center>
						 		 	<td><center><?php echo $i+1; ?></center></td>
						 		 	<td><center><font style="color : blue"> 
                              		<a href="<?php echo $lik.$x_ind;  ?>" target="_blank">
                                			<?php echo $x_ind ?>
                                			</a></font></center></td>
						 		 	</center>
						 		 	</tr>
						 		 	<?php
							}	
							$i=$i+1;
						}
				}
						?>
						</tbody>
						</table>

                    <?php
                     if(isset($userl1))
                     {
                     	?>
                     	<?php echo "Problems only by ".$coder1; ?></h3>
                   <table class="table" width='70%'>
					<thead>
						<tr>
						<th><center>#</center></th>
           				<th><center>PId</center></th>
           				</tr>

           				</thead>
           				<tbody>
           				<?php
           			$i=0;
           			  
           				foreach ($userl1 as $x=>$x_ind)
					{
						if(isset($x_ind[0]))
							{
								?>
								<tr>
						 		 	<center>
						 		 	<td><center><?php echo $i+1; ?></center></td>
						 		 	<td><center><font style="color : blue"> 
                              		<a href="<?php echo $lik.$x_ind;  ?>" target="_blank">
                                			<?php echo $x_ind ?>
                                			</a></font></center></td>
						 		 	</center>
						 		 	</tr>
						 		 	<?php
							}	
							$i=$i+1;
						}
				}
						?>
						</tbody>
						</table>

                    <?php
                     if(isset($userl2)){?>
                    <?php echo "Problems only by ".$coder2; ?></h3>
                   <table class="table" width='70%'>
					<thead>
						<tr>
						<th><center>#</center></th>
           				<th><center>PId</center></th>
           				</tr>

           				</thead>
           				<tbody>
           				<?php
           			$i=0;
           			  
           				foreach ($userl2 as $x=>$x_ind)
					{
						if(isset($x_ind[0]))
							{
								?>
								<tr>
						 		 	<center>
						 		 	<td><center><?php echo $i+1; ?></center></td>
						 		 	<td><center><font style="color : blue"> 
                              		<a href="<?php echo $lik.$x_ind;  ?>" target="_blank">
                                			<?php echo $x_ind ?>
                                			</a></font></center></td>
						 		 	</center>
						 		 	</tr>
						 		 	<?php
							}	
							$i=$i+1;
						}
				}
						?>
						</tbody>
						</table>

	   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html> 
