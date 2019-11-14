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
$t002_subgrup_delete = new t002_subgrup_delete();

// Run the page
$t002_subgrup_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_subgrup_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_subgrupdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft002_subgrupdelete = currentForm = new ew.Form("ft002_subgrupdelete", "delete");
	loadjs.done("ft002_subgrupdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_subgrup_delete->showPageHeader(); ?>
<?php
$t002_subgrup_delete->showMessage();
?>
<form name="ft002_subgrupdelete" id="ft002_subgrupdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_subgrup">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_subgrup_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_subgrup_delete->kode->Visible) { // kode ?>
		<th class="<?php echo $t002_subgrup_delete->kode->headerCellClass() ?>"><span id="elh_t002_subgrup_kode" class="t002_subgrup_kode"><?php echo $t002_subgrup_delete->kode->caption() ?></span></th>
<?php } ?>
<?php if ($t002_subgrup_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $t002_subgrup_delete->nama->headerCellClass() ?>"><span id="elh_t002_subgrup_nama" class="t002_subgrup_nama"><?php echo $t002_subgrup_delete->nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_subgrup_delete->RecordCount = 0;
$i = 0;
while (!$t002_subgrup_delete->Recordset->EOF) {
	$t002_subgrup_delete->RecordCount++;
	$t002_subgrup_delete->RowCount++;

	// Set row properties
	$t002_subgrup->resetAttributes();
	$t002_subgrup->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_subgrup_delete->loadRowValues($t002_subgrup_delete->Recordset);

	// Render row
	$t002_subgrup_delete->renderRow();
?>
	<tr <?php echo $t002_subgrup->rowAttributes() ?>>
<?php if ($t002_subgrup_delete->kode->Visible) { // kode ?>
		<td <?php echo $t002_subgrup_delete->kode->cellAttributes() ?>>
<span id="el<?php echo $t002_subgrup_delete->RowCount ?>_t002_subgrup_kode" class="t002_subgrup_kode">
<span<?php echo $t002_subgrup_delete->kode->viewAttributes() ?>><?php echo $t002_subgrup_delete->kode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t002_subgrup_delete->nama->Visible) { // nama ?>
		<td <?php echo $t002_subgrup_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $t002_subgrup_delete->RowCount ?>_t002_subgrup_nama" class="t002_subgrup_nama">
<span<?php echo $t002_subgrup_delete->nama->viewAttributes() ?>><?php echo $t002_subgrup_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_subgrup_delete->Recordset->moveNext();
}
$t002_subgrup_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_subgrup_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_subgrup_delete->showPageFooter();
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
$t002_subgrup_delete->terminate();
?>