<?php
/**
 * A controller class that adds CMB2 tabs.
 *
 * @file    wp-chargify/includes/ctrl/cmb2-tabs-controller.php
 * @package WPChargify
 */

namespace Chargify\Controllers;

use function Chargify\Libraries\wp_enqueue_script_auto_ver;
use function Chargify\Libraries\wp_enqueue_style_auto_ver;
use function Chargify\Libraries\wp_localize_script_auto_ver;
use function Chargify\Libraries\wp_register_script_auto_ver;

/**
 * A controller class that adds CMB2 tabs.
 *
 * Example:
 * $prefix = 'your_prefix_demo_';
 *
 * $cmb_demo = new_cmb2_box(
 *     [
 *         'id'            => $prefix . 'metabox',
 *         'title'         => __( 'Test Metabox', 'cmb2' ),
 *         'object_types'  => [ 'page', 'post' ], // Post type
 *         'vertical_tabs' => true, // Set vertical tabs, default false
 *         'tabs'          => [
 *             [
 *                 'id'     => 'tab-1',
 *                 'icon'   => 'dashicons-admin-site',
 *                 'title'  => 'Tab 1',
 *                 'fields' => [
 *                     $prefix . '_field_1',
 *                     $prefix . '_field_2',
 *                 ],
 *             ],
 *             [
 *                 'id'     => 'tab-2',
 *                 'icon'   => 'dashicons-align-left',
 *                 'title'  => 'Tab 2',
 *                 'fields' => [
 *                     $prefix . '_field_3',
 *                     $prefix . '_field_4',
 *                 ],
 *             ],
 *         ]
 *     ]
 * );
 *
 * $cmb_demo->add_field(
 *     [
 *         'name' => __( 'Test field 1', 'cmb2' ),
 *         'id'   => $prefix . '_field_1',
 *         'type' => 'text',
 *     ]
 * );
 *
 * $cmb_demo->add_field(
 *     [
 *         'name' => __( 'Test field 2', 'cmb2' ),
 *         'id'   => $prefix . '_field_2',
 *         'type' => 'text',
 *     ]
 * );
 *
 * $cmb_demo->add_field(
 *     [
 *         'name' => __( 'Test field 3', 'cmb2' ),
 *         'id'   => $prefix . '_field_3',
 *         'type' => 'text',
 *     ]
 * );
 *
 * $cmb_demo->add_field(
 *     [
 *         'name' => __( 'Test field 4', 'cmb2' ),
 *         'id'   => $prefix . '_field_4',
 *         'type' => 'text',
 *     ]
 * );
 */
class CMB2TabsController {

	/**
	 * Setup the controller.
	 */
	public function __construct() {
		$this->setup();
	}

	/**
	 * Register all actions, filters and routes
	 */
	public function setup() {
		add_action( 'cmb2_before_form', [ $this, 'before_form' ], 10, 4 );
		add_action( 'cmb2_after_form', [ $this, 'after_form' ], 10, 4 );
	}

	/**
	 * Render tabs
	 *
	 * @param array  $cmb_id      The current box ID.
	 * @param int    $object_id   The ID of the current object.
	 * @param string $object_type The type of object you are working with.
	 * @param array  $cmb         This CMB2 object.
	 */
	public function before_form( $cmb_id, $object_id, $object_type, $cmb ) {

		if ( $cmb->prop( 'tabs' ) && is_array( $cmb->prop( 'tabs' ) ) ) :
			?>

			<div class="cmb-tabs-wrap cmb-tabs-<?php echo esc_attr( ( $cmb->prop( 'vertical_tabs' ) ) ? 'vertical' : 'horizontal' ); ?>">

			<div class="cmb-tabs">

				<?php
				foreach ( $cmb->prop( 'tabs' ) as $tab ) :
					$fields_selector = [];

					foreach ( $tab['fields'] as $tab_field ) :
						$class_name        = str_replace( '_', '-', sanitize_html_class( $tab_field ) );
						$fields_selector[] = '.cmb2-id-' . $class_name . ':not(.cmb2-tab-ignore)';
					endforeach;

					$fields_selector = apply_filters( 'cmb2_tabs_tab_fields_selector', $fields_selector, $tab, $cmb_id, $object_id, $object_type, $cmb );
					$fields_selector = apply_filters( 'cmb2_tabs_tab_' . $tab['id'] . '_fields_selector', $fields_selector, $tab, $cmb_id, $object_id, $object_type, $cmb );
					?>

					<div id="<?php echo esc_attr( $cmb_id . '-tab-' . $tab['id'] ); ?>"
						class="cmb-tab"
						data-fields="<?php echo esc_html( implode( ', ', $fields_selector ) ); ?>"
					>

						<?php
						if ( isset( $tab['icon'] ) && ! empty( $tab['icon'] ) ) :
							$tab['icon'] = strpos( $tab['icon'], 'dashicons' ) !== false ? 'dashicons ' . $tab['icon'] : $tab['icon']
							?>
							<span class="cmb-tab-icon">
								<i class="<?php echo esc_html( $tab['icon'] ); ?>"></i>
							</span>
						<?php endif; ?>

						<?php if ( isset( $tab['title'] ) && ! empty( $tab['title'] ) ) : ?>
							<span class="cmb-tab-title">
								<?php echo esc_html( $tab['title'] ); ?>
							</span>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>

			</div>
			<?php
		endif;
	}

	/**
	 * Close tabs
	 *
	 * @param array  $cmb_id      The current box ID.
	 * @param int    $object_id   The ID of the current object.
	 * @param string $object_type The type of object you are working with.
	 * @param array  $cmb         This CMB2 object.
	 */
	public function after_form( $cmb_id, $object_id, $object_type, $cmb ) {
		if ( $cmb->prop( 'tabs' ) && is_array( $cmb->prop( 'tabs' ) ) ) :
			?>
			</div>
			<?php
		endif;
	}

}
