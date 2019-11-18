<?php
namespace PHPMaker2020\p_akuntansi_v1_0;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t302_userlevels_view = new t302_userlevels_view();

// Run the page
$t302_userlevels_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t302_userlevels_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t302_userlevels_view->isExport()) { ?>
<script>
var ft302_userlevelsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft302_userlevelsview = currentForm = new ew.Form("ft302_userlevelsview", "view");
	loadjs.done("ft302_userlevelsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t302_userlevels_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t302_userlevels_view->ExportOptions->render("body") ?>
<?php $t302_userlevels_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t302_userlevels_view->showPageHeader(); ?>
<?php
$t302_userlevels_view->showMessage();
?>
<?php if (!$t302_userlevels_view->IsModal) { ?>
<?php if (!$t302_userlevels_view->isExport()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t302_userlevels_view->Pager->render() ?>
<div class="clearfix"></div>
</form>
<?php } ?>
<?php } ?>
<form name="ft302_userlevelsview" id="ft302_userlevelsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t302_userlevels">
<input type="hidden" name="modal" value="<?php echo (int)$t302_userlevels_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t302_userlevels_view->userlevelid->Visible) { // userlevelid ?>
	<tr id="r_userlevelid">
		<td class="<?php echo $t302_userlevels_view->TableLeftColumnClass ?>"><span id="elh_t302_userlevels_userlevelid"><?php echo $t302_userlevels_view->userlevelid->caption() ?></span></td>
		<td data-name="userlevelid" <?php echo $t302_userlevels_view->userlevelid->cellAttributes() ?>>
<span id="el_t302_userlevels_userlevelid">
<span<?php echo $t302_userlevels_view->userlevelid->viewAttributes() ?>><?php echo $t302_userlevels_view->userlevelid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t302_userlevels_view->userlevelname->Visible) { // userlevelname ?>
	<tr id="r_userlevelname">
		<td class="<?php echo $t302_userlevels_view->TableLeftColumnClass ?>"><span id="elh_t302_userlevels_userlevelname"><?php echo $t302_userlevels_view->userlevelname->caption() ?></span></td>
		<td data-name="userlevelname" <?php echo $t302_userlevels_view->userlevelname->cellAttributes() ?>>
<span id="el_t302_userlevels_userlevelname">
<span<?php echo $t302_userlevels_view->userlevelname->viewAttributes() ?>><?php echo $t302_userlevels_view->userlevelname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t302_userlevels_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t302_userlevels_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t302_userlevels_view->terminate();
?>