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
$t007_tipejurnal_list = new t007_tipejurnal_list();

// Run the page
$t007_tipejurnal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_tipejurnal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t007_tipejurnal_list->isExport()) { ?>
<script>
var ft007_tipejurnallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft007_tipejurnallist = currentForm = new ew.Form("ft007_tipejurnallist", "list");
	ft007_tipejurnallist.formKeyCountName = '<?php echo $t007_tipejurnal_list->FormKeyCountName ?>';
	loadjs.done("ft007_tipejurnallist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t007_tipejurnal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t007_tipejurnal_list->TotalRecords > 0 && $t007_tipejurnal_list->ExportOptions->visible()) { ?>
<?php $t007_tipejurnal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t007_tipejurnal_list->ImportOptions->visible()) { ?>
<?php $t007_tipejurnal_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t007_tipejurnal_list->renderOtherOptions();
?>
<?php $t007_tipejurnal_list->showPageHeader(); ?>
<?php
$t007_tipejurnal_list->showMessage();
?>
<?php if ($t007_tipejurnal_list->TotalRecords > 0 || $t007_tipejurnal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t007_tipejurnal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t007_tipejurnal">
<form name="ft007_tipejurnallist" id="ft007_tipejurnallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_tipejurnal">
<div id="gmp_t007_tipejurnal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t007_tipejurnal_list->TotalRecords > 0 || $t007_tipejurnal_list->isGridEdit()) { ?>
<table id="tbl_t007_tipejurnallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t007_tipejurnal->RowType = ROWTYPE_HEADER;

// Render list options
$t007_tipejurnal_list->renderListOptions();

// Render list options (header, left)
$t007_tipejurnal_list->ListOptions->render("header", "left");
?>
<?php if ($t007_tipejurnal_list->kode->Visible) { // kode ?>
	<?php if ($t007_tipejurnal_list->SortUrl($t007_tipejurnal_list->kode) == "") { ?>
		<th data-name="kode" class="<?php echo $t007_tipejurnal_list->kode->headerCellClass() ?>"><div id="elh_t007_tipejurnal_kode" class="t007_tipejurnal_kode"><div class="ew-table-header-caption"><?php echo $t007_tipejurnal_list->kode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode" class="<?php echo $t007_tipejurnal_list->kode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_tipejurnal_list->SortUrl($t007_tipejurnal_list->kode) ?>', 2);"><div id="elh_t007_tipejurnal_kode" class="t007_tipejurnal_kode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_tipejurnal_list->kode->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_tipejurnal_list->kode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_tipejurnal_list->kode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_tipejurnal_list->nama->Visible) { // nama ?>
	<?php if ($t007_tipejurnal_list->SortUrl($t007_tipejurnal_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $t007_tipejurnal_list->nama->headerCellClass() ?>"><div id="elh_t007_tipejurnal_nama" class="t007_tipejurnal_nama"><div class="ew-table-header-caption"><?php echo $t007_tipejurnal_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $t007_tipejurnal_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_tipejurnal_list->SortUrl($t007_tipejurnal_list->nama) ?>', 2);"><div id="elh_t007_tipejurnal_nama" class="t007_tipejurnal_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_tipejurnal_list->nama->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_tipejurnal_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_tipejurnal_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t007_tipejurnal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t007_tipejurnal_list->ExportAll && $t007_tipejurnal_list->isExport()) {
	$t007_tipejurnal_list->StopRecord = $t007_tipejurnal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t007_tipejurnal_list->TotalRecords > $t007_tipejurnal_list->StartRecord + $t007_tipejurnal_list->DisplayRecords - 1)
		$t007_tipejurnal_list->StopRecord = $t007_tipejurnal_list->StartRecord + $t007_tipejurnal_list->DisplayRecords - 1;
	else
		$t007_tipejurnal_list->StopRecord = $t007_tipejurnal_list->TotalRecords;
}
$t007_tipejurnal_list->RecordCount = $t007_tipejurnal_list->StartRecord - 1;
if ($t007_tipejurnal_list->Recordset && !$t007_tipejurnal_list->Recordset->EOF) {
	$t007_tipejurnal_list->Recordset->moveFirst();
	$selectLimit = $t007_tipejurnal_list->UseSelectLimit;
	if (!$selectLimit && $t007_tipejurnal_list->StartRecord > 1)
		$t007_tipejurnal_list->Recordset->move($t007_tipejurnal_list->StartRecord - 1);
} elseif (!$t007_tipejurnal->AllowAddDeleteRow && $t007_tipejurnal_list->StopRecord == 0) {
	$t007_tipejurnal_list->StopRecord = $t007_tipejurnal->GridAddRowCount;
}

// Initialize aggregate
$t007_tipejurnal->RowType = ROWTYPE_AGGREGATEINIT;
$t007_tipejurnal->resetAttributes();
$t007_tipejurnal_list->renderRow();
while ($t007_tipejurnal_list->RecordCount < $t007_tipejurnal_list->StopRecord) {
	$t007_tipejurnal_list->RecordCount++;
	if ($t007_tipejurnal_list->RecordCount >= $t007_tipejurnal_list->StartRecord) {
		$t007_tipejurnal_list->RowCount++;

		// Set up key count
		$t007_tipejurnal_list->KeyCount = $t007_tipejurnal_list->RowIndex;

		// Init row class and style
		$t007_tipejurnal->resetAttributes();
		$t007_tipejurnal->CssClass = "";
		if ($t007_tipejurnal_list->isGridAdd()) {
		} else {
			$t007_tipejurnal_list->loadRowValues($t007_tipejurnal_list->Recordset); // Load row values
		}
		$t007_tipejurnal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t007_tipejurnal->RowAttrs->merge(["data-rowindex" => $t007_tipejurnal_list->RowCount, "id" => "r" . $t007_tipejurnal_list->RowCount . "_t007_tipejurnal", "data-rowtype" => $t007_tipejurnal->RowType]);

		// Render row
		$t007_tipejurnal_list->renderRow();

		// Render list options
		$t007_tipejurnal_list->renderListOptions();
?>
	<tr <?php echo $t007_tipejurnal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_tipejurnal_list->ListOptions->render("body", "left", $t007_tipejurnal_list->RowCount);
?>
	<?php if ($t007_tipejurnal_list->kode->Visible) { // kode ?>
		<td data-name="kode" <?php echo $t007_tipejurnal_list->kode->cellAttributes() ?>>
<span id="el<?php echo $t007_tipejurnal_list->RowCount ?>_t007_tipejurnal_kode">
<span<?php echo $t007_tipejurnal_list->kode->viewAttributes() ?>><?php echo $t007_tipejurnal_list->kode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t007_tipejurnal_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $t007_tipejurnal_list->nama->cellAttributes() ?>>
<span id="el<?php echo $t007_tipejurnal_list->RowCount ?>_t007_tipejurnal_nama">
<span<?php echo $t007_tipejurnal_list->nama->viewAttributes() ?>><?php echo $t007_tipejurnal_list->nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_tipejurnal_list->ListOptions->render("body", "right", $t007_tipejurnal_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t007_tipejurnal_list->isGridAdd())
		$t007_tipejurnal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t007_tipejurnal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t007_tipejurnal_list->Recordset)
	$t007_tipejurnal_list->Recordset->Close();
?>
<?php if (!$t007_tipejurnal_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t007_tipejurnal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t007_tipejurnal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t007_tipejurnal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t007_tipejurnal_list->TotalRecords == 0 && !$t007_tipejurnal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t007_tipejurnal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t007_tipejurnal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t007_tipejurnal_list->isExport()) { ?>
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
$t007_tipejurnal_list->terminate();
?>