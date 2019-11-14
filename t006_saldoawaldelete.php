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
$t006_saldoawal_delete = new t006_saldoawal_delete();

// Run the page
$t006_saldoawal_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_saldoawal_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft006_saldoawaldelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft006_saldoawaldelete = currentForm = new ew.Form("ft006_saldoawaldelete", "delete");
	loadjs.done("ft006_saldoawaldelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t006_saldoawal_delete->showPageHeader(); ?>
<?php
$t006_saldoawal_delete->showMessage();
?>
<form name="ft006_saldoawaldelete" id="ft006_saldoawaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_saldoawal">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t006_saldoawal_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t006_saldoawal_delete->periode_id->Visible) { // periode_id ?>
		<th class="<?php echo $t006_saldoawal_delete->periode_id->headerCellClass() ?>"><span id="elh_t006_saldoawal_periode_id" class="t006_saldoawal_periode_id"><?php echo $t006_saldoawal_delete->periode_id->caption() ?></span></th>
<?php } ?>
<?php if ($t006_saldoawal_delete->akun_id->Visible) { // akun_id ?>
		<th class="<?php echo $t006_saldoawal_delete->akun_id->headerCellClass() ?>"><span id="elh_t006_saldoawal_akun_id" class="t006_saldoawal_akun_id"><?php echo $t006_saldoawal_delete->akun_id->caption() ?></span></th>
<?php } ?>
<?php if ($t006_saldoawal_delete->debet->Visible) { // debet ?>
		<th class="<?php echo $t006_saldoawal_delete->debet->headerCellClass() ?>"><span id="elh_t006_saldoawal_debet" class="t006_saldoawal_debet"><?php echo $t006_saldoawal_delete->debet->caption() ?></span></th>
<?php } ?>
<?php if ($t006_saldoawal_delete->kredit->Visible) { // kredit ?>
		<th class="<?php echo $t006_saldoawal_delete->kredit->headerCellClass() ?>"><span id="elh_t006_saldoawal_kredit" class="t006_saldoawal_kredit"><?php echo $t006_saldoawal_delete->kredit->caption() ?></span></th>
<?php } ?>
<?php if ($t006_saldoawal_delete->saldo->Visible) { // saldo ?>
		<th class="<?php echo $t006_saldoawal_delete->saldo->headerCellClass() ?>"><span id="elh_t006_saldoawal_saldo" class="t006_saldoawal_saldo"><?php echo $t006_saldoawal_delete->saldo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t006_saldoawal_delete->RecordCount = 0;
$i = 0;
while (!$t006_saldoawal_delete->Recordset->EOF) {
	$t006_saldoawal_delete->RecordCount++;
	$t006_saldoawal_delete->RowCount++;

	// Set row properties
	$t006_saldoawal->resetAttributes();
	$t006_saldoawal->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t006_saldoawal_delete->loadRowValues($t006_saldoawal_delete->Recordset);

	// Render row
	$t006_saldoawal_delete->renderRow();
?>
	<tr <?php echo $t006_saldoawal->rowAttributes() ?>>
<?php if ($t006_saldoawal_delete->periode_id->Visible) { // periode_id ?>
		<td <?php echo $t006_saldoawal_delete->periode_id->cellAttributes() ?>>
<span id="el<?php echo $t006_saldoawal_delete->RowCount ?>_t006_saldoawal_periode_id" class="t006_saldoawal_periode_id">
<span<?php echo $t006_saldoawal_delete->periode_id->viewAttributes() ?>><?php echo $t006_saldoawal_delete->periode_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_saldoawal_delete->akun_id->Visible) { // akun_id ?>
		<td <?php echo $t006_saldoawal_delete->akun_id->cellAttributes() ?>>
<span id="el<?php echo $t006_saldoawal_delete->RowCount ?>_t006_saldoawal_akun_id" class="t006_saldoawal_akun_id">
<span<?php echo $t006_saldoawal_delete->akun_id->viewAttributes() ?>><?php echo $t006_saldoawal_delete->akun_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_saldoawal_delete->debet->Visible) { // debet ?>
		<td <?php echo $t006_saldoawal_delete->debet->cellAttributes() ?>>
<span id="el<?php echo $t006_saldoawal_delete->RowCount ?>_t006_saldoawal_debet" class="t006_saldoawal_debet">
<span<?php echo $t006_saldoawal_delete->debet->viewAttributes() ?>><?php echo $t006_saldoawal_delete->debet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_saldoawal_delete->kredit->Visible) { // kredit ?>
		<td <?php echo $t006_saldoawal_delete->kredit->cellAttributes() ?>>
<span id="el<?php echo $t006_saldoawal_delete->RowCount ?>_t006_saldoawal_kredit" class="t006_saldoawal_kredit">
<span<?php echo $t006_saldoawal_delete->kredit->viewAttributes() ?>><?php echo $t006_saldoawal_delete->kredit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_saldoawal_delete->saldo->Visible) { // saldo ?>
		<td <?php echo $t006_saldoawal_delete->saldo->cellAttributes() ?>>
<span id="el<?php echo $t006_saldoawal_delete->RowCount ?>_t006_saldoawal_saldo" class="t006_saldoawal_saldo">
<span<?php echo $t006_saldoawal_delete->saldo->viewAttributes() ?>><?php echo $t006_saldoawal_delete->saldo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t006_saldoawal_delete->Recordset->moveNext();
}
$t006_saldoawal_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_saldoawal_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t006_saldoawal_delete->showPageFooter();
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
$t006_saldoawal_delete->terminate();
?>