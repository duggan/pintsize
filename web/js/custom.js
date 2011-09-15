$(document).ready(function(){

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
        function(data){
            $('#latitude').val(data.coords.latitude);
            $('#longitude').val(data.coords.longitude);
        },
        function(){
        });
    }

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

