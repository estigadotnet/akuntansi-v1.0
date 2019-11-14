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
$t102_jurnald_edit = new t102_jurnald_edit();

// Run the page
$t102_jurnald_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_jurnald_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_jurnaldedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft102_jurnaldedit = currentForm = new ew.Form("ft102_jurnaldedit", "edit");

	// Validate form
	ft102_jurnaldedit.validate = function() {
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
			<?php if ($t102_jurnald_edit->jurnal_id->Required) { ?>
				elm = this.getElements("x" + infix + "_jurnal_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_edit->jurnal_id->caption(), $t102_jurnald_edit->jurnal_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_jurnal_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_edit->jurnal_id->errorMessage()) ?>");
			<?php if ($t102_jurnald_edit->akun_id->Required) { ?>
				elm = this.getElements("x" + infix + "_akun_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_edit->akun_id->caption(), $t102_jurnald_edit->akun_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t102_jurnald_edit->debet->Required) { ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_edit->debet->caption(), $t102_jurnald_edit->debet->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_debet");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_edit->debet->errorMessage()) ?>");
			<?php if ($t102_jurnald_edit->kredit->Required) { ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_jurnald_edit->kredit->caption(), $t102_jurnald_edit->kredit->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_kredit");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t102_jurnald_edit->kredit->errorMessage()) ?>");

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
	ft102_jurnaldedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_jurnaldedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_jurnaldedit.lists["x_jurnal_id"] = <?php echo $t102_jurnald_edit->jurnal_id->Lookup->toClientList($t102_jurnald_edit) ?>;
	ft102_jurnaldedit.lists["x_jurnal_id"].options = <?php echo JsonEncode($t102_jurnald_edit->jurnal_id->lookupOptions()) ?>;
	ft102_jurnaldedit.autoSuggests["x_jurnal_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	ft102_jurnaldedit.lists["x_akun_id"] = <?php echo $t102_jurnald_edit->akun_id->Lookup->toClientList($t102_jurnald_edit) ?>;
	ft102_jurnaldedit.lists["x_akun_id"].options = <?php echo JsonEncode($t102_jurnald_edit->akun_id->lookupOptions()) ?>;
	loadjs.done("ft102_jurnaldedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_jurnald_edit->showPageHeader(); ?>
<?php
$t102_jurnald_edit->showMessage();
?>
<form name="ft102_jurnaldedit" id="ft102_jurnaldedit" class="<?php echo $t102_jurnald_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_jurnald">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t102_jurnald_edit->IsModal ?>">
<?php if ($t102_jurnald->getCurrentMasterTable() == "t101_jurnal") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t101_jurnal">
<input type="hidden" name="fk_id" value="<?php echo $t102_jurnald_edit->jurnal_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t102_jurnald_edit->jurnal_id->Visible) { // jurnal_id ?>
	<div id="r_jurnal_id" class="form-group row">
		<label id="elh_t102_jurnald_jurnal_id" class="<?php echo $t102_jurnald_edit->LeftColumnClass ?>"><?php echo $t102_jurnald_edit->jurnal_id->caption() ?><?php echo $t102_jurnald_edit->jurnal_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_jurnald_edit->RightColumnClass ?>"><div <?php echo $t102_jurnald_edit->jurnal_id->cellAttributes() ?>>
<?php if ($t102_jurnald_edit->jurnal_id->getSessionValue() != "") { ?>
<span id="el_t102_jurnald_jurnal_id">
<span<?php echo $t102_jurnald_edit->jurnal_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t102_jurnald_edit->jurnal_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_jurnal_id" name="x_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_edit->jurnal_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t102_jurnald_jurnal_id">
<?php
$onchange = $t102_jurnald_edit->jurnal_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t102_jurnald_edit->jurnal_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_jurnal_id">
	<input type="text" class="form-control" name="sv_x_jurnal_id" id="sv_x_jurnal_id" value="<?php echo RemoveHtml($t102_jurnald_edit->jurnal_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t102_jurnald_edit->jurnal_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t102_jurnald_edit->jurnal_id->getPlaceHolder()) ?>"<?php echo $t102_jurnald_edit->jurnal_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_jurnald" data-field="x_jurnal_id" data-value-separator="<?php echo $t102_jurnald_edit->jurnal_id->displayValueSeparatorAttribute() ?>" name="x_jurnal_id" id="x_jurnal_id" value="<?php echo HtmlEncode($t102_jurnald_edit->jurnal_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft102_jurnaldedit"], function() {
	ft102_jurnaldedit.createAutoSuggest({"id":"x_jurnal_id","forceSelect":false});
});
</script>
<?php echo $t102_jurnald_edit->jurnal_id->Lookup->getParamTag($t102_jurnald_edit, "p_x_jurnal_id") ?>
</span>
<?php } ?>
<?php echo $t102_jurnald_edit->jurnal_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_jurnald_edit->akun_id->Visible) { // akun_id ?>
	<div id="r_akun_id" class="form-group row">
		<label id="elh_t102_jurnald_akun_id" for="x_akun_id" class="<?php echo $t102_jurnald_edit->LeftColumnClass ?>"><?php echo $t102_jurnald_edit->akun_id->caption() ?><?php echo $t102_jurnald_edit->akun_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_jurnald_edit->RightColumnClass ?>"><div <?php echo $t102_jurnald_edit->akun_id->cellAttributes() ?>>
<span id="el_t102_jurnald_akun_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_akun_id"><?php echo EmptyValue(strval($t102_jurnald_edit->akun_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_jurnald_edit->akun_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_jurnald_edit->akun_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_jurnald_edit->akun_id->ReadOnly || $t102_jurnald_edit->akun_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_akun_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_jurnald_edit->akun_id->Lookup->getParamTag($t102_jurnald_edit, "p_x_akun_id") ?>
<input type="hidden" data-table="t102_jurnald" data-field="x_akun_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_jurnald_edit->akun_id->displayValueSeparatorAttribute() ?>" name="x_akun_id" id="x_akun_id" value="<?php echo $t102_jurnald_edit->akun_id->CurrentValue ?>"<?php echo $t102_jurnald_edit->akun_id->editAttributes() ?>>
</span>
<?php echo $t102_jurnald_edit->akun_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_jurnald_edit->debet->Visible) { // debet ?>
	<div id="r_debet" class="form-group row">
		<label id="elh_t102_jurnald_debet" for="x_debet" class="<?php echo $t102_jurnald_edit->LeftColumnClass ?>"><?php echo $t102_jurnald_edit->debet->caption() ?><?php echo $t102_jurnald_edit->debet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_jurnald_edit->RightColumnClass ?>"><div <?php echo $t102_jurnald_edit->debet->cellAttributes() ?>>
<span id="el_t102_jurnald_debet">
<input type="text" data-table="t102_jurnald" data-field="x_debet" name="x_debet" id="x_debet" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_edit->debet->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_edit->debet->EditValue ?>"<?php echo $t102_jurnald_edit->debet->editAttributes() ?>>
</span>
<?php echo $t102_jurnald_edit->debet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t102_jurnald_edit->kredit->Visible) { // kredit ?>
	<div id="r_kredit" class="form-group row">
		<label id="elh_t102_jurnald_kredit" for="x_kredit" class="<?php echo $t102_jurnald_edit->LeftColumnClass ?>"><?php echo $t102_jurnald_edit->kredit->caption() ?><?php echo $t102_jurnald_edit->kredit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t102_jurnald_edit->RightColumnClass ?>"><div <?php echo $t102_jurnald_edit->kredit->cellAttributes() ?>>
<span id="el_t102_jurnald_kredit">
<input type="text" data-table="t102_jurnald" data-field="x_kredit" name="x_kredit" id="x_kredit" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t102_jurnald_edit->kredit->getPlaceHolder()) ?>" value="<?php echo $t102_jurnald_edit->kredit->EditValue ?>"<?php echo $t102_jurnald_edit->kredit->editAttributes() ?>>
</span>
<?php echo $t102_jurnald_edit->kredit->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t102_jurnald" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t102_jurnald_edit->id->CurrentValue) ?>">
<?php if (!$t102_jurnald_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_jurnald_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t102_jurnald_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
<?php if (!$t102_jurnald_edit->IsModal) { ?>
<?php echo $t102_jurnald_edit->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
</form>
<?php
$t102_jurnald_edit->showPageFooter();
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
$t102_jurnald_edit->terminate();
?>