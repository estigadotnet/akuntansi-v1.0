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
$t101_jurnal_edit = new t101_jurnal_edit();

// Run the page
$t101_jurnal_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_jurnal_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_jurnaledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft101_jurnaledit = currentForm = new ew.Form("ft101_jurnaledit", "edit");

	// Validate form
	ft101_jurnaledit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "F")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($t101_jurnal_edit->tipejurnal_id->Required) { ?>
				elm = this.getElements("x" + infix + "_tipejurnal_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jurnal_edit->tipejurnal_id->caption(), $t101_jurnal_edit->tipejurnal_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_jurnal_edit->nomer->Required) { ?>
				elm = this.getElements("x" + infix + "_nomer");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jurnal_edit->nomer->caption(), $t101_jurnal_edit->nomer->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_jurnal_edit->keterangan->Required) { ?>
				elm = this.getElements("x" + infix + "_keterangan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jurnal_edit->keterangan->caption(), $t101_jurnal_edit->keterangan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_jurnal_edit->person_id->Required) { ?>
				elm = this.getElements("x" + infix + "_person_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jurnal_edit->person_id->caption(), $t101_jurnal_edit->person_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_jurnal_edit->createon->Required) { ?>
				elm = this.getElements("x" + infix + "_createon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_jurnal_edit->createon->caption(), $t101_jurnal_edit->createon->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft101_jurnaledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		if(debet_total != kredit_total) {
			alert('saldo belum balance');
			return false;
		}
		return true;
	}

	// Use JavaScript validation or not
	ft101_jurnaledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_jurnaledit.lists["x_tipejurnal_id"] = <?php echo $t101_jurnal_edit->tipejurnal_id->Lookup->toClientList($t101_jurnal_edit) ?>;
	ft101_jurnaledit.lists["x_tipejurnal_id"].options = <?php echo JsonEncode($t101_jurnal_edit->tipejurnal_id->lookupOptions()) ?>;
	loadjs.done("ft101_jurnaledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_jurnal_edit->showPageHeader(); ?>
<?php
$t101_jurnal_edit->showMessage();
?>
<form name="ft101_jurnaledit" id="ft101_jurnaledit" class="<?php echo $t101_jurnal_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_jurnal">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t101_jurnal_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t101_jurnal_edit->tipejurnal_id->Visible) { // tipejurnal_id ?>
	<div id="r_tipejurnal_id" class="form-group row">
		<label id="elh_t101_jurnal_tipejurnal_id" for="x_tipejurnal_id" class="<?php echo $t101_jurnal_edit->LeftColumnClass ?>"><?php echo $t101_jurnal_edit->tipejurnal_id->caption() ?><?php echo $t101_jurnal_edit->tipejurnal_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jurnal_edit->RightColumnClass ?>"><div <?php echo $t101_jurnal_edit->tipejurnal_id->cellAttributes() ?>>
<span id="el_t101_jurnal_tipejurnal_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_jurnal" data-field="x_tipejurnal_id" data-value-separator="<?php echo $t101_jurnal_edit->tipejurnal_id->displayValueSeparatorAttribute() ?>" id="x_tipejurnal_id" name="x_tipejurnal_id"<?php echo $t101_jurnal_edit->tipejurnal_id->editAttributes() ?>>
			<?php echo $t101_jurnal_edit->tipejurnal_id->selectOptionListHtml("x_tipejurnal_id") ?>
		</select>
</div>
<?php echo $t101_jurnal_edit->tipejurnal_id->Lookup->getParamTag($t101_jurnal_edit, "p_x_tipejurnal_id") ?>
</span>
<?php echo $t101_jurnal_edit->tipejurnal_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jurnal_edit->nomer->Visible) { // nomer ?>
	<div id="r_nomer" class="form-group row">
		<label id="elh_t101_jurnal_nomer" for="x_nomer" class="<?php echo $t101_jurnal_edit->LeftColumnClass ?>"><?php echo $t101_jurnal_edit->nomer->caption() ?><?php echo $t101_jurnal_edit->nomer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jurnal_edit->RightColumnClass ?>"><div <?php echo $t101_jurnal_edit->nomer->cellAttributes() ?>>
<span id="el_t101_jurnal_nomer">
<input type="text" data-table="t101_jurnal" data-field="x_nomer" name="x_nomer" id="x_nomer" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jurnal_edit->nomer->getPlaceHolder()) ?>" value="<?php echo $t101_jurnal_edit->nomer->EditValue ?>"<?php echo $t101_jurnal_edit->nomer->editAttributes() ?>>
</span>
<?php echo $t101_jurnal_edit->nomer->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_jurnal_edit->keterangan->Visible) { // keterangan ?>
	<div id="r_keterangan" class="form-group row">
		<label id="elh_t101_jurnal_keterangan" for="x_keterangan" class="<?php echo $t101_jurnal_edit->LeftColumnClass ?>"><?php echo $t101_jurnal_edit->keterangan->caption() ?><?php echo $t101_jurnal_edit->keterangan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_jurnal_edit->RightColumnClass ?>"><div <?php echo $t101_jurnal_edit->keterangan->cellAttributes() ?>>
<span id="el_t101_jurnal_keterangan">
<input type="text" data-table="t101_jurnal" data-field="x_keterangan" name="x_keterangan" id="x_keterangan" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t101_jurnal_edit->keterangan->getPlaceHolder()) ?>" value="<?php echo $t101_jurnal_edit->keterangan->EditValue ?>"<?php echo $t101_jurnal_edit->keterangan->editAttributes() ?>>
</span>
<?php echo $t101_jurnal_edit->keterangan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t101_jurnal" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t101_jurnal_edit->id->CurrentValue) ?>">
<?php
	if (in_array("t102_jurnald", explode(",", $t101_jurnal->getCurrentDetailTable())) && $t102_jurnald->DetailEdit) {
?>
<?php if ($t101_jurnal->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t102_jurnald", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t102_jurnaldgrid.php" ?>
<?php } ?>
<?php if (!$t101_jurnal_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_jurnal_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_jurnal_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_jurnal_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	debet_onchange=function(e){var t=$(e.target).val();debet_new=parseInt(t),isNaN(debet_old)&&(debet_old=0),isNaN(debet_new)&&(debet_new=0),debet_total=debet_total-debet_old+debet_new},debet_onfocus=function(e){var t=$(e.target).val();debet_old=parseInt(t)},kredit_onchange=function(e){var t=$(e.target).val();kredit_new=parseInt(t),isNaN(kredit_old)&&(kredit_old=0),isNaN(kredit_new)&&(kredit_new=0),kredit_total=kredit_total-kredit_old+kredit_new},kredit_onfocus=function(e){var t=$(e.target).val();kredit_old=parseInt(t)};
});
</script>
<?php include_once "footer.php"; ?>
<?php
$t101_jurnal_edit->terminate();
?>