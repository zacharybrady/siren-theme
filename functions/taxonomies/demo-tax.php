


		<?php

			add_action( 'init', 'create_demo_taxonomy', 0 );


			function create_demo_taxonomy() {

				
				$labels = array(
					'name' => _x( 'Demo Tax', 'taxonomy general name' ),
					'singular_name' => _x( 'Demo Taxes', 'taxonomy singular name' ),
					'search_items' =>  __( 'Search Demo Tax' ),
					'all_items' => __( 'All Demo Taxes' ),
					'parent_item' => __( 'Parent Demo Tax' ),
					'parent_item_colon' => __( 'Parent Demo Tax' ),
					'edit_item' => __( 'Edit Demo Tax' ),
					'update_item' => __( 'Update Demo Tax' ),
					'add_new_item' => __( 'Add New Demo Tax' ),
					'new_item_name' => __( 'New Demo Tax' ),
				); 	

				register_taxonomy( 'demo', null, array(
					'hierarchical' => true,
					'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
					'show_ui' => true,
					'query_var' => true,
					'rewrite' => array( 'slug' => 'demo' ),
				));
				
				}

		?>