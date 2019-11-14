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
$t301_employees_delete = new t301_employees_delete();

// Run the page
$t301_employees_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t301_employees_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft301_employeesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft301_employeesdelete = currentForm = new ew.Form("ft301_employeesdelete", "delete");
	loadjs.done("ft301_employeesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t301_employees_delete->showPageHeader(); ?>
<?php
$t301_employees_delete->showMessage();
?>
<form name="ft301_employeesdelete" id="ft301_employeesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t301_employees">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t301_employees_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t301_employees_delete->EmployeeID->Visible) { // EmployeeID ?>
		<th class="<?php echo $t301_employees_delete->EmployeeID->headerCellClass() ?>"><span id="elh_t301_employees_EmployeeID" class="t301_employees_EmployeeID"><?php echo $t301_employees_delete->EmployeeID->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->LastName->Visible) { // LastName ?>
		<th class="<?php echo $t301_employees_delete->LastName->headerCellClass() ?>"><span id="elh_t301_employees_LastName" class="t301_employees_LastName"><?php echo $t301_employees_delete->LastName->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->FirstName->Visible) { // FirstName ?>
		<th class="<?php echo $t301_employees_delete->FirstName->headerCellClass() ?>"><span id="elh_t301_employees_FirstName" class="t301_employees_FirstName"><?php echo $t301_employees_delete->FirstName->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Title->Visible) { // Title ?>
		<th class="<?php echo $t301_employees_delete->Title->headerCellClass() ?>"><span id="elh_t301_employees_Title" class="t301_employees_Title"><?php echo $t301_employees_delete->Title->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<th class="<?php echo $t301_employees_delete->TitleOfCourtesy->headerCellClass() ?>"><span id="elh_t301_employees_TitleOfCourtesy" class="t301_employees_TitleOfCourtesy"><?php echo $t301_employees_delete->TitleOfCourtesy->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->BirthDate->Visible) { // BirthDate ?>
		<th class="<?php echo $t301_employees_delete->BirthDate->headerCellClass() ?>"><span id="elh_t301_employees_BirthDate" class="t301_employees_BirthDate"><?php echo $t301_employees_delete->BirthDate->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->HireDate->Visible) { // HireDate ?>
		<th class="<?php echo $t301_employees_delete->HireDate->headerCellClass() ?>"><span id="elh_t301_employees_HireDate" class="t301_employees_HireDate"><?php echo $t301_employees_delete->HireDate->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Address->Visible) { // Address ?>
		<th class="<?php echo $t301_employees_delete->Address->headerCellClass() ?>"><span id="elh_t301_employees_Address" class="t301_employees_Address"><?php echo $t301_employees_delete->Address->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->City->Visible) { // City ?>
		<th class="<?php echo $t301_employees_delete->City->headerCellClass() ?>"><span id="elh_t301_employees_City" class="t301_employees_City"><?php echo $t301_employees_delete->City->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Region->Visible) { // Region ?>
		<th class="<?php echo $t301_employees_delete->Region->headerCellClass() ?>"><span id="elh_t301_employees_Region" class="t301_employees_Region"><?php echo $t301_employees_delete->Region->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->PostalCode->Visible) { // PostalCode ?>
		<th class="<?php echo $t301_employees_delete->PostalCode->headerCellClass() ?>"><span id="elh_t301_employees_PostalCode" class="t301_employees_PostalCode"><?php echo $t301_employees_delete->PostalCode->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Country->Visible) { // Country ?>
		<th class="<?php echo $t301_employees_delete->Country->headerCellClass() ?>"><span id="elh_t301_employees_Country" class="t301_employees_Country"><?php echo $t301_employees_delete->Country->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->HomePhone->Visible) { // HomePhone ?>
		<th class="<?php echo $t301_employees_delete->HomePhone->headerCellClass() ?>"><span id="elh_t301_employees_HomePhone" class="t301_employees_HomePhone"><?php echo $t301_employees_delete->HomePhone->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Extension->Visible) { // Extension ?>
		<th class="<?php echo $t301_employees_delete->Extension->headerCellClass() ?>"><span id="elh_t301_employees_Extension" class="t301_employees_Extension"><?php echo $t301_employees_delete->Extension->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->_Email->Visible) { // Email ?>
		<th class="<?php echo $t301_employees_delete->_Email->headerCellClass() ?>"><span id="elh_t301_employees__Email" class="t301_employees__Email"><?php echo $t301_employees_delete->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Photo->Visible) { // Photo ?>
		<th class="<?php echo $t301_employees_delete->Photo->headerCellClass() ?>"><span id="elh_t301_employees_Photo" class="t301_employees_Photo"><?php echo $t301_employees_delete->Photo->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->ReportsTo->Visible) { // ReportsTo ?>
		<th class="<?php echo $t301_employees_delete->ReportsTo->headerCellClass() ?>"><span id="elh_t301_employees_ReportsTo" class="t301_employees_ReportsTo"><?php echo $t301_employees_delete->ReportsTo->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Password->Visible) { // Password ?>
		<th class="<?php echo $t301_employees_delete->Password->headerCellClass() ?>"><span id="elh_t301_employees_Password" class="t301_employees_Password"><?php echo $t301_employees_delete->Password->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->UserLevel->Visible) { // UserLevel ?>
		<th class="<?php echo $t301_employees_delete->UserLevel->headerCellClass() ?>"><span id="elh_t301_employees_UserLevel" class="t301_employees_UserLevel"><?php echo $t301_employees_delete->UserLevel->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Username->Visible) { // Username ?>
		<th class="<?php echo $t301_employees_delete->Username->headerCellClass() ?>"><span id="elh_t301_employees_Username" class="t301_employees_Username"><?php echo $t301_employees_delete->Username->caption() ?></span></th>
<?php } ?>
<?php if ($t301_employees_delete->Activated->Visible) { // Activated ?>
		<th class="<?php echo $t301_employees_delete->Activated->headerCellClass() ?>"><span id="elh_t301_employees_Activated" class="t301_employees_Activated"><?php echo $t301_employees_delete->Activated->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t301_employees_delete->RecordCount = 0;
$i = 0;
while (!$t301_employees_delete->Recordset->EOF) {
	$t301_employees_delete->RecordCount++;
	$t301_employees_delete->RowCount++;

	// Set row properties
	$t301_employees->resetAttributes();
	$t301_employees->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t301_employees_delete->loadRowValues($t301_employees_delete->Recordset);

	// Render row
	$t301_employees_delete->renderRow();
?>
	<tr <?php echo $t301_employees->rowAttributes() ?>>
<?php if ($t301_employees_delete->EmployeeID->Visible) { // EmployeeID ?>
		<td <?php echo $t301_employees_delete->EmployeeID->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_EmployeeID" class="t301_employees_EmployeeID">
<span<?php echo $t301_employees_delete->EmployeeID->viewAttributes() ?>><?php echo $t301_employees_delete->EmployeeID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->LastName->Visible) { // LastName ?>
		<td <?php echo $t301_employees_delete->LastName->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_LastName" class="t301_employees_LastName">
<span<?php echo $t301_employees_delete->LastName->viewAttributes() ?>><?php echo $t301_employees_delete->LastName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->FirstName->Visible) { // FirstName ?>
		<td <?php echo $t301_employees_delete->FirstName->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_FirstName" class="t301_employees_FirstName">
<span<?php echo $t301_employees_delete->FirstName->viewAttributes() ?>><?php echo $t301_employees_delete->FirstName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Title->Visible) { // Title ?>
		<td <?php echo $t301_employees_delete->Title->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Title" class="t301_employees_Title">
<span<?php echo $t301_employees_delete->Title->viewAttributes() ?>><?php echo $t301_employees_delete->Title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
		<td <?php echo $t301_employees_delete->TitleOfCourtesy->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_TitleOfCourtesy" class="t301_employees_TitleOfCourtesy">
<span<?php echo $t301_employees_delete->TitleOfCourtesy->viewAttributes() ?>><?php echo $t301_employees_delete->TitleOfCourtesy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->BirthDate->Visible) { // BirthDate ?>
		<td <?php echo $t301_employees_delete->BirthDate->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_BirthDate" class="t301_employees_BirthDate">
<span<?php echo $t301_employees_delete->BirthDate->viewAttributes() ?>><?php echo $t301_employees_delete->BirthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->HireDate->Visible) { // HireDate ?>
		<td <?php echo $t301_employees_delete->HireDate->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_HireDate" class="t301_employees_HireDate">
<span<?php echo $t301_employees_delete->HireDate->viewAttributes() ?>><?php echo $t301_employees_delete->HireDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Address->Visible) { // Address ?>
		<td <?php echo $t301_employees_delete->Address->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Address" class="t301_employees_Address">
<span<?php echo $t301_employees_delete->Address->viewAttributes() ?>><?php echo $t301_employees_delete->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->City->Visible) { // City ?>
		<td <?php echo $t301_employees_delete->City->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_City" class="t301_employees_City">
<span<?php echo $t301_employees_delete->City->viewAttributes() ?>><?php echo $t301_employees_delete->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Region->Visible) { // Region ?>
		<td <?php echo $t301_employees_delete->Region->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Region" class="t301_employees_Region">
<span<?php echo $t301_employees_delete->Region->viewAttributes() ?>><?php echo $t301_employees_delete->Region->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->PostalCode->Visible) { // PostalCode ?>
		<td <?php echo $t301_employees_delete->PostalCode->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_PostalCode" class="t301_employees_PostalCode">
<span<?php echo $t301_employees_delete->PostalCode->viewAttributes() ?>><?php echo $t301_employees_delete->PostalCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Country->Visible) { // Country ?>
		<td <?php echo $t301_employees_delete->Country->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Country" class="t301_employees_Country">
<span<?php echo $t301_employees_delete->Country->viewAttributes() ?>><?php echo $t301_employees_delete->Country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->HomePhone->Visible) { // HomePhone ?>
		<td <?php echo $t301_employees_delete->HomePhone->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_HomePhone" class="t301_employees_HomePhone">
<span<?php echo $t301_employees_delete->HomePhone->viewAttributes() ?>><?php echo $t301_employees_delete->HomePhone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Extension->Visible) { // Extension ?>
		<td <?php echo $t301_employees_delete->Extension->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Extension" class="t301_employees_Extension">
<span<?php echo $t301_employees_delete->Extension->viewAttributes() ?>><?php echo $t301_employees_delete->Extension->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->_Email->Visible) { // Email ?>
		<td <?php echo $t301_employees_delete->_Email->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees__Email" class="t301_employees__Email">
<span<?php echo $t301_employees_delete->_Email->viewAttributes() ?>><?php echo $t301_employees_delete->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Photo->Visible) { // Photo ?>
		<td <?php echo $t301_employees_delete->Photo->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Photo" class="t301_employees_Photo">
<span<?php echo $t301_employees_delete->Photo->viewAttributes() ?>><?php echo $t301_employees_delete->Photo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->ReportsTo->Visible) { // ReportsTo ?>
		<td <?php echo $t301_employees_delete->ReportsTo->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_ReportsTo" class="t301_employees_ReportsTo">
<span<?php echo $t301_employees_delete->ReportsTo->viewAttributes() ?>><?php echo $t301_employees_delete->ReportsTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Password->Visible) { // Password ?>
		<td <?php echo $t301_employees_delete->Password->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Password" class="t301_employees_Password">
<span<?php echo $t301_employees_delete->Password->viewAttributes() ?>><?php echo $t301_employees_delete->Password->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->UserLevel->Visible) { // UserLevel ?>
		<td <?php echo $t301_employees_delete->UserLevel->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_UserLevel" class="t301_employees_UserLevel">
<span<?php echo $t301_employees_delete->UserLevel->viewAttributes() ?>><?php echo $t301_employees_delete->UserLevel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Username->Visible) { // Username ?>
		<td <?php echo $t301_employees_delete->Username->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Username" class="t301_employees_Username">
<span<?php echo $t301_employees_delete->Username->viewAttributes() ?>><?php echo $t301_employees_delete->Username->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t301_employees_delete->Activated->Visible) { // Activated ?>
		<td <?php echo $t301_employees_delete->Activated->cellAttributes() ?>>
<span id="el<?php echo $t301_employees_delete->RowCount ?>_t301_employees_Activated" class="t301_employees_Activated">
<span<?php echo $t301_employees_delete->Activated->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_Activated" class="custom-control-input" value="<?php echo $t301_employees_delete->Activated->getViewValue() ?>" disabled<?php if (ConvertToBool($t301_employees_delete->Activated->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_Activated"></label></div></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t301_employees_delete->Recordset->moveNext();
}
$t301_employees_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t301_employees_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t301_employees_delete->showPageFooter();
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
$t301_employees_delete->terminate();
?>