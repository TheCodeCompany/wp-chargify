<?php
/**
 * Generic library for date related methods and constants.
 *
 * @file    wp-chargify/includes/libraries/date-helper.php
 * @package Core
 */

namespace Chargify\Libraries;

use DateTime;
use DateInterval;

/**
 * Generic library for date related methods and constants.
 */
class Date_Helper {

	/**
	 * Format used to store the date in the database.
	 *
	 * SQL format.
	 */
	const DATE_FORMAT_MYSQL = 'Y-m-d H:i:s';

	/**
	 * Used to retrieve common date format for comparing days
	 */
	const DATE_FORMAT_DEFAULT = 'Y-m-d';

	/**
	 * Formats for retrieving readable date for display.
	 */
	const DATE_FORMAT_DISPLAY = 'M d Y';


	/**
	 * Format the date.
	 *
	 * @param mixed  $date   The date.
	 * @param string $format The format to use.
	 *
	 * @return string
	 * @throws \Exception
	 */
	public static function format_date( $date, $format = 'd/m/Y h:ia' ) {

		// Custom date formats
		if ( 'time-ago' == $format ) {
			return human_time_diff( strtotime( $date ), current_time( 'timestamp' ) ) . ' ago';
		}

		/*
		 * Standard PHP date formats
		 */
		$date_time = new DateTime( $date );

		return $date_time->format( $format );
	}

	/**
	 * Given the date add the number of days and return the calculated date.
	 *
	 * @param int  $days   The number of days to add to the date.
	 * @param null $date   The date, if null today's date.
	 * @param null $format The format to use for the return date, default self::DATE_FORMAT_DEFAULT.
	 *
	 * @return string
	 * @throws \Exception
	 */
	public static function add_days_to_date( $days, $date = null, $format = null ) {

		if ( null === $date ) {
			$date = current_time( self::DATE_FORMAT_DEFAULT );
		}

		if ( null === $format ) {
			$format = self::DATE_FORMAT_DEFAULT;
		}

		$date_time = new DateTime( $date );
		$interval  = new DateInterval( 'P' . $days . 'D' );

		$date_time->add( $interval );

		return $date_time->format( $format );
	}

	/**
	 * Given the date subtract the number of days and return the calculated date.
	 *
	 * @param int  $days   The number of days to subtract from the date.
	 * @param null $date   The date, if null today's date.
	 * @param null $format The format to use for the return date, default self::DATE_FORMAT_DEFAULT.
	 *
	 * @return string
	 * @throws \Exception
	 */
	public static function sub_days_from_date( $days, $date = null, $format = null ) {

		if ( null === $date ) {
			$date = current_time( self::DATE_FORMAT_DEFAULT );
		}

		if ( null === $format ) {
			$format = self::DATE_FORMAT_DEFAULT;
		}

		$date_time = new DateTime( $date );
		$interval  = new DateInterval( 'P' . $days . 'D' );

		$date_time->sub( $interval );

		return $date_time->format( $format );
	}

	/**
	 * Specifically date, not time, check that today's date is in between or in between
	 * and inclusive of date ranges start and end.
	 *
	 * @param string $start_date The start of the range being compared against today.
	 * @param string $end_date   The end of the range being compared against today.
	 * @param bool   $inclusive  Include the range dates, so today's can be assessed on or not on the date ranges.
	 *
	 * @return bool|null
	 */
	public static function date_is_today_in_range( $start_date, $end_date, $inclusive = false ) {
		$is_today_in_range = null;

		if ( is_string( $start_date ) && is_string( $end_date ) ) {
			$is_today_in_range = self::date_is_before_today( $start_date, $inclusive ) && self::date_is_after_today( $end_date, $inclusive );
		}

		return $is_today_in_range;
	}

	/**
	 * Specifically date, not time, check that the date provided is after today's date.
	 *
	 * @param string $date      The date being compared against today.
	 * @param bool   $inclusive Include the range dates, so today's can be assessed on or not on the date ranges.
	 *
	 * @return bool|null
	 */
	public static function date_is_before_today( $date, $inclusive = false ) {
		$is_after_today = null;

		if ( is_string( $date ) ) {
			$today = new \DateTime( current_time( self::DATE_FORMAT_DEFAULT ) );
			$date  = new \DateTime( $date );

			// Dependent on inclusive flag, check if the today is on or before the provided date.
			$is_after_today = $today && $date &&
				(
					( ! $inclusive && $date < $today ) ||
					( $inclusive && $date <= $today )
				);
		}

		return $is_after_today;
	}

	/**
	 * Specifically date, not time, check that the date provided is after today's date.
	 *
	 * @param string $date      The date being compared against today.
	 * @param bool   $inclusive Include the range dates, so today's can be assessed on or not on the date ranges.
	 *
	 * @return bool|null
	 */
	public static function date_is_after_today( $date, $inclusive = false ) {
		$is_after_today = null;

		if ( is_string( $date ) ) {
			$today = new \DateTime( current_time( self::DATE_FORMAT_DEFAULT ) );
			$date  = new \DateTime( $date );

			// Dependent on inclusive flag, check if the today is on or after the provided date.
			$is_after_today = $today && $date &&
				(
					( $inclusive && $date >= $today ) ||
					( ! $inclusive && $date > $today )
				);
		}

		return $is_after_today;
	}

	/**
	 * Calculate the hours from now at this point of time.
	 *
	 * @param string $date_time Date time string.
	 *
	 * @return float|int
	 * @throws \Exception
	 */
	public static function hours_from_now( $date_time, $precision = 0 ) {
		$now   = new \DateTime( current_time( self::DATE_FORMAT_MYSQL ) );
		$then  = new \DateTime( $date_time );
		$hours = 0;

		if ( $now && $then ) {
			$time_stamp_now  = strtotime( $now->format( self::DATE_FORMAT_MYSQL ) );
			$time_stamp_then = strtotime( $then->format( self::DATE_FORMAT_MYSQL ) );

			$hours = ( $time_stamp_then - $time_stamp_now ) / ( 60 * 60 );
		}

		if ( is_float( $hours ) ) {
			$hours = round( $hours, $precision );
		}
		//
		//		if ( $int ) {
		//			$hours = (int) $int;
		//		}

		return $hours;
	}

	/**
	 * Calculate the hours before now at this point of time.
	 *
	 * @param string $date_time Date time string.
	 *
	 * @return float|int
	 * @throws \Exception
	 */
	public static function hours_before_now( $date_time ) {
		return self::hours_from_now( $date_time ) * - 1;
	}

}
