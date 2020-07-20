<!-- Хлебные крошки -->
<div class="breadcrumbs mb-6">
	<?php 
		$current_term_id = get_queried_object()->term_id; 
		if ( function_exists('pll_get_term') ) {
			$getCurrentTermId = pll_get_term($current_term_id);
		} else {
			$getCurrentTermId = $current_term_id;
		}
	?>
	<!-- Проверяем parent term или child term -->
	<?php 
		$term = get_term_by('slug', get_query_var('term'), 'cats');
		if((int)$term->parent)
		  $current_term_is = 'child';
		else
			$current_term_is = 'parent';
	?>

	<span typeof="v:Breadcrumb"> 
		<a href="<?php echo home_url(); ?>" rel="v:url" property="v:title" class="my_yellow_color">
			<?php _e( 'Главная', 's-cast' ); ?>
		</a> 
		› 
	</span>
	<?php if($current_term_is == 'child'): ?>
		<span typeof="v:Breadcrumb">
			<?php 
				$ancestors = get_ancestors( $getCurrentTermId, 'cats' );
				foreach($ancestors as $ancestor); {
					$parent_term_data = get_term($ancestor, 'cats');
					$parent_name = $parent_term_data->name;
					$parent_link = get_term_link($parent_term_data);
					echo '<a href="' . $parent_link .'" rel="v:url" property="v:title" class="my_yellow_color">' . $parent_name . '</a> › ';
				}
			?>
		</span>
	<?php endif; ?>
	<span typeof="v:Breadcrumb"> <?php single_term_title(); ?>  </span>
</div>