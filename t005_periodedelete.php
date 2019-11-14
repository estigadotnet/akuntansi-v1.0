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
$t005_periode_delete = new t005_periode_delete();

// Run the page
$t005_periode_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_periode_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_periodedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft005_periodedelete = currentForm = new ew.Form("ft005_periodedelete", "delete");
	loadjs.done("ft005_periodedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_periode_delete->showPageHeader(); ?>
<?php
$t005_periode_delete->showMessage();
?>
<form name="ft005_periodedelete" id="ft005_periodedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_periode">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t005_periode_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t005_periode_delete->start->Visible) { // start ?>
		<th class="<?php echo $t005_periode_delete->start->headerCellClass() ?>"><span id="elh_t005_periode_start" class="t005_periode_start"><?php echo $t005_periode_delete->start->caption() ?></span></th>
<?php } ?>
<?php if ($t005_periode_delete->end->Visible) { // end ?>
		<th class="<?php echo $t005_periode_delete->end->headerCellClass() ?>"><span id="elh_t005_periode_end" class="t005_periode_end"><?php echo $t005_periode_delete->end->caption() ?></span></th>
<?php } ?>
<?php if ($t005_periode_delete->isaktif->Visible) { // isaktif ?>
		<th class="<?php echo $t005_periode_delete->isaktif->headerCellClass() ?>"><span id="elh_t005_periode_isaktif" class="t005_periode_isaktif"><?php echo $t005_periode_delete->isaktif->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t005_periode_delete->RecordCount = 0;
$i = 0;
while (!$t005_periode_delete->Recordset->EOF) {
	$t005_periode_delete->RecordCount++;
	$t005_periode_delete->RowCount++;

	// Set row properties
	$t005_periode->resetAttributes();
	$t005_periode->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t005_periode_delete->loadRowValues($t005_periode_delete->Recordset);

	// Render row
	$t005_periode_delete->renderRow();
?>
	<tr <?php echo $t005_periode->rowAttributes() ?>>
<?php if ($t005_periode_delete->start->Visible) { // start ?>
		<td <?php echo $t005_periode_delete->start->cellAttributes() ?>>
<span id="el<?php echo $t005_periode_delete->RowCount ?>_t005_periode_start" class="t005_periode_start">
<span<?php echo $t005_periode_delete->start->viewAttributes() ?>><?php echo $t005_periode_delete->start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_periode_delete->end->Visible) { // end ?>
		<td <?php echo $t005_periode_delete->end->cellAttributes() ?>>
<span id="el<?php echo $t005_periode_delete->RowCount ?>_t005_periode_end" class="t005_periode_end">
<span<?php echo $t005_periode_delete->end->viewAttributes() ?>><?php echo $t005_periode_delete->end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_periode_delete->isaktif->Visible) { // isaktif ?>
		<td <?php echo $t005_periode_delete->isaktif->cellAttributes() ?>>
<span id="el<?php echo $t005_periode_delete->RowCount ?>_t005_periode_isaktif" class="t005_periode_isaktif">
<span<?php echo $t005_periode_delete->isaktif->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isaktif" class="custom-control-input" value="<?php echo $t005_periode_delete->isaktif->getViewValue() ?>" disabled<?php if (ConvertToBool($t005_periode_delete->isaktif->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isaktif"></label></div></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t005_periode_delete->Recordset->moveNext();
}
$t005_periode_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_periode_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t005_periode_delete->showPageFooter();
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
$t005_periode_delete->terminate();
?>