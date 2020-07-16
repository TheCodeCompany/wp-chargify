<?php
/**
 * A factory to produce `Model`s
 *
 * @file wp-chargify/includes/libraries/model-factory.php
 * @package WPChargify
 */

namespace Chargify\Libraries;

/**
 * Object which is responsible for producing `Model` instances.
 * All `Model_Factory`s are available via their slug from controllers.  Like so:
 *
 * PostFactory would be:
 * $this->post->get_by_id( 123 )
 * $this->user->get_by_email( 'test@email.com' );
 *
 * The slug is derived from the class name, minus the trailing 'Factory'.  All lowercase.
 */
class Model_Factory { }
