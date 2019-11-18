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
$t301_employees_view = new t301_employees_view();

// Run the page
$t301_employees_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t301_employees_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t301_employees_view->isExport()) { ?>
<script>
var ft301_employeesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft301_employeesview = currentForm = new ew.Form("ft301_employeesview", "view");
	loadjs.done("ft301_employeesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t301_employees_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t301_employees_view->ExportOptions->render("body") ?>
<?php $t301_employees_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t301_employees_view->showPageHeader(); ?>
<?php
$t301_employees_view->showMessage();
?>
<?php if (!$t301_employees_view->IsModal) { ?>
<?php if (!$t301_employees_view->isExport()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t301_employees_view->Pager->render() ?>
<div class="clearfix"></div>
</form>
<?php } ?>
<?php } ?>
<form name="ft301_employeesview" id="ft301_employeesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t301_employees">
<input type="hidden" name="modal" value="<?php echo (int)$t301_employees_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t301_employees_view->EmployeeID->Visible) { // EmployeeID ?>
	<tr id="r_EmployeeID">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_EmployeeID"><?php echo $t301_employees_view->EmployeeID->caption() ?></span></td>
		<td data-name="EmployeeID" <?php echo $t301_employees_view->EmployeeID->cellAttributes() ?>>
<span id="el_t301_employees_EmployeeID">
<span<?php echo $t301_employees_view->EmployeeID->viewAttributes() ?>><?php echo $t301_employees_view->EmployeeID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->LastName->Visible) { // LastName ?>
	<tr id="r_LastName">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_LastName"><?php echo $t301_employees_view->LastName->caption() ?></span></td>
		<td data-name="LastName" <?php echo $t301_employees_view->LastName->cellAttributes() ?>>
<span id="el_t301_employees_LastName">
<span<?php echo $t301_employees_view->LastName->viewAttributes() ?>><?php echo $t301_employees_view->LastName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->FirstName->Visible) { // FirstName ?>
	<tr id="r_FirstName">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_FirstName"><?php echo $t301_employees_view->FirstName->caption() ?></span></td>
		<td data-name="FirstName" <?php echo $t301_employees_view->FirstName->cellAttributes() ?>>
<span id="el_t301_employees_FirstName">
<span<?php echo $t301_employees_view->FirstName->viewAttributes() ?>><?php echo $t301_employees_view->FirstName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Title->Visible) { // Title ?>
	<tr id="r_Title">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Title"><?php echo $t301_employees_view->Title->caption() ?></span></td>
		<td data-name="Title" <?php echo $t301_employees_view->Title->cellAttributes() ?>>
<span id="el_t301_employees_Title">
<span<?php echo $t301_employees_view->Title->viewAttributes() ?>><?php echo $t301_employees_view->Title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->TitleOfCourtesy->Visible) { // TitleOfCourtesy ?>
	<tr id="r_TitleOfCourtesy">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_TitleOfCourtesy"><?php echo $t301_employees_view->TitleOfCourtesy->caption() ?></span></td>
		<td data-name="TitleOfCourtesy" <?php echo $t301_employees_view->TitleOfCourtesy->cellAttributes() ?>>
<span id="el_t301_employees_TitleOfCourtesy">
<span<?php echo $t301_employees_view->TitleOfCourtesy->viewAttributes() ?>><?php echo $t301_employees_view->TitleOfCourtesy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->BirthDate->Visible) { // BirthDate ?>
	<tr id="r_BirthDate">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_BirthDate"><?php echo $t301_employees_view->BirthDate->caption() ?></span></td>
		<td data-name="BirthDate" <?php echo $t301_employees_view->BirthDate->cellAttributes() ?>>
<span id="el_t301_employees_BirthDate">
<span<?php echo $t301_employees_view->BirthDate->viewAttributes() ?>><?php echo $t301_employees_view->BirthDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->HireDate->Visible) { // HireDate ?>
	<tr id="r_HireDate">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_HireDate"><?php echo $t301_employees_view->HireDate->caption() ?></span></td>
		<td data-name="HireDate" <?php echo $t301_employees_view->HireDate->cellAttributes() ?>>
<span id="el_t301_employees_HireDate">
<span<?php echo $t301_employees_view->HireDate->viewAttributes() ?>><?php echo $t301_employees_view->HireDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Address"><?php echo $t301_employees_view->Address->caption() ?></span></td>
		<td data-name="Address" <?php echo $t301_employees_view->Address->cellAttributes() ?>>
<span id="el_t301_employees_Address">
<span<?php echo $t301_employees_view->Address->viewAttributes() ?>><?php echo $t301_employees_view->Address->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->City->Visible) { // City ?>
	<tr id="r_City">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_City"><?php echo $t301_employees_view->City->caption() ?></span></td>
		<td data-name="City" <?php echo $t301_employees_view->City->cellAttributes() ?>>
<span id="el_t301_employees_City">
<span<?php echo $t301_employees_view->City->viewAttributes() ?>><?php echo $t301_employees_view->City->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Region->Visible) { // Region ?>
	<tr id="r_Region">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Region"><?php echo $t301_employees_view->Region->caption() ?></span></td>
		<td data-name="Region" <?php echo $t301_employees_view->Region->cellAttributes() ?>>
<span id="el_t301_employees_Region">
<span<?php echo $t301_employees_view->Region->viewAttributes() ?>><?php echo $t301_employees_view->Region->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->PostalCode->Visible) { // PostalCode ?>
	<tr id="r_PostalCode">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_PostalCode"><?php echo $t301_employees_view->PostalCode->caption() ?></span></td>
		<td data-name="PostalCode" <?php echo $t301_employees_view->PostalCode->cellAttributes() ?>>
<span id="el_t301_employees_PostalCode">
<span<?php echo $t301_employees_view->PostalCode->viewAttributes() ?>><?php echo $t301_employees_view->PostalCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Country->Visible) { // Country ?>
	<tr id="r_Country">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Country"><?php echo $t301_employees_view->Country->caption() ?></span></td>
		<td data-name="Country" <?php echo $t301_employees_view->Country->cellAttributes() ?>>
<span id="el_t301_employees_Country">
<span<?php echo $t301_employees_view->Country->viewAttributes() ?>><?php echo $t301_employees_view->Country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->HomePhone->Visible) { // HomePhone ?>
	<tr id="r_HomePhone">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_HomePhone"><?php echo $t301_employees_view->HomePhone->caption() ?></span></td>
		<td data-name="HomePhone" <?php echo $t301_employees_view->HomePhone->cellAttributes() ?>>
<span id="el_t301_employees_HomePhone">
<span<?php echo $t301_employees_view->HomePhone->viewAttributes() ?>><?php echo $t301_employees_view->HomePhone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Extension->Visible) { // Extension ?>
	<tr id="r_Extension">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Extension"><?php echo $t301_employees_view->Extension->caption() ?></span></td>
		<td data-name="Extension" <?php echo $t301_employees_view->Extension->cellAttributes() ?>>
<span id="el_t301_employees_Extension">
<span<?php echo $t301_employees_view->Extension->viewAttributes() ?>><?php echo $t301_employees_view->Extension->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->_Email->Visible) { // Email ?>
	<tr id="r__Email">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees__Email"><?php echo $t301_employees_view->_Email->caption() ?></span></td>
		<td data-name="_Email" <?php echo $t301_employees_view->_Email->cellAttributes() ?>>
<span id="el_t301_employees__Email">
<span<?php echo $t301_employees_view->_Email->viewAttributes() ?>><?php echo $t301_employees_view->_Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Photo->Visible) { // Photo ?>
	<tr id="r_Photo">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Photo"><?php echo $t301_employees_view->Photo->caption() ?></span></td>
		<td data-name="Photo" <?php echo $t301_employees_view->Photo->cellAttributes() ?>>
<span id="el_t301_employees_Photo">
<span<?php echo $t301_employees_view->Photo->viewAttributes() ?>><?php echo $t301_employees_view->Photo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Notes->Visible) { // Notes ?>
	<tr id="r_Notes">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Notes"><?php echo $t301_employees_view->Notes->caption() ?></span></td>
		<td data-name="Notes" <?php echo $t301_employees_view->Notes->cellAttributes() ?>>
<span id="el_t301_employees_Notes">
<span<?php echo $t301_employees_view->Notes->viewAttributes() ?>><?php echo $t301_employees_view->Notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->ReportsTo->Visible) { // ReportsTo ?>
	<tr id="r_ReportsTo">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_ReportsTo"><?php echo $t301_employees_view->ReportsTo->caption() ?></span></td>
		<td data-name="ReportsTo" <?php echo $t301_employees_view->ReportsTo->cellAttributes() ?>>
<span id="el_t301_employees_ReportsTo">
<span<?php echo $t301_employees_view->ReportsTo->viewAttributes() ?>><?php echo $t301_employees_view->ReportsTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Password->Visible) { // Password ?>
	<tr id="r_Password">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Password"><?php echo $t301_employees_view->Password->caption() ?></span></td>
		<td data-name="Password" <?php echo $t301_employees_view->Password->cellAttributes() ?>>
<span id="el_t301_employees_Password">
<span<?php echo $t301_employees_view->Password->viewAttributes() ?>><?php echo $t301_employees_view->Password->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->UserLevel->Visible) { // UserLevel ?>
	<tr id="r_UserLevel">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_UserLevel"><?php echo $t301_employees_view->UserLevel->caption() ?></span></td>
		<td data-name="UserLevel" <?php echo $t301_employees_view->UserLevel->cellAttributes() ?>>
<span id="el_t301_employees_UserLevel">
<span<?php echo $t301_employees_view->UserLevel->viewAttributes() ?>><?php echo $t301_employees_view->UserLevel->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Username->Visible) { // Username ?>
	<tr id="r_Username">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Username"><?php echo $t301_employees_view->Username->caption() ?></span></td>
		<td data-name="Username" <?php echo $t301_employees_view->Username->cellAttributes() ?>>
<span id="el_t301_employees_Username">
<span<?php echo $t301_employees_view->Username->viewAttributes() ?>><?php echo $t301_employees_view->Username->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Activated->Visible) { // Activated ?>
	<tr id="r_Activated">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Activated"><?php echo $t301_employees_view->Activated->caption() ?></span></td>
		<td data-name="Activated" <?php echo $t301_employees_view->Activated->cellAttributes() ?>>
<span id="el_t301_employees_Activated">
<span<?php echo $t301_employees_view->Activated->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_Activated" class="custom-control-input" value="<?php echo $t301_employees_view->Activated->getViewValue() ?>" disabled<?php if (ConvertToBool($t301_employees_view->Activated->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_Activated"></label></div></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t301_employees_view->Profile->Visible) { // Profile ?>
	<tr id="r_Profile">
		<td class="<?php echo $t301_employees_view->TableLeftColumnClass ?>"><span id="elh_t301_employees_Profile"><?php echo $t301_employees_view->Profile->caption() ?></span></td>
		<td data-name="Profile" <?php echo $t301_employees_view->Profile->cellAttributes() ?>>
<span id="el_t301_employees_Profile">
<span<?php echo $t301_employees_view->Profile->viewAttributes() ?>><?php echo $t301_employees_view->Profile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t301_employees_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t301_employees_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t301_employees_view->terminate();
?>