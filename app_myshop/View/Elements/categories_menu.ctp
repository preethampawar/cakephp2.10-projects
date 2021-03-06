<?php
App::uses('Category', 'Model');
$categoryModel = new Category;
$categories = $categoryModel->getCategories($this->Session->read('Site.id'));
?>
<ul class="list-group list-group-flush">
<?php
if (!empty($categories)) {
	foreach ($categories as $row) {
		$categoryID = $row['Category']['id'];
		$categoryName = Inflector::humanize($row['Category']['name']);
		$categoryNameSlug = Inflector::slug($row['Category']['name'], '-');
		?>
		<li class="list-group-item px-0 py-1">
			<a
				class="nav-link d-flex justify-content-between"
				href="/products/show/<?php echo $categoryID; ?>/<?php echo $categoryNameSlug; ?>"
				title="<?php echo $categoryName; ?>"
			>
				<span><?php echo $categoryName; ?></span>
				<span class="text-primary">
					<i class="fa fa-chevron-right"></i>
				</span>
			</a>

		</li>
		<?php
	}
	?>
	<li class="list-group-item px-0 pt-2">
		<a class="nav-link" href="/products/showAll" title="Show all products">
			<i class="fa fa-chevron-circle-right"></i> Show All Products
		</a>
	</li>
	<?php
} else {
	?>
	<li class="list-group-item px-0 pt-2">
		No categories found
	</li>
	<?php
}
?>
</ul>
