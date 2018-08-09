$(document).ready(function() {


  $('#add_form_id').submit(function(e) {

   // e.preventDefault();
    var first_name =   $('#first_name').val();
    var last_name  =   $('#last_name').val();
    var gender     =   $('#gender').val();
    var section    =   $('#section').val();
    var roll       =   $('#roll').val();
    var year       =   $('#year').val();
    var status     =   $('#status').val();
    var cl         =   $('#class').val();
    var father     =   $('#father').val();
    var state      =   $('#state').val();

    var flag       =   1;

   

   //$(".add_page_error").remove();
 
    if (first_name.length < 1)
    {
      $('#first_name').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if (last_name.length < 1) 
    {
      $('#last_name').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if (gender.length < 1) 
    {
      $('#gender').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if (cl.length < 1) 
    {
      $('#class').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if (section.length < 1) 
    {
      $('#section').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if (roll.length < 1) 
    {
      $('#roll').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if (year.length < 4) 
    {
      $('#year').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if (status.length < 1) 
    {
      $('#status').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if(father.length < 1)
    {
      $('#father').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }
    if(state.length < 1)
    {
      $('#state').after('<span class="add_page_error">*Required</span>');
      flag = 0;
    }  

    if( flag == 0)
    {
      return false;
    }  
    else
    {
      return true;
    }

  });
 
});