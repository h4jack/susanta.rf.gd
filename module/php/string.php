<?php
function is_uname($input)
{
    // Check if the username is valid
    // Must start with a lowercase letter and can contain lowercase letters, digits, underscores, and dots
    // Cannot have consecutive dots or dots at the beginning or end
    $pattern = '/^(?!.*\.\.)(?!^\.)(?!\.$)[a-z0-9_\.]+$/';

    // Ensure the length is between 4 and 30 characters
    if (preg_match($pattern, $input) && strlen($input) >= 4 && strlen($input) <= 30) {
        return true;
    } else {
        return false;
    }
}

function is_email($input)
{
    // Define a regular expression pattern for validating email addresses
    // Basic validation for common email formats
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    // Ensure the email is valid
    if (preg_match($pattern, $input)) {
        return true;
    } else {
        return false;
    }
}

function isAllowedDomain($url) {
    // Define allowed domains
    $allowedDomains = [
        'localhost',
        'susantamandi.in'
    ];

    // Parse the URL to extract the host
    $parsedUrl = parse_url($url);
    $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';

    // Check if the host matches any allowed domain
    foreach ($allowedDomains as $domain) {
        if (strpos($host, $domain) !== false) {
            return true;
        }
    }
    return false;
}


?>