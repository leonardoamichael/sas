<?php

// Generate a URL with proper root
function url_for($script_path)
{
    // Add the leading '/' if not present
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

// Encode a string for use in a URL
function u($string = "")
{
    return urlencode($string);
}

// Encode a string for use in a URL (raw version)
function raw_u($string = "")
{
    return rawurlencode($string);
}

// Escape HTML special characters
function h($string = "")
{
    return htmlspecialchars($string);
}

// Send a 404 error header and exit
function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

// Send a 500 error header and exit
function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

// Redirect to a different location
function redirect_to($location)
{
    header("Location: " . $location);
    exit();
}

// Check if the request is a POST
function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// Check if the request is a GET
function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

// Display a list of errors
function display_errors($errors = array())
{
    $output = '';

    if (!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }

    return $output;
}
