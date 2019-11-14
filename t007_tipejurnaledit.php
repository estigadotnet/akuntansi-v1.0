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
$t007_tipejurnal_edit = new t007_tipejurnal_edit();

// Run the page
$t007_tipejurnal_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_tipejurnal_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_tipejurnaledit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft007_tipejurnaledit = currentForm = new ew.Form("ft007_tipejurnaledit", "edit");

	// Validate form
	ft007_tipejurnaledit.validate = function() {
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
			<?php if ($t007_tipejurnal_edit->kode->Required) { ?>
				elm = this.getElements("x" + infix + "_kode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_tipejurnal_edit->kode->caption(), $t007_tipejurnal_edit->kode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t007_tipejurnal_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_tipejurnal_edit->nama->caption(), $t007_tipejurnal_edit->nama->RequiredErrorMessage)) ?>");
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
	ft007_tipejurnaledit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_tipejurnaledit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft007_tipejurnaledit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_tipejurnal_edit->showPageHeader(); ?>
<?php
$t007_tipejurnal_edit->showMessage();
?>
<form name="ft007_tipejurnaledit" id="ft007_tipejurnaledit" class="<?php echo $t007_tipejurnal_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_tipejurnal">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t007_tipejurnal_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t007_tipejurnal_edit->kode->Visible) { // kode ?>
	<div id="r_kode" class="form-group row">
		<label id="elh_t007_tipejurnal_kode" for="x_kode" class="<?php echo $t007_tipejurnal_edit->LeftColumnClass ?>"><?php echo $t007_tipejurnal_edit->kode->caption() ?><?php echo $t007_tipejurnal_edit->kode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_tipejurnal_edit->RightColumnClass ?>"><div <?php echo $t007_tipejurnal_edit->kode->cellAttributes() ?>>
<span id="el_t007_tipejurnal_kode">
<input type="text" data-table="t007_tipejurnal" data-field="x_kode" name="x_kode" id="x_kode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_tipejurnal_edit->kode->getPlaceHolder()) ?>" value="<?php echo $t007_tipejurnal_edit->kode->EditValue ?>"<?php echo $t007_tipejurnal_edit->kode->editAttributes() ?>>
</span>
<?php echo $t007_tipejurnal_edit->kode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_tipejurnal_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_t007_tipejurnal_nama" for="x_nama" class="<?php echo $t007_tipejurnal_edit->LeftColumnClass ?>"><?php echo $t007_tipejurnal_edit->nama->caption() ?><?php echo $t007_tipejurnal_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_tipejurnal_edit->RightColumnClass ?>"><div <?php echo $t007_tipejurnal_edit->nama->cellAttributes() ?>>
<span id="el_t007_tipejurnal_nama">
<input type="text" data-table="t007_tipejurnal" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_tipejurnal_edit->nama->getPlaceHolder()) ?>" value="<?php echo $t007_tipejurnal_edit->nama->EditValue ?>"<?php echo $t007_tipejurnal_edit->nama->editAttributes() ?>>
</span>
<?php echo $t007_tipejurnal_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t007_tipejurnal" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t007_tipejurnal_edit->id->CurrentValue) ?>">
<?php if (!$t007_tipejurnal_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t007_tipejurnal_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t007_tipejurnal_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t007_tipejurnal_edit->showPageFooter();
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
$t007_tipejurnal_edit->terminate();
?>