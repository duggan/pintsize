<?php
/**
 * Pintsize
 *
 * View
 * $import is available in this scope
 */

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        <title>{$import['title']}</title>
        <link rel="stylesheet" href="/css/bootstrap-1.2.0.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="/js/custom.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>

    <div class="container">
            <h1>Pintsize <small>URL shortener</small></h1>

HTML;
?>
