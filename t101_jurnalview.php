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
$t101_jurnal_view = new t101_jurnal_view();

// Run the page
$t101_jurnal_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jurnal_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_jurnal_view->isExport()) { ?>
<script>
var ft101_jurnalview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_jurnalview = currentForm = new ew.Form("ft101_jurnalview", "view");
	loadjs.done("ft101_jurnalview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_jurnal_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_jurnal_view->ExportOptions->render("body") ?>
<?php $t101_jurnal_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_jurnal_view->showPageHeader(); ?>
<?php
$t101_jurnal_view->showMessage();
?>
<?php if (!$t101_jurnal_view->IsModal) { ?>
<?php if (!$t101_jurnal_view->isExport()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t101_jurnal_view->Pager->render() ?>
<div class="clearfix"></div>
</form>
<?php } ?>
<?php } ?>
<form name="ft101_jurnalview" id="ft101_jurnalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jurnal">
<input type="hidden" name="modal" value="<?php echo (int)$t101_jurnal_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_jurnal_view->tipejurnal_id->Visible) { // tipejurnal_id ?>
	<tr id="r_tipejurnal_id">
		<td class="<?php echo $t101_jurnal_view->TableLeftColumnClass ?>"><span id="elh_t101_jurnal_tipejurnal_id"><?php echo $t101_jurnal_view->tipejurnal_id->caption() ?></span></td>
		<td data-name="tipejurnal_id" <?php echo $t101_jurnal_view->tipejurnal_id->cellAttributes() ?>>
<span id="el_t101_jurnal_tipejurnal_id">
<span<?php echo $t101_jurnal_view->tipejurnal_id->viewAttributes() ?>><?php echo $t101_jurnal_view->tipejurnal_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jurnal_view->nomer->Visible) { // nomer ?>
	<tr id="r_nomer">
		<td class="<?php echo $t101_jurnal_view->TableLeftColumnClass ?>"><span id="elh_t101_jurnal_nomer"><?php echo $t101_jurnal_view->nomer->caption() ?></span></td>
		<td data-name="nomer" <?php echo $t101_jurnal_view->nomer->cellAttributes() ?>>
<span id="el_t101_jurnal_nomer">
<span<?php echo $t101_jurnal_view->nomer->viewAttributes() ?>><?php echo $t101_jurnal_view->nomer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_jurnal_view->keterangan->Visible) { // keterangan ?>
	<tr id="r_keterangan">
		<td class="<?php echo $t101_jurnal_view->TableLeftColumnClass ?>"><span id="elh_t101_jurnal_keterangan"><?php echo $t101_jurnal_view->keterangan->caption() ?></span></td>
		<td data-name="keterangan" <?php echo $t101_jurnal_view->keterangan->cellAttributes() ?>>
<span id="el_t101_jurnal_keterangan">
<span<?php echo $t101_jurnal_view->keterangan->viewAttributes() ?>><?php echo $t101_jurnal_view->keterangan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t102_jurnald", explode(",", $t101_jurnal->getCurrentDetailTable())) && $t102_jurnald->DetailView) {
?>
<?php if ($t101_jurnal->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t102_jurnald", "TblCaption") ?>&nbsp;<?php echo str_replace("%c", $t101_jurnal_view->t102_jurnald_Count, $Language->phrase("DetailCount")) ?></h4>
<?php } ?>
<?php include_once "t102_jurnaldgrid.php" ?>
<?php } ?>
</form>
<?php
$t101_jurnal_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_jurnal_view->isExport()) { ?>
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
$t101_jurnal_view->terminate();
?>