<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
$('.response').hide();
$(function() {
  var form = $("#contactForm");
  form.submit(function(e){

    $(this).attr("disabled", "disabled");
    e.preventDefault();
    $.ajax({
      type: form.attr("method"),
      url: form.attr("action"),
      data: form.serialize(),
      dataType:"json",
      success: function(data){
        if(data.response == "success"){
          $('.response').show();
          $('.default-score').hide();
          $('.score-after-verif').text(data.score);
          $('.message-score').text(data.message);
          $('.score-after-verif').show();
        }
      },
      error: function(data){
        $(".response").text("Error");
      }
    });

  });

});
</script>
</body>

</html>
<?php unset($_SESSION['table']);?>
