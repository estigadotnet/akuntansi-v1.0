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
$t005_periode_edit = new t005_periode_edit();

// Run the page
$t005_periode_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_periode_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_periodeedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft005_periodeedit = currentForm = new ew.Form("ft005_periodeedit", "edit");

	// Validate form
	ft005_periodeedit.validate = function() {
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
			<?php if ($t005_periode_edit->start->Required) { ?>
				elm = this.getElements("x" + infix + "_start");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_periode_edit->start->caption(), $t005_periode_edit->start->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_periode_edit->start->errorMessage()) ?>");
			<?php if ($t005_periode_edit->end->Required) { ?>
				elm = this.getElements("x" + infix + "_end");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_periode_edit->end->caption(), $t005_periode_edit->end->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_periode_edit->end->errorMessage()) ?>");
			<?php if ($t005_periode_edit->isaktif->Required) { ?>
				elm = this.getElements("x" + infix + "_isaktif[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_periode_edit->isaktif->caption(), $t005_periode_edit->isaktif->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_periode_edit->user_id->Required) { ?>
				elm = this.getElements("x" + infix + "_user_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_periode_edit->user_id->caption(), $t005_periode_edit->user_id->RequiredErrorMessage)) ?>");
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
	ft005_periodeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_periodeedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft005_periodeedit.lists["x_isaktif[]"] = <?php echo $t005_periode_edit->isaktif->Lookup->toClientList($t005_periode_edit) ?>;
	ft005_periodeedit.lists["x_isaktif[]"].options = <?php echo JsonEncode($t005_periode_edit->isaktif->options(FALSE, TRUE)) ?>;
	loadjs.done("ft005_periodeedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_periode_edit->showPageHeader(); ?>
<?php
$t005_periode_edit->showMessage();
?>
<form name="ft005_periodeedit" id="ft005_periodeedit" class="<?php echo $t005_periode_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_periode">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t005_periode_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t005_periode_edit->start->Visible) { // start ?>
	<div id="r_start" class="form-group row">
		<label id="elh_t005_periode_start" for="x_start" class="<?php echo $t005_periode_edit->LeftColumnClass ?>"><?php echo $t005_periode_edit->start->caption() ?><?php echo $t005_periode_edit->start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_periode_edit->RightColumnClass ?>"><div <?php echo $t005_periode_edit->start->cellAttributes() ?>>
<span id="el_t005_periode_start">
<input type="text" data-table="t005_periode" data-field="x_start" data-format="7" name="x_start" id="x_start" size="10" maxlength="19" placeholder="<?php echo HtmlEncode($t005_periode_edit->start->getPlaceHolder()) ?>" value="<?php echo $t005_periode_edit->start->EditValue ?>"<?php echo $t005_periode_edit->start->editAttributes() ?>>
<?php if (!$t005_periode_edit->start->ReadOnly && !$t005_periode_edit->start->Disabled && !isset($t005_periode_edit->start->EditAttrs["readonly"]) && !isset($t005_periode_edit->start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft005_periodeedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft005_periodeedit", "x_start", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t005_periode_edit->start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_periode_edit->end->Visible) { // end ?>
	<div id="r_end" class="form-group row">
		<label id="elh_t005_periode_end" for="x_end" class="<?php echo $t005_periode_edit->LeftColumnClass ?>"><?php echo $t005_periode_edit->end->caption() ?><?php echo $t005_periode_edit->end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_periode_edit->RightColumnClass ?>"><div <?php echo $t005_periode_edit->end->cellAttributes() ?>>
<span id="el_t005_periode_end">
<input type="text" data-table="t005_periode" data-field="x_end" data-format="7" name="x_end" id="x_end" size="10" maxlength="19" placeholder="<?php echo HtmlEncode($t005_periode_edit->end->getPlaceHolder()) ?>" value="<?php echo $t005_periode_edit->end->EditValue ?>"<?php echo $t005_periode_edit->end->editAttributes() ?>>
<?php if (!$t005_periode_edit->end->ReadOnly && !$t005_periode_edit->end->Disabled && !isset($t005_periode_edit->end->EditAttrs["readonly"]) && !isset($t005_periode_edit->end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft005_periodeedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft005_periodeedit", "x_end", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t005_periode_edit->end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_periode_edit->isaktif->Visible) { // isaktif ?>
	<div id="r_isaktif" class="form-group row">
		<label id="elh_t005_periode_isaktif" class="<?php echo $t005_periode_edit->LeftColumnClass ?>"><?php echo $t005_periode_edit->isaktif->caption() ?><?php echo $t005_periode_edit->isaktif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_periode_edit->RightColumnClass ?>"><div <?php echo $t005_periode_edit->isaktif->cellAttributes() ?>>
<span id="el_t005_periode_isaktif">
<?php
$selwrk = ConvertToBool($t005_periode_edit->isaktif->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="t005_periode" data-field="x_isaktif" name="x_isaktif[]" id="x_isaktif[]" value="1"<?php echo $selwrk ?><?php echo $t005_periode_edit->isaktif->editAttributes() ?>>
	<label class="custom-control-label" for="x_isaktif[]"></label>
</div>
</span>
<?php echo $t005_periode_edit->isaktif->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t005_periode" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t005_periode_edit->id->CurrentValue) ?>">
<?php if (!$t005_periode_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t005_periode_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_periode_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t005_periode_edit->showPageFooter();
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
$t005_periode_edit->terminate();
?>