<?php
/**
 * Custom Post Meta Box
 *
 * @link https://mightythemes.com
 *
 * @package MightyThemes
 * @author MightyThemes
 * @since 1.0.0
 */

/**
 * Custom Meta Boxes setup
 */
if ( ! class_exists( 'MTBlog_Meta_Boxes' ) ) {

	class MTBlog_Meta_Boxes {
        
        private static $instance;
        
		private static $meta_option;

		/**
		 * Creating instance of current class
		 */
		public static function create_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
        }
        
		public function __construct() {

			add_action( 'load-post.php', array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }
        
		public function init_metabox() {

			add_action( 'add_meta_boxes', array( $this, 'setup' ) );
            add_action( 'save_post', array( $this, 'save' ) );
            
			/**
			 * Set metabox options
			 */
			self::$meta_option = apply_filters(
				'mtblog_meta_box_options',
				array(
					'mtblog-sidebar-status'     => array(
						'default'  => 'default',
						'sanitize' => 'FILTER_DEFAULT',
					),
				)
			);
		}

		/**
		 *  Setup Metabox
		 */
		function setup() {

            add_meta_box(
                'mtblog_metabox_settings',
                'MT-Blog Settings',
                array( $this, 'render_meta_box' ),
                array( 'post', 'page' ),
                'side',
                'default'
            );
                    
		}

		/**
		 * Get metabox options
		 */
		public static function get_meta_option() {
			return self::$meta_option;
		}

		/**
		 * Renders Metabox in Post Gutenberg Editor
		 */
		function render_meta_box( $post ) {

			wp_nonce_field( basename( __FILE__ ), 'mtblog_metabox_settings' );
			$stored = get_post_meta( $post->ID );

			// Set stored and override defaults.
			foreach ( $stored as $key => $value ) {
				self::$meta_option[ $key ]['default'] = ( isset( $stored[ $key ][0] ) ) ? $stored[ $key ][0] : '';
			}

			// Get defaults.
			$meta = self::get_meta_option();

			/**
			 * Get options
			 */
            $post_sidebar = ( isset( $meta['mtblog-sidebar-status']['default'] ) ) ? $meta['mtblog-sidebar-status']['default'] : 'default';

            do_action( 'mtblog_meta_box_before_render', $meta );

			/**
			 * Dropdown: Sidebar
			 */
			?>
			<div class="mtblog-custom-meta-element">
				<p>
					<strong> <?php esc_html_e( 'Sidebar', 'mtblog' ); ?> </strong>
				</p>
				<select style="width: 100%;" name="mtblog-sidebar-status" id="mtblog-sidebar-status">
					<option value="default" <?php selected( $post_sidebar, 'default' ); ?> > <?php esc_html_e( 'Default', 'mtblog' ); ?></option>
					<option value="left" <?php selected( $post_sidebar, 'left' ); ?> > <?php esc_html_e( 'Left Sidebar', 'mtblog' ); ?></option>
					<option value="right" <?php selected( $post_sidebar, 'right' ); ?> > <?php esc_html_e( 'Right Sidebar', 'mtblog' ); ?></option>
					<option value="none" <?php selected( $post_sidebar, 'none' ); ?> > <?php esc_html_e( 'No Sidebar', 'mtblog' ); ?></option>
				</select>
			</div>
			
			<?php
			
		}

		/**
		 * Metabox Save
		 */
		function save( $post_id ) {

			// Checks save status.
			$is_autosave    = wp_is_post_autosave( $post_id );
			$is_revision    = wp_is_post_revision( $post_id );
			$is_valid_nonce = ( isset( $_POST['mtblog_metabox_settings'] ) && wp_verify_nonce( $_POST['mtblog_metabox_settings'], basename( __FILE__ ) ) ) ? true : false;

			// Exits script depending on save status.
			if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
				return;
			}

			/**
			 * Get meta options
			 */
			$post_meta = self::get_meta_option();

			foreach ( $post_meta as $key => $data ) {

				// Sanitize values.
				$sanitize_filter = ( isset( $data['sanitize'] ) ) ? $data['sanitize'] : 'FILTER_DEFAULT';

				switch ( $sanitize_filter ) {

					case 'FILTER_SANITIZE_STRING':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_STRING );
						break;

					case 'FILTER_SANITIZE_URL':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_URL );
						break;

					case 'FILTER_SANITIZE_NUMBER_INT':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_NUMBER_INT );
						break;

					default:
							$meta_value = filter_input( INPUT_POST, $key, FILTER_DEFAULT );
						break;
				}

				// Store values.
				if ( $meta_value ) {
					update_post_meta( $post_id, $key, $meta_value );
				} else {
					delete_post_meta( $post_id, $key );
				}
			}

		}
	}
}

/**
 * Creating instance by calling 'create_instance()' method
 */
MTBlog_Meta_Boxes::create_instance();
