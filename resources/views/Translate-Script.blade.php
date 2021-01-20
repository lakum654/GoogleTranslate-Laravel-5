<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('.target').on('change',function(){
          var target = $(this).val();
          $.ajax({
              url:"{{url('/setTarget')}}",
              type:"POST",
              dataType:'json',
              data:{"_token": "{{ csrf_token() }}","target":target},
              success: function(data) {
                location.reload();
              },
              error: function(e) {

              }
          });
      });
  </script>