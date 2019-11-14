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
$t003_matauang_delete = new t003_matauang_delete();

// Run the page
$t003_matauang_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_matauang_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft003_matauangdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft003_matauangdelete = currentForm = new ew.Form("ft003_matauangdelete", "delete");
	loadjs.done("ft003_matauangdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t003_matauang_delete->showPageHeader(); ?>
<?php
$t003_matauang_delete->showMessage();
?>
<form name="ft003_matauangdelete" id="ft003_matauangdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_matauang">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t003_matauang_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t003_matauang_delete->kode->Visible) { // kode ?>
		<th class="<?php echo $t003_matauang_delete->kode->headerCellClass() ?>"><span id="elh_t003_matauang_kode" class="t003_matauang_kode"><?php echo $t003_matauang_delete->kode->caption() ?></span></th>
<?php } ?>
<?php if ($t003_matauang_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $t003_matauang_delete->nama->headerCellClass() ?>"><span id="elh_t003_matauang_nama" class="t003_matauang_nama"><?php echo $t003_matauang_delete->nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t003_matauang_delete->RecordCount = 0;
$i = 0;
while (!$t003_matauang_delete->Recordset->EOF) {
	$t003_matauang_delete->RecordCount++;
	$t003_matauang_delete->RowCount++;

	// Set row properties
	$t003_matauang->resetAttributes();
	$t003_matauang->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t003_matauang_delete->loadRowValues($t003_matauang_delete->Recordset);

	// Render row
	$t003_matauang_delete->renderRow();
?>
	<tr <?php echo $t003_matauang->rowAttributes() ?>>
<?php if ($t003_matauang_delete->kode->Visible) { // kode ?>
		<td <?php echo $t003_matauang_delete->kode->cellAttributes() ?>>
<span id="el<?php echo $t003_matauang_delete->RowCount ?>_t003_matauang_kode" class="t003_matauang_kode">
<span<?php echo $t003_matauang_delete->kode->viewAttributes() ?>><?php echo $t003_matauang_delete->kode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t003_matauang_delete->nama->Visible) { // nama ?>
		<td <?php echo $t003_matauang_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $t003_matauang_delete->RowCount ?>_t003_matauang_nama" class="t003_matauang_nama">
<span<?php echo $t003_matauang_delete->nama->viewAttributes() ?>><?php echo $t003_matauang_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t003_matauang_delete->Recordset->moveNext();
}
$t003_matauang_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_matauang_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t003_matauang_delete->showPageFooter();
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
$t003_matauang_delete->terminate();
?>