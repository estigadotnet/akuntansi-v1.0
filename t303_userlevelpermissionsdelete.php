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
$t303_userlevelpermissions_delete = new t303_userlevelpermissions_delete();

// Run the page
$t303_userlevelpermissions_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t303_userlevelpermissions_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft303_userlevelpermissionsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft303_userlevelpermissionsdelete = currentForm = new ew.Form("ft303_userlevelpermissionsdelete", "delete");
	loadjs.done("ft303_userlevelpermissionsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t303_userlevelpermissions_delete->showPageHeader(); ?>
<?php
$t303_userlevelpermissions_delete->showMessage();
?>
<form name="ft303_userlevelpermissionsdelete" id="ft303_userlevelpermissionsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t303_userlevelpermissions">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t303_userlevelpermissions_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t303_userlevelpermissions_delete->userlevelid->Visible) { // userlevelid ?>
		<th class="<?php echo $t303_userlevelpermissions_delete->userlevelid->headerCellClass() ?>"><span id="elh_t303_userlevelpermissions_userlevelid" class="t303_userlevelpermissions_userlevelid"><?php echo $t303_userlevelpermissions_delete->userlevelid->caption() ?></span></th>
<?php } ?>
<?php if ($t303_userlevelpermissions_delete->_tablename->Visible) { // tablename ?>
		<th class="<?php echo $t303_userlevelpermissions_delete->_tablename->headerCellClass() ?>"><span id="elh_t303_userlevelpermissions__tablename" class="t303_userlevelpermissions__tablename"><?php echo $t303_userlevelpermissions_delete->_tablename->caption() ?></span></th>
<?php } ?>
<?php if ($t303_userlevelpermissions_delete->permission->Visible) { // permission ?>
		<th class="<?php echo $t303_userlevelpermissions_delete->permission->headerCellClass() ?>"><span id="elh_t303_userlevelpermissions_permission" class="t303_userlevelpermissions_permission"><?php echo $t303_userlevelpermissions_delete->permission->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t303_userlevelpermissions_delete->RecordCount = 0;
$i = 0;
while (!$t303_userlevelpermissions_delete->Recordset->EOF) {
	$t303_userlevelpermissions_delete->RecordCount++;
	$t303_userlevelpermissions_delete->RowCount++;

	// Set row properties
	$t303_userlevelpermissions->resetAttributes();
	$t303_userlevelpermissions->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t303_userlevelpermissions_delete->loadRowValues($t303_userlevelpermissions_delete->Recordset);

	// Render row
	$t303_userlevelpermissions_delete->renderRow();
?>
	<tr <?php echo $t303_userlevelpermissions->rowAttributes() ?>>
<?php if ($t303_userlevelpermissions_delete->userlevelid->Visible) { // userlevelid ?>
		<td <?php echo $t303_userlevelpermissions_delete->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t303_userlevelpermissions_delete->RowCount ?>_t303_userlevelpermissions_userlevelid" class="t303_userlevelpermissions_userlevelid">
<span<?php echo $t303_userlevelpermissions_delete->userlevelid->viewAttributes() ?>><?php echo $t303_userlevelpermissions_delete->userlevelid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t303_userlevelpermissions_delete->_tablename->Visible) { // tablename ?>
		<td <?php echo $t303_userlevelpermissions_delete->_tablename->cellAttributes() ?>>
<span id="el<?php echo $t303_userlevelpermissions_delete->RowCount ?>_t303_userlevelpermissions__tablename" class="t303_userlevelpermissions__tablename">
<span<?php echo $t303_userlevelpermissions_delete->_tablename->viewAttributes() ?>><?php echo $t303_userlevelpermissions_delete->_tablename->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t303_userlevelpermissions_delete->permission->Visible) { // permission ?>
		<td <?php echo $t303_userlevelpermissions_delete->permission->cellAttributes() ?>>
<span id="el<?php echo $t303_userlevelpermissions_delete->RowCount ?>_t303_userlevelpermissions_permission" class="t303_userlevelpermissions_permission">
<span<?php echo $t303_userlevelpermissions_delete->permission->viewAttributes() ?>><?php echo $t303_userlevelpermissions_delete->permission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t303_userlevelpermissions_delete->Recordset->moveNext();
}
$t303_userlevelpermissions_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t303_userlevelpermissions_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t303_userlevelpermissions_delete->showPageFooter();
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
$t303_userlevelpermissions_delete->terminate();
?>