/**
 * Checker class that checks data types.
 */
export default class Check {

	/**
	 * Asseses if a value is a string
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a string.
	 */
	static isString( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			( typeof value === 'string' || value instanceof String );
	}

	/**
	 * Returns if a value is really a number
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a number.
	 */
	static isNumber( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			typeof value === 'number' && isFinite( value );
	}

	/**
	 * Returns if a value is really a numeric
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a numeric.
	 */
	static isNumeric( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			! isNaN( parseFloat( value ) ) && isFinite( value );
	}

	/**
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a an array.
	 */
	static isArray( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			Array.isArray( value );
	}

	/**
	 * Returns if a value is a function
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a function.
	 */
	static isFunction( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			typeof value === 'function';
	}

	/**
	 * Returns if a value is an object
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a object.
	 */
	static isObject( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			typeof value === 'object' && value.constructor === Object;
	}

	/**
	 * Basic function to check if a object is empty
	 *
	 * @param {*} obj The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a empty object.
	 */
	static isObjectEmpty( obj ) {
		let is = true;
		if ( Check.isObject( obj ) ) {
			for ( const key in obj ) {
				if ( obj.hasOwnProperty( key ) ) {
					is = false;
					break;
				}
			}
		}
		return is;
	}

	/**
	 * Returns if a value is null
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is null.
	 */
	static isNull( value ) {
		return Check.isDefined( value ) && value === null;
	}

	/**
	 * Returns if a value is undefined even if its nested in a object as this case it will error the try/catch
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is undefined.
	 */
	static isUndefined( value ) {
		return typeof value === 'undefined';
	}

	/**
	 * Returns if a value is defined.
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is undefined.
	 */
	static isDefined( value ) {
		return typeof value !== 'undefined';
	}

	/**
	 * Returns if a value is a boolean
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a boolean.
	 */
	static isBoolean( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) && typeof value === 'boolean';
	}

	/**
	 * Returns if a value is a regexp
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a Regex.
	 */
	static isRegExp( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			typeof value === 'object' && value.constructor === RegExp;
	}

	/**
	 * Returns if value is an error object
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a error.
	 */
	static isError( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			value instanceof Error && typeof value.message !== 'undefined';
	}

	/**
	 * Returns if value is a date object
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a date.
	 */
	static isDate( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			value instanceof Date;
	}

	/**
	 * Returns if a Symbol
	 *
	 * @param {*} value The value to be assessed.
	 *
	 * @return {boolean} Returns if a value is a symbol.
	 */
	static isSymbol( value ) {
		return Check.isDefined( value ) && ! Check.isNull( value ) &&
			typeof value === 'symbol';
	}

}
