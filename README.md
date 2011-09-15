Pintsize
========

     Pintsize
     URL shortener
      _____
     (     )
      |   |
      |   |
      -----


Pintsize is a URL shortener written using PHP 5.3, using MongoDB at the back.

It can generate random URLs, or accept custom URLs (alphanumeric characters).

It'll let people know in a friendly way if a URL has already been taken, and suggest an alternative.

It's also possible for users to get information about the short URL by sticking a + modifier at the end (like bit.ly!)

Supply latlong coordinates to the shortener to find any URLs which have been added within 50k of that location.

There's also a basic API available!

Exceptions are thrown with HTTP status code style error numbering.

