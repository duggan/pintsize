<?php
/**
 * Pintsize
 *
 * View
 * $import is available in this scope
 */

echo <<<HTML
        <h2>API</h2>

        <p>
            The API is accessible via the endpoint: <code>http://pintsize.orchestra.io/?r=api</code>
        </p>

        <p>
            To retrieve information about a specific shortcode, use: <code>http://pintsize.orchestra.io/?r=api&amp;shortcode=foo</code>
        </p>
        
        <h5>Example:</h5>
        <p>
            A request to <code>http://pintsize.orchestra.io/?r=api&amp;shortcode=example</code> will yield something like:
            <pre>
{
    "result":
            {
                "_id":{
                    "\$id":"4e7170d2edf2886b53000000"
                },
                "shortcode":"example",
                "url":"http:\/\/www.example.org"
            }
}
            </pre>
        </p>
    
HTML;

?>
