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
$t001_grup_list = new t001_grup_list();

// Run the page
$t001_grup_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_grup_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t001_grup_list->isExport()) { ?>
<script>
var ft001_gruplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft001_gruplist = currentForm = new ew.Form("ft001_gruplist", "list");
	ft001_gruplist.formKeyCountName = '<?php echo $t001_grup_list->FormKeyCountName ?>';
	loadjs.done("ft001_gruplist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t001_grup_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t001_grup_list->TotalRecords > 0 && $t001_grup_list->ExportOptions->visible()) { ?>
<?php $t001_grup_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t001_grup_list->ImportOptions->visible()) { ?>
<?php $t001_grup_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t001_grup_list->renderOtherOptions();
?>
<?php $t001_grup_list->showPageHeader(); ?>
<?php
$t001_grup_list->showMessage();
?>
<?php if ($t001_grup_list->TotalRecords > 0 || $t001_grup->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t001_grup_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t001_grup">
<form name="ft001_gruplist" id="ft001_gruplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t001_grup">
<div id="gmp_t001_grup" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t001_grup_list->TotalRecords > 0 || $t001_grup_list->isGridEdit()) { ?>
<table id="tbl_t001_gruplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t001_grup->RowType = ROWTYPE_HEADER;

// Render list options
$t001_grup_list->renderListOptions();

// Render list options (header, left)
$t001_grup_list->ListOptions->render("header", "left");
?>
<?php if ($t001_grup_list->name->Visible) { // name ?>
	<?php if ($t001_grup_list->SortUrl($t001_grup_list->name) == "") { ?>
		<th data-name="name" class="<?php echo $t001_grup_list->name->headerCellClass() ?>"><div id="elh_t001_grup_name" class="t001_grup_name"><div class="ew-table-header-caption"><?php echo $t001_grup_list->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $t001_grup_list->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t001_grup_list->SortUrl($t001_grup_list->name) ?>', 2);"><div id="elh_t001_grup_name" class="t001_grup_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t001_grup_list->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($t001_grup_list->name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t001_grup_list->name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t001_grup_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t001_grup_list->ExportAll && $t001_grup_list->isExport()) {
	$t001_grup_list->StopRecord = $t001_grup_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t001_grup_list->TotalRecords > $t001_grup_list->StartRecord + $t001_grup_list->DisplayRecords - 1)
		$t001_grup_list->StopRecord = $t001_grup_list->StartRecord + $t001_grup_list->DisplayRecords - 1;
	else
		$t001_grup_list->StopRecord = $t001_grup_list->TotalRecords;
}
$t001_grup_list->RecordCount = $t001_grup_list->StartRecord - 1;
if ($t001_grup_list->Recordset && !$t001_grup_list->Recordset->EOF) {
	$t001_grup_list->Recordset->moveFirst();
	$selectLimit = $t001_grup_list->UseSelectLimit;
	if (!$selectLimit && $t001_grup_list->StartRecord > 1)
		$t001_grup_list->Recordset->move($t001_grup_list->StartRecord - 1);
} elseif (!$t001_grup->AllowAddDeleteRow && $t001_grup_list->StopRecord == 0) {
	$t001_grup_list->StopRecord = $t001_grup->GridAddRowCount;
}

// Initialize aggregate
$t001_grup->RowType = ROWTYPE_AGGREGATEINIT;
$t001_grup->resetAttributes();
$t001_grup_list->renderRow();
while ($t001_grup_list->RecordCount < $t001_grup_list->StopRecord) {
	$t001_grup_list->RecordCount++;
	if ($t001_grup_list->RecordCount >= $t001_grup_list->StartRecord) {
		$t001_grup_list->RowCount++;

		// Set up key count
		$t001_grup_list->KeyCount = $t001_grup_list->RowIndex;

		// Init row class and style
		$t001_grup->resetAttributes();
		$t001_grup->CssClass = "";
		if ($t001_grup_list->isGridAdd()) {
		} else {
			$t001_grup_list->loadRowValues($t001_grup_list->Recordset); // Load row values
		}
		$t001_grup->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t001_grup->RowAttrs->merge(["data-rowindex" => $t001_grup_list->RowCount, "id" => "r" . $t001_grup_list->RowCount . "_t001_grup", "data-rowtype" => $t001_grup->RowType]);

		// Render row
		$t001_grup_list->renderRow();

		// Render list options
		$t001_grup_list->renderListOptions();
?>
	<tr <?php echo $t001_grup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t001_grup_list->ListOptions->render("body", "left", $t001_grup_list->RowCount);
?>
	<?php if ($t001_grup_list->name->Visible) { // name ?>
		<td data-name="name" <?php echo $t001_grup_list->name->cellAttributes() ?>>
<span id="el<?php echo $t001_grup_list->RowCount ?>_t001_grup_name">
<span<?php echo $t001_grup_list->name->viewAttributes() ?>><?php echo $t001_grup_list->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t001_grup_list->ListOptions->render("body", "right", $t001_grup_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t001_grup_list->isGridAdd())
		$t001_grup_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t001_grup->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t001_grup_list->Recordset)
	$t001_grup_list->Recordset->Close();
?>
<?php if (!$t001_grup_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t001_grup_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t001_grup_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t001_grup_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t001_grup_list->TotalRecords == 0 && !$t001_grup->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t001_grup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t001_grup_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t001_grup_list->isExport()) { ?>
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
$t001_grup_list->terminate();
?>