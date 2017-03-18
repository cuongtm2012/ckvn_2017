<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <!-- Bootstrap v4.x stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    

    <!-- pager plugin -->
    <style>
    .bootstrap-datetimepicker-widget tr:hover {
        background-color: #808080;
    }
    </style>
    
    <script>
        $(document).ready(function(){

  //Initialize the datePicker(I have taken format as mm-dd-yyyy, you can     //have your owh)
  $("#weeklyDatePicker").datetimepicker({
      format: 'MM-DD-YYYY'
  });

   //Get the value of Start and End of Week
  $('#weeklyDatePicker').on('dp.change', function (e) {
      var value = $("#weeklyDatePicker").val();
      var firstDate = moment(value, "MM-DD-YYYY").day(0).format("MM-DD-YYYY");
      var lastDate =  moment(value, "MM-DD-YYYY").day(6).format("MM-DD-YYYY");
      $("#weeklyDatePicker").val(firstDate + " - " + lastDate);
  });
});
    
    </script>
    
</head>
<body  id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <div class="container">    
    <div class="row">
        <div class="col-sm-6 form-group">
            <div class="input-group" id="DateDemo">
              <input type='text' id='weeklyDatePicker' placeholder="Select Week" />
          </div>
      </div>
  </div>
</div>
      
   

</body>
</html>