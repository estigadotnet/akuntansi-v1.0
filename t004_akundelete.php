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
$t004_akun_delete = new t004_akun_delete();

// Run the page
$t004_akun_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_akun_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_akundelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft004_akundelete = currentForm = new ew.Form("ft004_akundelete", "delete");
	loadjs.done("ft004_akundelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_akun_delete->showPageHeader(); ?>
<?php
$t004_akun_delete->showMessage();
?>
<form name="ft004_akundelete" id="ft004_akundelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_akun">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t004_akun_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t004_akun_delete->subgrup_id->Visible) { // subgrup_id ?>
		<th class="<?php echo $t004_akun_delete->subgrup_id->headerCellClass() ?>"><span id="elh_t004_akun_subgrup_id" class="t004_akun_subgrup_id"><?php echo $t004_akun_delete->subgrup_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_akun_delete->kode->Visible) { // kode ?>
		<th class="<?php echo $t004_akun_delete->kode->headerCellClass() ?>"><span id="elh_t004_akun_kode" class="t004_akun_kode"><?php echo $t004_akun_delete->kode->caption() ?></span></th>
<?php } ?>
<?php if ($t004_akun_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $t004_akun_delete->nama->headerCellClass() ?>"><span id="elh_t004_akun_nama" class="t004_akun_nama"><?php echo $t004_akun_delete->nama->caption() ?></span></th>
<?php } ?>
<?php if ($t004_akun_delete->matauang_id->Visible) { // matauang_id ?>
		<th class="<?php echo $t004_akun_delete->matauang_id->headerCellClass() ?>"><span id="elh_t004_akun_matauang_id" class="t004_akun_matauang_id"><?php echo $t004_akun_delete->matauang_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t004_akun_delete->RecordCount = 0;
$i = 0;
while (!$t004_akun_delete->Recordset->EOF) {
	$t004_akun_delete->RecordCount++;
	$t004_akun_delete->RowCount++;

	// Set row properties
	$t004_akun->resetAttributes();
	$t004_akun->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t004_akun_delete->loadRowValues($t004_akun_delete->Recordset);

	// Render row
	$t004_akun_delete->renderRow();
?>
	<tr <?php echo $t004_akun->rowAttributes() ?>>
<?php if ($t004_akun_delete->subgrup_id->Visible) { // subgrup_id ?>
		<td <?php echo $t004_akun_delete->subgrup_id->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_delete->RowCount ?>_t004_akun_subgrup_id" class="t004_akun_subgrup_id">
<span<?php echo $t004_akun_delete->subgrup_id->viewAttributes() ?>><?php echo $t004_akun_delete->subgrup_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_akun_delete->kode->Visible) { // kode ?>
		<td <?php echo $t004_akun_delete->kode->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_delete->RowCount ?>_t004_akun_kode" class="t004_akun_kode">
<span<?php echo $t004_akun_delete->kode->viewAttributes() ?>><?php echo $t004_akun_delete->kode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_akun_delete->nama->Visible) { // nama ?>
		<td <?php echo $t004_akun_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_delete->RowCount ?>_t004_akun_nama" class="t004_akun_nama">
<span<?php echo $t004_akun_delete->nama->viewAttributes() ?>><?php echo $t004_akun_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_akun_delete->matauang_id->Visible) { // matauang_id ?>
		<td <?php echo $t004_akun_delete->matauang_id->cellAttributes() ?>>
<span id="el<?php echo $t004_akun_delete->RowCount ?>_t004_akun_matauang_id" class="t004_akun_matauang_id">
<span<?php echo $t004_akun_delete->matauang_id->viewAttributes() ?>><?php echo $t004_akun_delete->matauang_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t004_akun_delete->Recordset->moveNext();
}
$t004_akun_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_akun_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t004_akun_delete->showPageFooter();
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
$t004_akun_delete->terminate();
?>