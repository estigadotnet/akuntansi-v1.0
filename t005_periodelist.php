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
$t005_periode_list = new t005_periode_list();

// Run the page
$t005_periode_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_periode_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t005_periode_list->isExport()) { ?>
<script>
var ft005_periodelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft005_periodelist = currentForm = new ew.Form("ft005_periodelist", "list");
	ft005_periodelist.formKeyCountName = '<?php echo $t005_periode_list->FormKeyCountName ?>';
	loadjs.done("ft005_periodelist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t005_periode_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t005_periode_list->TotalRecords > 0 && $t005_periode_list->ExportOptions->visible()) { ?>
<?php $t005_periode_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t005_periode_list->ImportOptions->visible()) { ?>
<?php $t005_periode_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t005_periode_list->renderOtherOptions();
?>
<?php $t005_periode_list->showPageHeader(); ?>
<?php
$t005_periode_list->showMessage();
?>
<?php if ($t005_periode_list->TotalRecords > 0 || $t005_periode->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t005_periode_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t005_periode">
<?php if (!$t005_periode_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$t005_periode_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t005_periode_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t005_periode_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ft005_periodelist" id="ft005_periodelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_periode">
<div id="gmp_t005_periode" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t005_periode_list->TotalRecords > 0 || $t005_periode_list->isGridEdit()) { ?>
<table id="tbl_t005_periodelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t005_periode->RowType = ROWTYPE_HEADER;

// Render list options
$t005_periode_list->renderListOptions();

// Render list options (header, left)
$t005_periode_list->ListOptions->render("header", "left");
?>
<?php if ($t005_periode_list->start->Visible) { // start ?>
	<?php if ($t005_periode_list->SortUrl($t005_periode_list->start) == "") { ?>
		<th data-name="start" class="<?php echo $t005_periode_list->start->headerCellClass() ?>"><div id="elh_t005_periode_start" class="t005_periode_start"><div class="ew-table-header-caption"><?php echo $t005_periode_list->start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start" class="<?php echo $t005_periode_list->start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_periode_list->SortUrl($t005_periode_list->start) ?>', 2);"><div id="elh_t005_periode_start" class="t005_periode_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_periode_list->start->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_periode_list->start->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_periode_list->start->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_periode_list->end->Visible) { // end ?>
	<?php if ($t005_periode_list->SortUrl($t005_periode_list->end) == "") { ?>
		<th data-name="end" class="<?php echo $t005_periode_list->end->headerCellClass() ?>"><div id="elh_t005_periode_end" class="t005_periode_end"><div class="ew-table-header-caption"><?php echo $t005_periode_list->end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end" class="<?php echo $t005_periode_list->end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_periode_list->SortUrl($t005_periode_list->end) ?>', 2);"><div id="elh_t005_periode_end" class="t005_periode_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_periode_list->end->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_periode_list->end->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_periode_list->end->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_periode_list->isaktif->Visible) { // isaktif ?>
	<?php if ($t005_periode_list->SortUrl($t005_periode_list->isaktif) == "") { ?>
		<th data-name="isaktif" class="<?php echo $t005_periode_list->isaktif->headerCellClass() ?>"><div id="elh_t005_periode_isaktif" class="t005_periode_isaktif"><div class="ew-table-header-caption"><?php echo $t005_periode_list->isaktif->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isaktif" class="<?php echo $t005_periode_list->isaktif->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_periode_list->SortUrl($t005_periode_list->isaktif) ?>', 2);"><div id="elh_t005_periode_isaktif" class="t005_periode_isaktif">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_periode_list->isaktif->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_periode_list->isaktif->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_periode_list->isaktif->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t005_periode_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t005_periode_list->ExportAll && $t005_periode_list->isExport()) {
	$t005_periode_list->StopRecord = $t005_periode_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t005_periode_list->TotalRecords > $t005_periode_list->StartRecord + $t005_periode_list->DisplayRecords - 1)
		$t005_periode_list->StopRecord = $t005_periode_list->StartRecord + $t005_periode_list->DisplayRecords - 1;
	else
		$t005_periode_list->StopRecord = $t005_periode_list->TotalRecords;
}
$t005_periode_list->RecordCount = $t005_periode_list->StartRecord - 1;
if ($t005_periode_list->Recordset && !$t005_periode_list->Recordset->EOF) {
	$t005_periode_list->Recordset->moveFirst();
	$selectLimit = $t005_periode_list->UseSelectLimit;
	if (!$selectLimit && $t005_periode_list->StartRecord > 1)
		$t005_periode_list->Recordset->move($t005_periode_list->StartRecord - 1);
} elseif (!$t005_periode->AllowAddDeleteRow && $t005_periode_list->StopRecord == 0) {
	$t005_periode_list->StopRecord = $t005_periode->GridAddRowCount;
}

// Initialize aggregate
$t005_periode->RowType = ROWTYPE_AGGREGATEINIT;
$t005_periode->resetAttributes();
$t005_periode_list->renderRow();
while ($t005_periode_list->RecordCount < $t005_periode_list->StopRecord) {
	$t005_periode_list->RecordCount++;
	if ($t005_periode_list->RecordCount >= $t005_periode_list->StartRecord) {
		$t005_periode_list->RowCount++;

		// Set up key count
		$t005_periode_list->KeyCount = $t005_periode_list->RowIndex;

		// Init row class and style
		$t005_periode->resetAttributes();
		$t005_periode->CssClass = "";
		if ($t005_periode_list->isGridAdd()) {
		} else {
			$t005_periode_list->loadRowValues($t005_periode_list->Recordset); // Load row values
		}
		$t005_periode->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t005_periode->RowAttrs->merge(["data-rowindex" => $t005_periode_list->RowCount, "id" => "r" . $t005_periode_list->RowCount . "_t005_periode", "data-rowtype" => $t005_periode->RowType]);

		// Render row
		$t005_periode_list->renderRow();

		// Render list options
		$t005_periode_list->renderListOptions();
?>
	<tr <?php echo $t005_periode->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_periode_list->ListOptions->render("body", "left", $t005_periode_list->RowCount);
?>
	<?php if ($t005_periode_list->start->Visible) { // start ?>
		<td data-name="start" <?php echo $t005_periode_list->start->cellAttributes() ?>>
<span id="el<?php echo $t005_periode_list->RowCount ?>_t005_periode_start">
<span<?php echo $t005_periode_list->start->viewAttributes() ?>><?php echo $t005_periode_list->start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t005_periode_list->end->Visible) { // end ?>
		<td data-name="end" <?php echo $t005_periode_list->end->cellAttributes() ?>>
<span id="el<?php echo $t005_periode_list->RowCount ?>_t005_periode_end">
<span<?php echo $t005_periode_list->end->viewAttributes() ?>><?php echo $t005_periode_list->end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t005_periode_list->isaktif->Visible) { // isaktif ?>
		<td data-name="isaktif" <?php echo $t005_periode_list->isaktif->cellAttributes() ?>>
<span id="el<?php echo $t005_periode_list->RowCount ?>_t005_periode_isaktif">
<span<?php echo $t005_periode_list->isaktif->viewAttributes() ?>><div class="custom-control custom-checkbox d-inline-block"><input type="checkbox" id="x_isaktif" class="custom-control-input" value="<?php echo $t005_periode_list->isaktif->getViewValue() ?>" disabled<?php if (ConvertToBool($t005_periode_list->isaktif->CurrentValue)) { ?> checked<?php } ?>><label class="custom-control-label" for="x_isaktif"></label></div></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_periode_list->ListOptions->render("body", "right", $t005_periode_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t005_periode_list->isGridAdd())
		$t005_periode_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t005_periode->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t005_periode_list->Recordset)
	$t005_periode_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t005_periode_list->TotalRecords == 0 && !$t005_periode->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t005_periode_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t005_periode_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t005_periode_list->isExport()) { ?>
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
$t005_periode_list->terminate();
?>