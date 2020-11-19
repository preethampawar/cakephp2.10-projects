<?php
$this->set('enableTextEditor', true);
?>
<style type="text/css">
	.checkbox label {
		padding-left: 5px;
	}
</style>

<div>
	<div class="mt-3 d-flex justify-content-between align-items-center">
		<h5>Store Settings</h5>
		<a href="/admin/sites/home" class="btn btn-outline-warning btn-sm ml-3">Cancel</a>
	</div>

	<form action="/admin/sites/settings" id="SiteAdminEditForm" method="post" accept-charset="utf-8" ref="form">

		<div class="mt-4">
			<div class="form-check form-switch">
				<input type="hidden" name="data[Site][shopping_cart]" value="0">
				<input
					type="checkbox"
					id="SiteShoppingCart"
					name="data[Site][shopping_cart]"
					value="1"
					class="form-check-input"
					<?php echo $this->data['Site']['shopping_cart'] ? 'checked' : null; ?>
				>
				<label class="form-check-label" for="SiteShoppingCart">Enable Shopping Cart</label>
			</div>
			<div class="form-check form-switch">
				<input type="hidden" name="data[Site][under_maintenance]" value="0">
				<input
					type="checkbox"
					id="SiteUnderMaintenance"
					name="data[Site][under_maintenance]"
					value="1"
					class="form-check-input"
					<?php echo $this->data['Site']['under_maintenance'] ? 'checked' : null; ?>
				>
				<label class="form-check-label" for="SiteUnderMaintenance">Enable Maintenance Mode</label>
			</div>
		</div>

		<div class="mt-2">
			<div>
				<div class="my-3">
					<label for="SiteTitle" class="form-label">Store Title</label>
					<input
						type="text"
						id="SiteTitle"
						name="data[Site][title]"
						value="<?php echo $this->data['Site']['title']; ?>"
						class="form-control form-control-sm"
						placeholder="Enter Site Title"
						minlength="3"
						maxlength="50"
						required
					>
				</div>
				<div class="mb-3">
					<label for="SiteDescription" class="form-label">Store Description</label>
					<textarea
						id="SiteDescription"
						name="data[Site][description]"
						class="form-control form-control-sm tinymce"
						placeholder="Enter Site description"
					><?php echo $this->data['Site']['description']; ?></textarea>
				</div>
				<div class="mb-3">
					<label for="SiteContactInfo" class="form-label">Store Contact Information</label>
					<textarea
						id="SiteContactInfo"
						name="data[Site][contact_info]"
						class="form-control form-control-sm tinymce"
						placeholder="Enter Contact Information"
					><?php echo $this->data['Site']['contact_info']; ?></textarea>
				</div>
				<div class="mb-3">
					<label for="SitePaymentInfo" class="form-label">Payment Information</label>
					<textarea
						id="SitePaymentInfo"
						name="data[Site][payment_info]"
						class="form-control form-control-sm tinymce"
						placeholder="Enter Payment Related Information"
					><?php echo $this->data['Site']['payment_info']; ?></textarea>
				</div>
			</div>
			<br>
			<div class="my-3 py-3 d-inline">

				<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
				<a href="/admin/sites/home" class="btn btn-outline-secondary btn-sm ml-3">Cancel</a>
			</div>
		</div>

		<?php
		echo $this->Form->end();
		?>
</div>
<br><br>

