
  $('#en').keypress(function(e) {
      if(e.which == 13) {
          var key=$('#en').val();
          var url="showbook.php?q="+key;
          location.href=url;
      }
  });

function k() {
  var key=$('#en').val();
  var url="showbook.php?q="+key;
  location.href=url;
}
