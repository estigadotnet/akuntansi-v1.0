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
$t003_matauang_edit = new t003_matauang_edit();

// Run the page
$t003_matauang_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t003_matauang_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft003_matauangedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft003_matauangedit = currentForm = new ew.Form("ft003_matauangedit", "edit");

	// Validate form
	ft003_matauangedit.validate = function() {
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
			<?php if ($t003_matauang_edit->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_matauang_edit->kode->caption(), $t003_matauang_edit->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t003_matauang_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t003_matauang_edit->nama->caption(), $t003_matauang_edit->nama->RequiredErrorMessage)) ?>");
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
	ft003_matauangedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft003_matauangedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft003_matauangedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t003_matauang_edit->showPageHeader(); ?>
<?php
$t003_matauang_edit->showMessage();
?>
<form name="ft003_matauangedit" id="ft003_matauangedit" class="<?php echo $t003_matauang_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t003_matauang">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t003_matauang_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t003_matauang_edit->kode->Visible) { // kode ?>
	<div id="r_kode" class="form-group row">
		<label id="elh_t003_matauang_kode" for="x_kode" class="<?php echo $t003_matauang_edit->LeftColumnClass ?>"><?php echo $t003_matauang_edit->kode->caption() ?><?php echo $t003_matauang_edit->kode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t003_matauang_edit->RightColumnClass ?>"><div <?php echo $t003_matauang_edit->kode->cellAttributes() ?>>
<span id="el_t003_matauang_kode">
<input type="text" data-table="t003_matauang" data-field="x_kode" name="x_kode" id="x_kode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_edit->kode->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_edit->kode->EditValue ?>"<?php echo $t003_matauang_edit->kode->editAttributes() ?>>
</span>
<?php echo $t003_matauang_edit->kode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t003_matauang_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_t003_matauang_nama" for="x_nama" class="<?php echo $t003_matauang_edit->LeftColumnClass ?>"><?php echo $t003_matauang_edit->nama->caption() ?><?php echo $t003_matauang_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t003_matauang_edit->RightColumnClass ?>"><div <?php echo $t003_matauang_edit->nama->cellAttributes() ?>>
<span id="el_t003_matauang_nama">
<input type="text" data-table="t003_matauang" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t003_matauang_edit->nama->getPlaceHolder()) ?>" value="<?php echo $t003_matauang_edit->nama->EditValue ?>"<?php echo $t003_matauang_edit->nama->editAttributes() ?>>
</span>
<?php echo $t003_matauang_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t003_matauang" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t003_matauang_edit->id->CurrentValue) ?>">
<?php if (!$t003_matauang_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t003_matauang_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t003_matauang_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t003_matauang_edit->showPageFooter();
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
$t003_matauang_edit->terminate();
?>