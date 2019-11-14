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
$t302_userlevels_delete = new t302_userlevels_delete();

// Run the page
$t302_userlevels_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t302_userlevels_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft302_userlevelsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft302_userlevelsdelete = currentForm = new ew.Form("ft302_userlevelsdelete", "delete");
	loadjs.done("ft302_userlevelsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t302_userlevels_delete->showPageHeader(); ?>
<?php
$t302_userlevels_delete->showMessage();
?>
<form name="ft302_userlevelsdelete" id="ft302_userlevelsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t302_userlevels">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t302_userlevels_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t302_userlevels_delete->userlevelid->Visible) { // userlevelid ?>
		<th class="<?php echo $t302_userlevels_delete->userlevelid->headerCellClass() ?>"><span id="elh_t302_userlevels_userlevelid" class="t302_userlevels_userlevelid"><?php echo $t302_userlevels_delete->userlevelid->caption() ?></span></th>
<?php } ?>
<?php if ($t302_userlevels_delete->userlevelname->Visible) { // userlevelname ?>
		<th class="<?php echo $t302_userlevels_delete->userlevelname->headerCellClass() ?>"><span id="elh_t302_userlevels_userlevelname" class="t302_userlevels_userlevelname"><?php echo $t302_userlevels_delete->userlevelname->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t302_userlevels_delete->RecordCount = 0;
$i = 0;
while (!$t302_userlevels_delete->Recordset->EOF) {
	$t302_userlevels_delete->RecordCount++;
	$t302_userlevels_delete->RowCount++;

	// Set row properties
	$t302_userlevels->resetAttributes();
	$t302_userlevels->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t302_userlevels_delete->loadRowValues($t302_userlevels_delete->Recordset);

	// Render row
	$t302_userlevels_delete->renderRow();
?>
	<tr <?php echo $t302_userlevels->rowAttributes() ?>>
<?php if ($t302_userlevels_delete->userlevelid->Visible) { // userlevelid ?>
		<td <?php echo $t302_userlevels_delete->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t302_userlevels_delete->RowCount ?>_t302_userlevels_userlevelid" class="t302_userlevels_userlevelid">
<span<?php echo $t302_userlevels_delete->userlevelid->viewAttributes() ?>><?php echo $t302_userlevels_delete->userlevelid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t302_userlevels_delete->userlevelname->Visible) { // userlevelname ?>
		<td <?php echo $t302_userlevels_delete->userlevelname->cellAttributes() ?>>
<span id="el<?php echo $t302_userlevels_delete->RowCount ?>_t302_userlevels_userlevelname" class="t302_userlevels_userlevelname">
<span<?php echo $t302_userlevels_delete->userlevelname->viewAttributes() ?>><?php echo $t302_userlevels_delete->userlevelname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t302_userlevels_delete->Recordset->moveNext();
}
$t302_userlevels_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t302_userlevels_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t302_userlevels_delete->showPageFooter();
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
$t302_userlevels_delete->terminate();
?>