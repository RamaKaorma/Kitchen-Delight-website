<?php

  // is_blank('abcd')
  // validate data presence
  // trim() ensures no empty spaces count
  // uses === to ensure value is exactly the same
  // better than empty() which considers "0" to be empty
  // returns true if the value is blank, false if the value is not blank
  function is_blank($value) {
    return empty($value) || trim($value) === '';
  }

  // has_presence('abcd')
  // validate data presence
  // reverse of is_blank()
  // if the value is not blank, has_present is true.
  function has_presence($value) {
    return !is_blank($value);
  }

  // has_length_greater_than('abcd', 3)
  // validate string length
  // spaces do not count towards length
  function has_length_greater_than($value, $min) {
    $length = trim(strlen($value));
    return $length > $min;
  }

  // has_length_less_than('abcd', 5)
  // validate string length
  // spaces do not count towards length
  function has_length_less_than($value, $max) {
    $length = trim(strlen($value));
    return $length < $max;
  }

  // has_length_exactly('abcd', 4)
  // validate string length
  // spaces do not count towards length
  function has_length_exactly($value, $exact) {
    $length = trim(strlen($value));
    return $length == $exact;
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  // validate string length
  // combines functions_greater_than, _less_than, _exactly
  // spaces count towards length
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_inclusion_of( 5, [1,3,5,7,9] ) --- This returns true
  // validate inclusion in a set
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  // has_exclusion_of( 5, [1,3,5,7,9] ) --- This returns false
  // validate exclusion from a set
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  // has_string('nobody@nowhere.com', '.com') --- This reutrns true
  // validate inclusion of character(s)
  // strpos returns string start position or false
  // uses !== to prevent position 0 from being considered false
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  // has_valid_email_format('nobody@nowhere.com')
  // validate correct format for email addresses
  // format: [str]@[str].[2+ letters] **after the . it could have com, vic.edu.au or others
  // preg_match is helpful, uses a regular expression
  // returns 1 for a match, 0 for no match
  // http://php.net/manual/en/function.preg-match.php
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

?>
