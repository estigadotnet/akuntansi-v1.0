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
$t304_audittrail_view = new t304_audittrail_view();

// Run the page
$t304_audittrail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t304_audittrail_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t304_audittrail_view->isExport()) { ?>
<script>
var ft304_audittrailview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft304_audittrailview = currentForm = new ew.Form("ft304_audittrailview", "view");
	loadjs.done("ft304_audittrailview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t304_audittrail_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t304_audittrail_view->ExportOptions->render("body") ?>
<?php $t304_audittrail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t304_audittrail_view->showPageHeader(); ?>
<?php
$t304_audittrail_view->showMessage();
?>
<?php if (!$t304_audittrail_view->IsModal) { ?>
<?php if (!$t304_audittrail_view->isExport()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t304_audittrail_view->Pager->render() ?>
<div class="clearfix"></div>
</form>
<?php } ?>
<?php } ?>
<form name="ft304_audittrailview" id="ft304_audittrailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t304_audittrail">
<input type="hidden" name="modal" value="<?php echo (int)$t304_audittrail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t304_audittrail_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_id"><?php echo $t304_audittrail_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t304_audittrail_view->id->cellAttributes() ?>>
<span id="el_t304_audittrail_id">
<span<?php echo $t304_audittrail_view->id->viewAttributes() ?>><?php echo $t304_audittrail_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_datetime"><?php echo $t304_audittrail_view->datetime->caption() ?></span></td>
		<td data-name="datetime" <?php echo $t304_audittrail_view->datetime->cellAttributes() ?>>
<span id="el_t304_audittrail_datetime">
<span<?php echo $t304_audittrail_view->datetime->viewAttributes() ?>><?php echo $t304_audittrail_view->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->script->Visible) { // script ?>
	<tr id="r_script">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_script"><?php echo $t304_audittrail_view->script->caption() ?></span></td>
		<td data-name="script" <?php echo $t304_audittrail_view->script->cellAttributes() ?>>
<span id="el_t304_audittrail_script">
<span<?php echo $t304_audittrail_view->script->viewAttributes() ?>><?php echo $t304_audittrail_view->script->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->user->Visible) { // user ?>
	<tr id="r_user">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_user"><?php echo $t304_audittrail_view->user->caption() ?></span></td>
		<td data-name="user" <?php echo $t304_audittrail_view->user->cellAttributes() ?>>
<span id="el_t304_audittrail_user">
<span<?php echo $t304_audittrail_view->user->viewAttributes() ?>><?php echo $t304_audittrail_view->user->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->_action->Visible) { // action ?>
	<tr id="r__action">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail__action"><?php echo $t304_audittrail_view->_action->caption() ?></span></td>
		<td data-name="_action" <?php echo $t304_audittrail_view->_action->cellAttributes() ?>>
<span id="el_t304_audittrail__action">
<span<?php echo $t304_audittrail_view->_action->viewAttributes() ?>><?php echo $t304_audittrail_view->_action->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->_table->Visible) { // table ?>
	<tr id="r__table">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail__table"><?php echo $t304_audittrail_view->_table->caption() ?></span></td>
		<td data-name="_table" <?php echo $t304_audittrail_view->_table->cellAttributes() ?>>
<span id="el_t304_audittrail__table">
<span<?php echo $t304_audittrail_view->_table->viewAttributes() ?>><?php echo $t304_audittrail_view->_table->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->field->Visible) { // field ?>
	<tr id="r_field">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_field"><?php echo $t304_audittrail_view->field->caption() ?></span></td>
		<td data-name="field" <?php echo $t304_audittrail_view->field->cellAttributes() ?>>
<span id="el_t304_audittrail_field">
<span<?php echo $t304_audittrail_view->field->viewAttributes() ?>><?php echo $t304_audittrail_view->field->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->keyvalue->Visible) { // keyvalue ?>
	<tr id="r_keyvalue">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_keyvalue"><?php echo $t304_audittrail_view->keyvalue->caption() ?></span></td>
		<td data-name="keyvalue" <?php echo $t304_audittrail_view->keyvalue->cellAttributes() ?>>
<span id="el_t304_audittrail_keyvalue">
<span<?php echo $t304_audittrail_view->keyvalue->viewAttributes() ?>><?php echo $t304_audittrail_view->keyvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->oldvalue->Visible) { // oldvalue ?>
	<tr id="r_oldvalue">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_oldvalue"><?php echo $t304_audittrail_view->oldvalue->caption() ?></span></td>
		<td data-name="oldvalue" <?php echo $t304_audittrail_view->oldvalue->cellAttributes() ?>>
<span id="el_t304_audittrail_oldvalue">
<span<?php echo $t304_audittrail_view->oldvalue->viewAttributes() ?>><?php echo $t304_audittrail_view->oldvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t304_audittrail_view->newvalue->Visible) { // newvalue ?>
	<tr id="r_newvalue">
		<td class="<?php echo $t304_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t304_audittrail_newvalue"><?php echo $t304_audittrail_view->newvalue->caption() ?></span></td>
		<td data-name="newvalue" <?php echo $t304_audittrail_view->newvalue->cellAttributes() ?>>
<span id="el_t304_audittrail_newvalue">
<span<?php echo $t304_audittrail_view->newvalue->viewAttributes() ?>><?php echo $t304_audittrail_view->newvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t304_audittrail_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t304_audittrail_view->isExport()) { ?>
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
$t304_audittrail_view->terminate();
?>