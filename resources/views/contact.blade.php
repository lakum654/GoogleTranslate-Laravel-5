<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Post Form - nicesnippets.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <style>
   .error{ color:red; } 
  </style>
</head>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-6 mt-3 offset-md-3">
            <div class="card">
               <div class="card-header bg-dark text-white">
                  <h6>laravel 6 Ajax Form Submission Example - nicesnippets.com</h6>
               </div>
               <div class="card-body">
                  <form id="myForm" method="post" action="javascript:void(0)">
                     @csrf
                     <div class="row">
                        <div class="col-md-12">
                           <div class="alert alert-success d-none" id="msg_div">
                                   <span id="res_message"></span>
                              </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Title<span class="text-danger">*</span></label>
                              <input type="text" name="title" placeholder="Enter Title" class="form-control">
                              <span class="text-danger p-1">{{ $errors->first('title') }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>E-Mail<span class="text-danger">*</span></label>
                              <input type="text" name="email" placeholder="Enter Title" class="form-control">
                              <span class="text-danger p-1">{{ $errors->first('email') }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Body<span class="text-danger">*</span></label>
                              <textarea class="form-control" rows="3" name="body" placeholder="Enter Body Text"></textarea>
                              <span class="text-danger">{{ $errors->first('body') }}</span>
                           </div>
                        </div>
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236295.17177196135!2d70.68120823605128!3d22.273744615146114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad3b!2sRajkot%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1610948396419!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;width: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <button type="submit" id="send_form" class="btn btn-block btn-success">Submit</button>
                        </div>   
                     </div>
                  </form>
               </div>
            </div> 
         </div>
      </div>

   </div>
</body>
<script>
   if ($("#myForm").length > 0) {
    $("#myForm").validate({
      
    rules: {
      title: {
        required: true,
        maxlength: 50
      },
      body: {
        required: true,
        minlength:50,
        maxlength: 250
      },
      email:{
        required: true,
        email:true
      }
    },

    messages: {
      title: {
        required: "Please Enter Name",
        maxlength: "Your last name maxlength should be 50 characters long."
      },
      body: {
        required: "Please Enter Body",
        maxlength: "Your last body maxlength should be 250 characters long."
      },
      email:{
        required:"Please Enter E-Mail."
      }
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#send_form').html('Sending..');
      $.ajax({
        url: '/save-form' ,
        type: "POST",
        data: $('#post-form').serialize(),
        success: function( response ) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');
 
            document.getElementById("post-form").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);
        }
      });
    }
  })
}
</script>
</html>
