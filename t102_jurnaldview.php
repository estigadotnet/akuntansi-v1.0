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
$t102_jurnald_view = new t102_jurnald_view();

// Run the page
$t102_jurnald_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jurnald_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t102_jurnald_view->isExport()) { ?>
<script>
var ft102_jurnaldview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft102_jurnaldview = currentForm = new ew.Form("ft102_jurnaldview", "view");
	loadjs.done("ft102_jurnaldview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t102_jurnald_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t102_jurnald_view->ExportOptions->render("body") ?>
<?php $t102_jurnald_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t102_jurnald_view->showPageHeader(); ?>
<?php
$t102_jurnald_view->showMessage();
?>
<?php if (!$t102_jurnald_view->IsModal) { ?>
<?php if (!$t102_jurnald_view->isExport()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t102_jurnald_view->Pager->render() ?>
<div class="clearfix"></div>
</form>
<?php } ?>
<?php } ?>
<form name="ft102_jurnaldview" id="ft102_jurnaldview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_jurnald">
<input type="hidden" name="modal" value="<?php echo (int)$t102_jurnald_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t102_jurnald_view->jurnal_id->Visible) { // jurnal_id ?>
	<tr id="r_jurnal_id">
		<td class="<?php echo $t102_jurnald_view->TableLeftColumnClass ?>"><span id="elh_t102_jurnald_jurnal_id"><?php echo $t102_jurnald_view->jurnal_id->caption() ?></span></td>
		<td data-name="jurnal_id" <?php echo $t102_jurnald_view->jurnal_id->cellAttributes() ?>>
<span id="el_t102_jurnald_jurnal_id">
<span<?php echo $t102_jurnald_view->jurnal_id->viewAttributes() ?>><?php echo $t102_jurnald_view->jurnal_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_jurnald_view->akun_id->Visible) { // akun_id ?>
	<tr id="r_akun_id">
		<td class="<?php echo $t102_jurnald_view->TableLeftColumnClass ?>"><span id="elh_t102_jurnald_akun_id"><?php echo $t102_jurnald_view->akun_id->caption() ?></span></td>
		<td data-name="akun_id" <?php echo $t102_jurnald_view->akun_id->cellAttributes() ?>>
<span id="el_t102_jurnald_akun_id">
<span<?php echo $t102_jurnald_view->akun_id->viewAttributes() ?>><?php echo $t102_jurnald_view->akun_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_jurnald_view->debet->Visible) { // debet ?>
	<tr id="r_debet">
		<td class="<?php echo $t102_jurnald_view->TableLeftColumnClass ?>"><span id="elh_t102_jurnald_debet"><?php echo $t102_jurnald_view->debet->caption() ?></span></td>
		<td data-name="debet" <?php echo $t102_jurnald_view->debet->cellAttributes() ?>>
<span id="el_t102_jurnald_debet">
<span<?php echo $t102_jurnald_view->debet->viewAttributes() ?>><?php echo $t102_jurnald_view->debet->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t102_jurnald_view->kredit->Visible) { // kredit ?>
	<tr id="r_kredit">
		<td class="<?php echo $t102_jurnald_view->TableLeftColumnClass ?>"><span id="elh_t102_jurnald_kredit"><?php echo $t102_jurnald_view->kredit->caption() ?></span></td>
		<td data-name="kredit" <?php echo $t102_jurnald_view->kredit->cellAttributes() ?>>
<span id="el_t102_jurnald_kredit">
<span<?php echo $t102_jurnald_view->kredit->viewAttributes() ?>><?php echo $t102_jurnald_view->kredit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t102_jurnald_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t102_jurnald_view->isExport()) { ?>
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
$t102_jurnald_view->terminate();
?>