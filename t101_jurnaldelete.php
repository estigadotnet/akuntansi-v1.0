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
$t101_jurnal_delete = new t101_jurnal_delete();

// Run the page
$t101_jurnal_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jurnal_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_jurnaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_jurnaldelete = currentForm = new ew.Form("ft101_jurnaldelete", "delete");
	loadjs.done("ft101_jurnaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_jurnal_delete->showPageHeader(); ?>
<?php
$t101_jurnal_delete->showMessage();
?>
<form name="ft101_jurnaldelete" id="ft101_jurnaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jurnal">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_jurnal_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_jurnal_delete->tipejurnal_id->Visible) { // tipejurnal_id ?>
		<th class="<?php echo $t101_jurnal_delete->tipejurnal_id->headerCellClass() ?>"><span id="elh_t101_jurnal_tipejurnal_id" class="t101_jurnal_tipejurnal_id"><?php echo $t101_jurnal_delete->tipejurnal_id->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jurnal_delete->nomer->Visible) { // nomer ?>
		<th class="<?php echo $t101_jurnal_delete->nomer->headerCellClass() ?>"><span id="elh_t101_jurnal_nomer" class="t101_jurnal_nomer"><?php echo $t101_jurnal_delete->nomer->caption() ?></span></th>
<?php } ?>
<?php if ($t101_jurnal_delete->keterangan->Visible) { // keterangan ?>
		<th class="<?php echo $t101_jurnal_delete->keterangan->headerCellClass() ?>"><span id="elh_t101_jurnal_keterangan" class="t101_jurnal_keterangan"><?php echo $t101_jurnal_delete->keterangan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_jurnal_delete->RecordCount = 0;
$i = 0;
while (!$t101_jurnal_delete->Recordset->EOF) {
	$t101_jurnal_delete->RecordCount++;
	$t101_jurnal_delete->RowCount++;

	// Set row properties
	$t101_jurnal->resetAttributes();
	$t101_jurnal->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_jurnal_delete->loadRowValues($t101_jurnal_delete->Recordset);

	// Render row
	$t101_jurnal_delete->renderRow();
?>
	<tr <?php echo $t101_jurnal->rowAttributes() ?>>
<?php if ($t101_jurnal_delete->tipejurnal_id->Visible) { // tipejurnal_id ?>
		<td <?php echo $t101_jurnal_delete->tipejurnal_id->cellAttributes() ?>>
<span id="el<?php echo $t101_jurnal_delete->RowCount ?>_t101_jurnal_tipejurnal_id" class="t101_jurnal_tipejurnal_id">
<span<?php echo $t101_jurnal_delete->tipejurnal_id->viewAttributes() ?>><?php echo $t101_jurnal_delete->tipejurnal_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jurnal_delete->nomer->Visible) { // nomer ?>
		<td <?php echo $t101_jurnal_delete->nomer->cellAttributes() ?>>
<span id="el<?php echo $t101_jurnal_delete->RowCount ?>_t101_jurnal_nomer" class="t101_jurnal_nomer">
<span<?php echo $t101_jurnal_delete->nomer->viewAttributes() ?>><?php echo $t101_jurnal_delete->nomer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_jurnal_delete->keterangan->Visible) { // keterangan ?>
		<td <?php echo $t101_jurnal_delete->keterangan->cellAttributes() ?>>
<span id="el<?php echo $t101_jurnal_delete->RowCount ?>_t101_jurnal_keterangan" class="t101_jurnal_keterangan">
<span<?php echo $t101_jurnal_delete->keterangan->viewAttributes() ?>><?php echo $t101_jurnal_delete->keterangan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_jurnal_delete->Recordset->moveNext();
}
$t101_jurnal_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_jurnal_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_jurnal_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t101_jurnal_delete->terminate();
?>