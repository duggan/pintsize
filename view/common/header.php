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
        <script type="text/javascript" src="/js/modernizr.custom.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                $('form').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                      type: 'POST',
                      url: '/?r=create',
                      dataType: 'json',
                      data: $('form').serialize(),
                      success: function(data) {
                          if (data && data.success) {
                              $('.result').html(
                                  '<form class="form-stacked"><label for="shortlink">Your Pintsized URL:</label><input id="shortlink" class="xxlarge" type="text" value="http://pintsize.orchestra.io/?r=go&shortcode='+ data.success.shortcode +'" /> <a href="http://pintsize.orchestra.io/?r=go&shortcode='+ data.success.shortcode +'">link</a></form>'
                              );
                          } else if (data && data.failure){
                              $('.result').html(
                                  '<div class="alert-message error">'+ data.failure +'</div>'
                              );
                          } else if (data && data.retry) {
                              $('.result').html(
                                  '<div class="alert-message">' + data.retry + '</div>'
                              );
                          }
                      },
                    });
                });
            });
        </script>
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
