<?php
/**
	 * Show  subcategories after the category.
   * Paste it to woocommerce/includes/wc-template-functions.php
   * into function woocommerce_template_loop_category_title( $category )
	 */
$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;
$pad_counts   = 0;
$hierarchical = 1;
$title        = '';
$empty        = 0;
$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'hide_empty'   => $empty
);
?>
<?php $all_categories = get_categories( $category );
//print_r($all_categories);
foreach ($all_categories as $cat) {
    //print_r($cat);
        $category_id = $cat->term_id;
        $args2 = array(
          'taxonomy'     => $taxonomy,
          'child_of'     => 0,
          'parent'       => $category_id,
          'orderby'      => $orderby,
          'show_count'   => $show_count,
          'pad_counts'   => $pad_counts,
          'hierarchical' => $hierarchical,
          'title_li'     => $title,
          'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                echo '<ul class="catalog-subcat"><li><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a></li>';
            }
        } ?>
    <?php
}
?>
