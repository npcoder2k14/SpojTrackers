<html>

	<head>
		<title>Search</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/search.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
				  	<form action="index.php" method="post">
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

	    <div class="container">

			<?php
                include('simple_html_dom.php');
              //  include('proxy.php');
                function getStringBetween($str,$from,$to)
               {
                  $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
                  return substr($sub,0,strpos($sub,$to));
              }

              if(isset($_POST['coder1']) && isset($_POST['coder2'])) {


			?>

			<div>

			    <?php
                    $Context=array("header"=>"User-Agent:Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:43.0) Gecko/20100101 Firefox/43.0"
);
				    $cxt=stream_context_create($Context);
				    $coder1=$_POST['coder1'];
				    $url1="http://www.spoj.com/users/$coder1/";
				    $html1 = file_get_html($url1,$cxt,false);
				    $userprofile1=$html1->find('div[id=user-profile-left]',0);
				    $name1=$userprofile1->find('h3',0);
				    $username1=$userprofile1->find('h4',0);
				    $country1=$userprofile1->find('p',0);
				    $joiningtime1=$userprofile1->find('p',1);
				    $worldrank1=$userprofile1->find('p',2);
				    $institution1=$userprofile1->find('p',3);
				    $thought1=$userprofile1->find('p',4);
				    $profilepic1=$userprofile1->find('img',0);
    				$value1=$profilepic1->src;
    				$userstats1=$html1->find('dl',0);
				    $probcount1=$userstats1->find('dd',0)->plaintext;
				    $subcount1=$userstats1->find('dd',1)->plaintext;
				    $probtable1=$html1->find('table[class=table table-condensed]',0);
                    $rank_string1=$worldrank1->plaintext;
                    
                    $from="#";
                    $to=" ";

                    $rank_val1=getStringBetween($rank_string1,$from,$to);//Rank of coder1
                      


				//    $cxt=stream_context_create($Context);
				    $coder2=$_POST['coder2'];
				    $url2="http://www.spoj.com/users/$coder2/";
				    $html2 = file_get_html($url2,$cxt,false);
				    $userprofile2=$html2->find('div[id=user-profile-left]',0);
				    $name2=$userprofile2->find('h3',0);
				    $username2=$userprofile2->find('h4',0);
				    $country2=$userprofile2->find('p',0);
				    $joiningtime2=$userprofile2->find('p',1);
				    $worldrank2=$userprofile2->find('p',2);
				    $institution2=$userprofile2->find('p',3);
				    $thought2=$userprofile2->find('p',4);
				    $profilepic2=$userprofile2->find('img',0);
    				$value2=$profilepic2->src;
    				$userstats2=$html2->find('dl',0);
				    $probcount2=$userstats2->find('dd',0)->plaintext;
				    $subcount2=$userstats2->find('dd',1)->plaintext;
				    $probtable2=$html2->find('table[class=table table-condensed]',0);	
				    $rank_string2=$worldrank2->plaintext;
                     
                    $rank_val2=getStringBetween($rank_string2,$from,$to);  //Rank of coder2

				    $rank_total=$rank_val1+$rank_val2;    //Total of rank of coder1 and coder2

				    $rank_percent1=ROUND($rank_val1*100/$rank_total);  
                    $rank_percent2=ROUND($rank_val2*100/$rank_total);

                    $prob_total=$probcount1+$probcount2;  //Total of problem count of both coders

                    $prob_percent1=ROUND($probcount1*100/$prob_total);
                    $prob_percent2=ROUND($probcount2*100/$prob_total);

                    $sub_total=$subcount1+$subcount2;

                    $sub_percent1=ROUND($subcount1*100/($sub_total));
                    $sub_percent2=ROUND($subcount2*100/($sub_total));

				?>
			</div>
		</div>

		<table class="table" width='70%'>
			<tr>
				<td align='center'>
					<?php
						if(isset($name1->plaintext)){
							echo $name1->plaintext." (";
							echo $username1->plaintext.") ".'<br>';
						}
					?>
				</td>
				
				<td>
				</td>
				
				<td align='center'>
					<?php
						if(isset($name2->plaintext)){
							echo $name2->plaintext." (";
							echo $username2->plaintext.") ".'<br>';
						}
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo "<img src=$value1 height='200px width='200px'></img><br><br>";
					?>
				</td>
				
				<td align='center'>
					<img src="images/vs.jpeg" height='200px' width='200px'>
				</td>
				
				<td align='center'>
					<?php
						echo "<img src=$value2 height='200px width='200px'></img><br><br>";
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo $country1->plaintext.'<br>';
					?>
				</td>
				
				<td>
				</td>
				
				<td  align='center'>
					<?php
						echo $country2->plaintext.'<br>';
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo $joiningtime1->plaintext.'<br>';
					?>
				</td>
				
				<td>

				</td>
				
				<td align='center'>
					<?php
						echo $joiningtime2->plaintext.'<br>';
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo $worldrank1->plaintext.'<br>';
					?>
				</td>
				
				<td>
					<div class="progress">
						<?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$rank_percent2.'%">';
						?>

						<?php
								echo $rank_percent2.'%';
					    ?>

					    </div>
						<?php
						echo '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$rank_percent1.'%">';
						?>

						<?php
								echo $rank_percent1.'%';
					    ?>

					    </div>

					</div>
				</td>
				
				<td align='center'>
					<?php
						echo $worldrank2->plaintext.'<br>';
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo $institution1->plaintext.'<br>';
					?>
				</td>
				
				<td>
				</td>
				
				<td align='center'>
					<?php
						echo $institution2->plaintext.'<br>';
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo "Problem Solved: ".$probcount1."<br>";
					?>
				</td>
				
				<td width = '400px'>
					<div class="progress">
						<?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$prob_percent1.'%">';
						?>

						<?php
								echo $prob_percent1.'%';
					    ?>
					    </div>
                       
                        <?php
						echo '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$prob_percent2.'%">';
						?>

						<?php
								echo $prob_percent2.'%';
					    ?>

					    </div>




					  	
					</div>
				</td>
				
				<td align='center'>
					<?php
						echo "Problem Solved: ".$probcount2."<br>";
					?>
				</td>
			</tr>

			<tr>
				<td align='center'>
					<?php
						echo "Submissions: ".$subcount1."<br>";
					?>
				</td>
				
				<td>
					<div class="progress">
                       
                        <?php
						echo '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$sub_percent1.'%">';
						?>

						<?php
								echo $sub_percent1.'%';
					    ?>
					    </div>

					   <?php
						echo '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.$sub_percent2.'%">';
						?>

						<?php
								echo $sub_percent2.'%';
					    ?>

					    </div>

                                              

					</div>
				</td>
				
				<td align='center'>
					<?php
						echo "Submissions: ".$subcount2."<br>";
					?>
				</td>
			</tr>

			<tr>
				<td>
					<?php
					?>
				</td>
				
				<td>
				</td>
				
				<td>
					<?php
					?>
				</td>
			</tr>


		</table>
	   	<?php
	   }
	   	?>

	   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
