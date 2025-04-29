<?php

require_once('initialize.php');

// Validate if a value is blank
function is_blank($value)
{
    return !isset($value) || trim($value) === '';
}

// Validate presence of a value (not blank)
function has_presence($value)
{
    return !is_blank($value);
}

// Validate string length greater than a minimum
function has_length_greater_than($value, $min)
{
    $length = strlen($value);
    return $length > $min;
}

// Validate string length less than a maximum
function has_length_less_than($value, $max)
{
    $length = strlen($value);
    return $length < $max;
}

// Validate string length exactly
function has_length_exactly($value, $exact)
{
    $length = strlen($value);
    return $length == $exact;
}

// Validate string length based on min, max, or exact
function has_length($value, $options)
{
    if (isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
        return false;
    } elseif (isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
        return false;
    } elseif (isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
        return false;
    } else {
        return true;
    }
}

// Validate value inclusion in a set
function has_inclusion_of($value, $set)
{
    return in_array($value, $set);
}

// Validate value exclusion from a set
function has_exclusion_of($value, $set)
{
    return !in_array($value, $set);
}

// Validate string contains a required substring
function has_string($value, $required_string)
{
    return strpos($value, $required_string) !== false;
}

// Validate correct email format
function has_valid_email_format($value)
{
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
}
?>
