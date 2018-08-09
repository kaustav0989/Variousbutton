$(document).ready(function() {
  
  $("#fname_error_message").hide();
  $("#lname_error_message").hide();
  $("#ftname_error_message").hide();
  $("#gender_error_message").hide();
  $("#year_error_message").hide();
  $("#class_error_message").hide();
  $("#section_error_message").hide();
  $("#roll_error_message").hide();
  $("#status_error_message").hide();
  $("#contact_error_message").hide();
  $("#pin_error_message").hide();

  var error_fname   = false;
  var error_lname   = false;
  var error_ftname  = false;
  var error_gender  = false;
  var error_year    = false;
  var error_class   = false;
  var error_section = false;
  var error_roll    = false;
  var error_status  = false;
  var error_roll    = false;
  var error_contact = false;
  var error_pin     = false;

  $("#first_name").focusout(function(){
    check_fname();
  });

  $("#last_name").focusout(function(){
    check_lname();
  });

  $("#father").focusout(function(){
    check_father();
  });

  $("#gender").focusout(function(){
    check_gender();
  });

  $("#year").focusout(function(){
    check_fname();
  });

  $("#class").focusout(function(){
    check_class();
  });

  $("#section").focusout(function(){
    check_section();
  });

  $("#roll").focusout(function(){
    check_roll();
  });

  $("#status").focusout(function(){
    check_status();
  });

  $("#contact").focusout(function(){
      check_contact();
    });

  $("#pin").focusout(function(){
      check_pin();
    });


  function check_fname()
  {
    var fname_length= $("#first_name").val().length;
    if( fname_length < 1 )
    {
      $("#fname_error_message").html("Required");
      $("#fname_error_message").show();
      error_fname = true;  
      $flag = 0;    
    }
    else
    {
      $("#fname_error_message").hide();
    } 
  }

  function check_lname()
  {
    var fname_length= $("#last_name").val().length;
    if( fname_length < 1 )
    {
      $("#lname_error_message").html("Required");
      $("#lname_error_message").show();
      error_lname = true; 
      $flag = 0;    
    }
    else
    {
      $("#lname_error_message").hide();
      $flag = 1;
    } 
  }

  function check_father()
  {
    var father_length= $("#father").val().length;
    if( father_length < 1 )
    {
      $("#ftname_error_message").html("Required");
      $("#ftname_error_message").show();
      error_ftname = true; 
      $flag = 0;    
    }
    else
    {
      $("#ftname_error_message").hide();
      $flag = 1;
    } 
  }

  function check_gender()
  {
    var gender_length= $("#gender").val().length;
    if( gender_length < 1 )
    {
      $("#gender_error_message").html("Required");
      $("#gender_error_message").show();
      error_gender = true; 
      $flag = 0;    
    }
    else
    {
      $("#gender_error_message").hide();
      $flag = 1;
    } 
  }

  function check_year()
  {
    var year_length= $("#year").val().length;
    if( year_length < 1 )
    {
      $("#year_error_message").html("Required");
      $("#year_error_message").show();
      error_year = true; 
      $flag = 0;    
    }
    else
    {
      $("#year_error_message").hide();
      $flag = 1;
    } 
  }

  function check_class()
  {
    var year_length= $("#class").val().length;
    if( year_length < 1 )
    {
      $("#class_error_message").html("Required");
      $("#class_error_message").show();
      error_class = true; 
      $flag = 0;    
    }
    else
    {
      $("#class_error_message").hide();
      $flag = 1;
    } 
  }

  function check_status()
  {
    var status_length= $("#status").val().length;
    if( status_length < 1 )
    {
      $("#status_error_message").html("Required");
      $("#status_error_message").show();
      error_status = true; 
      $flag = 0;    
    }
    else
    {
      $("#status_error_message").hide();
      $flag = 1;
    } 
  }

  function check_roll()
  {
    var regEx  = /[^0-9]/;
    var roll= $("#roll").val();
    if( roll.length < 1 || roll.match(regEx))
    {
      $("#roll_error_message").html("Required");
      $("#roll_error_message").show();
      error_class = true; 
      $flag = 0;    
    }
    else
    {
      $("#roll_error_message").hide();
      $flag = 1;
    } 
  }

  function check_contact()
  {
    //var regEx   = new RegExp("[0-9]");
    var regEx  = /[^0-9]/;
    var contact = $("#contact").val();
    if( contact.length != 10 || contact.match(regEx))
    {
      $("#contact_error_message").html("Enter a valid mobile number");
      $("#contact_error_message").show();
      error_contact = true; 
      $flag = 0;    
    }
    else
    {
      $("#contact_error_message").hide();
      $flag = 1;
    } 
  }

  function check_pin()
  {
    //var regEx   = new RegExp("[0-9]");
    var regEx  = /[^0-9]/;
    var pin = $("#pin").val();
    if( pin.length != 6 || pin.match(regEx))
    {
      $("#pin_error_message").html("Enter a valid pin number");
      $("#pin_error_message").show();
      error_pin = true; 
      $flag = 0;    
    }
    else
    {
      $("#pin_error_message").hide();
      $flag = 1;
    } 
  }

  $('#add_form_id').submit(function() {
    

    error_fname  = false;
    error_lname  = false;
    error_ftname = false;
    error_gender = false;
    error_year   = false; 
    error_class  = false; 
    error_roll   = false; 
    error_contact= false;
    error_pin    = false; 

    check_fname();
    check_lname();
    check_father();
    check_gender();
    check_year();
    check_class();
    check_status();
    check_roll();
    check_contact();
    check_pin();

    if( error_fname ==  false && error_lname ==  false && error_ftname ==  false && error_gender ==  false
     && error_year == false && error_status == false && error_roll == false && error_contact == false && error_pin == false)
    {
      return true;
    } 

    else
    {
      return false;
    } 

  });


});