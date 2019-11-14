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
$t005_periode_add = new t005_periode_add();

// Run the page
$t005_periode_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_periode_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_periodeadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft005_periodeadd = currentForm = new ew.Form("ft005_periodeadd", "add");

	// Validate form
	ft005_periodeadd.validate = function() {
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
			<?php if ($t005_periode_add->start->Required) { ?>
				elm = this.getElements("x" + infix + "_start");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_periode_add->start->caption(), $t005_periode_add->start->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_periode_add->start->errorMessage()) ?>");
			<?php if ($t005_periode_add->end->Required) { ?>
				elm = this.getElements("x" + infix + "_end");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_periode_add->end->caption(), $t005_periode_add->end->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_end");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_periode_add->end->errorMessage()) ?>");
			<?php if ($t005_periode_add->isaktif->Required) { ?>
				elm = this.getElements("x" + infix + "_isaktif[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_periode_add->isaktif->caption(), $t005_periode_add->isaktif->RequiredErrorMessage)) ?>");
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
	ft005_periodeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_periodeadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft005_periodeadd.lists["x_isaktif[]"] = <?php echo $t005_periode_add->isaktif->Lookup->toClientList($t005_periode_add) ?>;
	ft005_periodeadd.lists["x_isaktif[]"].options = <?php echo JsonEncode($t005_periode_add->isaktif->options(FALSE, TRUE)) ?>;
	loadjs.done("ft005_periodeadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_periode_add->showPageHeader(); ?>
<?php
$t005_periode_add->showMessage();
?>
<form name="ft005_periodeadd" id="ft005_periodeadd" class="<?php echo $t005_periode_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_periode">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t005_periode_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t005_periode_add->start->Visible) { // start ?>
	<div id="r_start" class="form-group row">
		<label id="elh_t005_periode_start" for="x_start" class="<?php echo $t005_periode_add->LeftColumnClass ?>"><?php echo $t005_periode_add->start->caption() ?><?php echo $t005_periode_add->start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_periode_add->RightColumnClass ?>"><div <?php echo $t005_periode_add->start->cellAttributes() ?>>
<span id="el_t005_periode_start">
<input type="text" data-table="t005_periode" data-field="x_start" data-format="7" name="x_start" id="x_start" size="10" maxlength="19" placeholder="<?php echo HtmlEncode($t005_periode_add->start->getPlaceHolder()) ?>" value="<?php echo $t005_periode_add->start->EditValue ?>"<?php echo $t005_periode_add->start->editAttributes() ?>>
<?php if (!$t005_periode_add->start->ReadOnly && !$t005_periode_add->start->Disabled && !isset($t005_periode_add->start->EditAttrs["readonly"]) && !isset($t005_periode_add->start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft005_periodeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft005_periodeadd", "x_start", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t005_periode_add->start->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_periode_add->end->Visible) { // end ?>
	<div id="r_end" class="form-group row">
		<label id="elh_t005_periode_end" for="x_end" class="<?php echo $t005_periode_add->LeftColumnClass ?>"><?php echo $t005_periode_add->end->caption() ?><?php echo $t005_periode_add->end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_periode_add->RightColumnClass ?>"><div <?php echo $t005_periode_add->end->cellAttributes() ?>>
<span id="el_t005_periode_end">
<input type="text" data-table="t005_periode" data-field="x_end" data-format="7" name="x_end" id="x_end" size="10" maxlength="19" placeholder="<?php echo HtmlEncode($t005_periode_add->end->getPlaceHolder()) ?>" value="<?php echo $t005_periode_add->end->EditValue ?>"<?php echo $t005_periode_add->end->editAttributes() ?>>
<?php if (!$t005_periode_add->end->ReadOnly && !$t005_periode_add->end->Disabled && !isset($t005_periode_add->end->EditAttrs["readonly"]) && !isset($t005_periode_add->end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft005_periodeadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft005_periodeadd", "x_end", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t005_periode_add->end->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_periode_add->isaktif->Visible) { // isaktif ?>
	<div id="r_isaktif" class="form-group row">
		<label id="elh_t005_periode_isaktif" class="<?php echo $t005_periode_add->LeftColumnClass ?>"><?php echo $t005_periode_add->isaktif->caption() ?><?php echo $t005_periode_add->isaktif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_periode_add->RightColumnClass ?>"><div <?php echo $t005_periode_add->isaktif->cellAttributes() ?>>
<span id="el_t005_periode_isaktif">
<?php
$selwrk = ConvertToBool($t005_periode_add->isaktif->CurrentValue) ? " checked" : "";
?>
<div class="custom-control custom-checkbox d-inline-block">
	<input type="checkbox" class="custom-control-input" data-table="t005_periode" data-field="x_isaktif" name="x_isaktif[]" id="x_isaktif[]" value="1"<?php echo $selwrk ?><?php echo $t005_periode_add->isaktif->editAttributes() ?>>
	<label class="custom-control-label" for="x_isaktif[]"></label>
</div>
</span>
<?php echo $t005_periode_add->isaktif->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t005_periode_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t005_periode_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_periode_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t005_periode_add->showPageFooter();
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
$t005_periode_add->terminate();
?>