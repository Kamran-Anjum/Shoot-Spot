
$(document).ready(function(){

   var max_fields      = 5; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wrap"); //Fields wrappeD

  var add_button_shoot_for   = $("#addfield-shoot-for"); //Add button ID
  var add_button_package_request   = $("#addfield-package-request"); //Add button ID
  var add_button_space   = $("#addfield-space"); //Add button ID
  var add_button_equipment   = $("#addfield-equipment"); //Add button ID



  var my   = $("#my"); //Add button ID
  
  var x = 1; //initlal text box count

//adding field for shoot for
      $(add_button_shoot_for).click(function(e){ //on add input button click
        e.preventDefault();
          if(x < max_fields){ //max input box allowed
            x++; //text box increment
               $(wrapper).append('<div id="my"> <button type="button" style="margin-left:29em; margin-bottom: -1em;"    id="deletefield" class=" btn btn-circle btn-danger text-white btn-xs" >     <i class="fa fa-minus"></i>  </button>   <div class="row">  <div class="col-md-4"> <div class="form-group">  <label class="control-label">Name</label>    <input type="text" id="name" name="name[]" class="form-control" placeholder="" style="margin-right:2em;">    </div>  </div>   </div> <div class="row ">  <div class="col-md-4"> <div class="form-group">  <label>Image</label>   <input type="file" id="image" name="image[]" class="form-control" placeholder="" style="margin-right:2em;"> </div>   </div>  </div> <div class="row">  <div class="col-md-4">   <div class="form-group">  <input type="radio" id="on[]" name="isactive['+(x-1)+']" value="1" checked="checked">     <label for="on" style="margin-right: 1em;">Active</label>    <input type="radio" id="off" name="isactive['+(x-1)+']" value="0">  <label for="off">Not Active</label>   </div>   </div>  </div>   </div>'  );
            }
        });
//adding field for package request
      $(add_button_package_request).click(function(e){ //on add input button click
        e.preventDefault();
          if(x < max_fields){ //max input box allowed
            x++; //text box increment
               $(wrapper).append('<div id="my"> <button type="button" style="margin-left:29em; margin-bottom: -1em;"    id="deletefield" class=" btn btn-circle btn-danger text-white btn-xs" >     <i class="fa fa-minus"></i>  </button>   <div class="row">  <div class="col-md-4"> <div class="form-group">  <label class="control-label">Name</label>    <input type="text" id="name" name="name[]" class="form-control" placeholder="" style="margin-right:2em;">    </div>  </div>   </div> <div class="row">  <div class="col-md-4">   <div class="form-group">  <input type="radio" id="on[]" name="isactive['+(x-1)+']" value="1" checked="checked">     <label for="on" style="margin-right: 1em;">Active</label>    <input type="radio" id="off[]" name="isactive['+(x-1)+']" value="0">  <label for="off">Not Active</label>   </div>   </div>  </div>  </div>'  );
            }
        });
      //adding field for equipment
      $(add_button_equipment).click(function(e){ //on add input button click
        e.preventDefault();
          if(x < max_fields){ //max input box allowed
            x++; //text box increment
               $(wrapper).append('<div id="my"> <button type="button" style="margin-left:29em; margin-bottom: -1em;"    id="deletefield" class=" btn btn-circle btn-danger text-white btn-xs" >     <i class="fa fa-minus"></i>  </button>   <div class="row">  <div class="col-md-4"> <div class="form-group">  <label class="control-label">Name</label>    <input type="text" id="name" name="name[]" class="form-control" placeholder="" style="margin-right:2em;">    </div>  </div>   </div> <div class="row">  <div class="col-md-4">   <div class="form-group">  <input type="radio" id="on[]" name="isactive['+(x-1)+']" value="1" checked="checked">     <label for="on" style="margin-right: 1em;">Active</label>    <input type="radio" id="off" name="isactive['+(x-1)+']" value="0">  <label for="off">Not Active</label>   </div>   </div>  </div>  </div>'  );
            }
        });
      //adding field for spaces
      $(add_button_space).click(function(e){ //on add input button click
        e.preventDefault();
          if(x < max_fields){ //max input box allowed
            x++; //text box increment
               $(wrapper).append('<div id="my"> <button type="button" style="margin-left:29em; margin-bottom: -1em;"    id="deletefield" class=" btn btn-circle btn-danger text-white btn-xs" >     <i class="fa fa-minus"></i>  </button>   <div class="row">  <div class="col-md-4"> <div class="form-group">  <label class="control-label">Name</label>    <input type="text" id="name" name="name[]" class="form-control" placeholder="" style="margin-right:2em;">    </div>  </div>   </div> <div class="row">  <div class="col-md-4">   <div class="form-group">  <input type="radio" id="on[]" name="isactive['+(x-1)+']" value="1" checked="checked">     <label for="on" style="margin-right: 1em;">Active</label>    <input type="radio" id="off[]" name="isactive['+(x-1)+']" value="0">  <label for="off">Not Active</label>   </div>   </div>  </div>  </div>'  );
            }
        });

        $(wrapper).on("click","#deletefield", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent(my).remove(); x--;
        });


        // front photographer create project multiple image
        var max_file_fields = 5; //maximum input boxes allowed
        var file_wrapper = $(".file_fields_wrap"); //Fields wrapper
        var file_add_button = $(".add_file_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(file_add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_file_fields){ //max input box allowed
                x++; //text box increment
                $(file_wrapper).append('<div class="row"><div class="col-md-6 col-sm-12"><div class="form-group"><label  class="control-label">Image</label><input class="form-control" type="file" name="image[]" required=""></div></div><button style="margin-top: 33px; height: 35px;" class="fa fa-minus remove_file_field btn btn-danger">Remove</button></div>'); //add input box
            }
        });

        $(file_wrapper).on("click",".remove_file_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        });


        // photographer signup form on select function
        $('#equipment_id').on('change', function() { 
         var status_id = $(this).val();
         //alert(status_id);
         if(status_id == 1)
         {
          $("#equip_other_name").prop("readonly", false);
         }
         else{
          $("#equip_other_name").prop("readonly", true);
         }
      });
});

