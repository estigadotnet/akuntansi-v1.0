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
$t001_grup_delete = new t001_grup_delete();

// Run the page
$t001_grup_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_grup_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft001_grupdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft001_grupdelete = currentForm = new ew.Form("ft001_grupdelete", "delete");
	loadjs.done("ft001_grupdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_grup_delete->showPageHeader(); ?>
<?php
$t001_grup_delete->showMessage();
?>
<form name="ft001_grupdelete" id="ft001_grupdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_grup">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t001_grup_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t001_grup_delete->name->Visible) { // name ?>
		<th class="<?php echo $t001_grup_delete->name->headerCellClass() ?>"><span id="elh_t001_grup_name" class="t001_grup_name"><?php echo $t001_grup_delete->name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t001_grup_delete->RecordCount = 0;
$i = 0;
while (!$t001_grup_delete->Recordset->EOF) {
	$t001_grup_delete->RecordCount++;
	$t001_grup_delete->RowCount++;

	// Set row properties
	$t001_grup->resetAttributes();
	$t001_grup->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t001_grup_delete->loadRowValues($t001_grup_delete->Recordset);

	// Render row
	$t001_grup_delete->renderRow();
?>
	<tr <?php echo $t001_grup->rowAttributes() ?>>
<?php if ($t001_grup_delete->name->Visible) { // name ?>
		<td <?php echo $t001_grup_delete->name->cellAttributes() ?>>
<span id="el<?php echo $t001_grup_delete->RowCount ?>_t001_grup_name" class="t001_grup_name">
<span<?php echo $t001_grup_delete->name->viewAttributes() ?>><?php echo $t001_grup_delete->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t001_grup_delete->Recordset->moveNext();
}
$t001_grup_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t001_grup_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t001_grup_delete->showPageFooter();
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
$t001_grup_delete->terminate();
?>