<?php
/**
 * Utility to use for HTTP Methods, avoids phpcs ignore rules throughout the site.
 * Currently this class does not sanitize, only stores for ease of retrieval.
 *
 * @file    wp-chargify/includes/libraries/requests.php
 * @package WPChargify
 */

namespace Chargify\Libraries;

/**
 * Utility to use for HTTP Methods, avoids phpcs ignore rules throughout the site.
 * Stores contents to individually retrieve variables by name/keys.
 *
 * Currently this class does not sanitize, only stores for ease of retrieval.
 */
class Requests {

	/**
	 * Contains the $_REQUEST.
	 *
	 * @var null
	 */
	protected $request_variables = null;

	/**
	 * Contains the $_POST.
	 *
	 * @var null
	 */
	protected $post_variables = null;

	/**
	 * Contains the $_FILES.
	 *
	 * @var null
	 */
	protected $file_variables = null;

	/**
	 * Contains the $_GET.
	 *
	 * @var null
	 */
	protected $get_variables = null;

	/**
	 * Initialize by setting up all http request methods variables.
	 */
	public function __construct() {
		$this->request_variables();
		$this->post_variables();
		$this->file_variables();
		$this->get_variables();
	}

	/**
	 * Get the $_REQUEST variables.
	 *
	 * @param null|string $key     Key used to target value in $_REQUEST.
	 * @param string      $default $default if key not found.
	 *
	 * @return null|mixed
	 */
	public function request_variables( $key = null, $default = '' ) {

		if ( null === $this->request_variables ) {
			$this->request_variables = $_REQUEST; // phpcs:ignore
		}

		if ( null !== $key ) {
			$return = isset( $this->request_variables[ $key ] ) ? $this->request_variables[ $key ] : $default;
		} else {
			$return = $this->request_variables;
		}

		return $return;
	}

	/**
	 * Get the $_POST variables.
	 *
	 * @param null|string $key     Key used to target value in $_POST.
	 * @param string      $default $default if key not found.
	 *
	 * @return null|string|array
	 */
	public function post_variables( $key = null, $default = '' ) {

		if ( null === $this->post_variables ) {
			$this->post_variables = $_POST; // phpcs:ignore
		}

		if ( null !== $key ) {
			if ( isset( $this->post_variables[ $key ] ) && ! empty( $this->post_variables[ $key ] ) ) {
				$return = $this->post_variables[ $key ];
			} else {
				$return = $default;
			}
		} else {
			$return = $this->post_variables;
		}

		return $return;
	}

	/**
	 * Get the $_FILES variables.
	 *
	 * @param null|string $key     Key used to target value in $_POST.
	 * @param string      $default $default if key not found.
	 *
	 * @return null|string|array
	 */
	public function file_variables( $key = null, $default = '' ) {

		if ( null === $this->file_variables ) {
			$this->file_variables = $_FILES; // phpcs:ignore
		}

		if ( null !== $key ) {
			if ( isset( $this->file_variables[ $key ] ) && ! empty( $this->file_variables[ $key ] ) ) {
				$return = $this->file_variables[ $key ];
			} else {
				$return = $default;
			}
		} else {
			$return = $this->file_variables;
		}

		return $return;
	}

	/**
	 * Get the $_GET variables.
	 *
	 * @param null|string $key     Key used to target value in $_GET.
	 * @param string      $default $default if key not found.
	 *
	 * @return null|string|array
	 */
	public function get_variables( $key = null, $default = '' ) {

		if ( null === $this->get_variables ) {
			$this->get_variables = $_GET; // phpcs:ignore
		}

		if ( null !== $key ) {
			$return = isset( $this->get_variables[ $key ] ) ? $this->get_variables[ $key ] : $default;
		} else {
			$return = $this->get_variables;
		}

		return $return;
	}

}
