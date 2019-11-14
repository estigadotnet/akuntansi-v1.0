<?php
namespace PHPMaker2020\p_akuntansi_v1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();
?>
<?php include_once "autoload.php"; ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$c401_home = new c401_home();

// Run the page
$c401_home->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
//echo "this is a default page";
?>

<div id="accordion">

  <!--
  <div class="card">
	<div class="card-header" id="headingOne">
	  <h5 class="mb-0">
		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		  Latest News
		</button>
	  </h5>
	</div>
	<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
	  <div class="card-body">
		--><!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. --><!--
		<pre><?php $lines=file('01, log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
	  </div>
	</div>
  </div>
  -->

  
  <div class="card">
	<div class="card-header" id="headingTwo">
	  <h5 class="mb-0">
		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		  Latest News
		</button>
	  </h5>
	</div>
	<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
	  <div class="card-body">
		<!-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. -->
		<pre><?php $lines=file('01, log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
	  </div>
	</div>
  </div>

  <!--
  <div class="card">
	<div class="card-header" id="headingThree">
	  <h5 class="mb-0">
		<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		  Collapsible Group Item #3
		</button>
	  </h5>
	</div>
	<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
	  <div class="card-body">
		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	  </div>
	</div>
  </div>
  -->

</div>

<!--
<div class="card">
	<div class="card-header">Latest news</div>
	<div class="card-body">
		--><!-- <p>PHPMaker 2019 is released</p> --><!--
		<pre><?php $lines=file('01, log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
	</div>
</div>
-->

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c401_home->terminate();
?>