$(document).ready(function() {
 
  $('#student_add').submit(function(e) {
    e.preventDefault();
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

   

    $(".add_page_error").remove();
 
    if (first_name.length < 1)
    {
      $('#first_name').after('<span class="add_page_error">This field is required</span>');
    }
    if (last_name.length < 1) 
    {
      $('#last_name').after('<span class="add_page_error">This field is required</span>');
    }
    if (gender.length < 1) 
    {
      $('#gender').after('<span class="add_page_error">This field is required</span>');
    }
    if (cl.length < 1) 
    {
      $('#class').after('<span class="add_page_error">This field is required</span>');
    }
    if (section.length < 1) 
    {
      $('#section').after('<span class="add_page_error">This field is required</span>');
    }
    if (roll.length < 1) 
    {
      $('#roll').after('<span class="add_page_error">This field is required</span>');
    }
    if (year.length < 1) 
    {
      $('#year').after('<span class="add_page_error">This field is required</span>');
    }
    if (status.length < 1) 
    {
      $('#status').after('<span class="add_page_error">This field is required</span>');
    }
    if(father.length < 1)
    {
      $('#father').after('<span class="add_page_error">This field is required</span>');
    }
    if(state.length < 1)
    {
      $('#state').after('<span class="add_page_error">This field is required</span>');
    }  
    
  });
 
});