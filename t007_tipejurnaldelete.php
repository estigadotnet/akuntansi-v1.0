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
$t007_tipejurnal_delete = new t007_tipejurnal_delete();

// Run the page
$t007_tipejurnal_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_tipejurnal_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_tipejurnaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft007_tipejurnaldelete = currentForm = new ew.Form("ft007_tipejurnaldelete", "delete");
	loadjs.done("ft007_tipejurnaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_tipejurnal_delete->showPageHeader(); ?>
<?php
$t007_tipejurnal_delete->showMessage();
?>
<form name="ft007_tipejurnaldelete" id="ft007_tipejurnaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_tipejurnal">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t007_tipejurnal_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t007_tipejurnal_delete->kode->Visible) { // kode ?>
		<th class="<?php echo $t007_tipejurnal_delete->kode->headerCellClass() ?>"><span id="elh_t007_tipejurnal_kode" class="t007_tipejurnal_kode"><?php echo $t007_tipejurnal_delete->kode->caption() ?></span></th>
<?php } ?>
<?php if ($t007_tipejurnal_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $t007_tipejurnal_delete->nama->headerCellClass() ?>"><span id="elh_t007_tipejurnal_nama" class="t007_tipejurnal_nama"><?php echo $t007_tipejurnal_delete->nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t007_tipejurnal_delete->RecordCount = 0;
$i = 0;
while (!$t007_tipejurnal_delete->Recordset->EOF) {
	$t007_tipejurnal_delete->RecordCount++;
	$t007_tipejurnal_delete->RowCount++;

	// Set row properties
	$t007_tipejurnal->resetAttributes();
	$t007_tipejurnal->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t007_tipejurnal_delete->loadRowValues($t007_tipejurnal_delete->Recordset);

	// Render row
	$t007_tipejurnal_delete->renderRow();
?>
	<tr <?php echo $t007_tipejurnal->rowAttributes() ?>>
<?php if ($t007_tipejurnal_delete->kode->Visible) { // kode ?>
		<td <?php echo $t007_tipejurnal_delete->kode->cellAttributes() ?>>
<span id="el<?php echo $t007_tipejurnal_delete->RowCount ?>_t007_tipejurnal_kode" class="t007_tipejurnal_kode">
<span<?php echo $t007_tipejurnal_delete->kode->viewAttributes() ?>><?php echo $t007_tipejurnal_delete->kode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t007_tipejurnal_delete->nama->Visible) { // nama ?>
		<td <?php echo $t007_tipejurnal_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $t007_tipejurnal_delete->RowCount ?>_t007_tipejurnal_nama" class="t007_tipejurnal_nama">
<span<?php echo $t007_tipejurnal_delete->nama->viewAttributes() ?>><?php echo $t007_tipejurnal_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t007_tipejurnal_delete->Recordset->moveNext();
}
$t007_tipejurnal_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t007_tipejurnal_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t007_tipejurnal_delete->showPageFooter();
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
$t007_tipejurnal_delete->terminate();
?>