
  $('#stt').keypress(function(e) {
      if(e.which == 13) {
          var key=$('#stt').val();
          var url="showstudent.php?q="+key;
          location.href=url;
      }
  });


    $('#en').keypress(function(e) {
        if(e.which == 13) {
            var key=$('#en').val();
            var url="ashowbook.php?q="+key;
            location.href=url;
        }
    });
    function k() {
      var key=$('#stt').val();
      var url="showstudent.php?q="+key;
      location.href=url;
    }
    function l() {
      var ley=$('#en').val();
      var url="ashowbook.php?q="+ley;
      location.href=url;
    }
