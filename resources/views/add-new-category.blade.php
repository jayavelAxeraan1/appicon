@include('sidebar')

@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/x-icon" href="{{asset('public/img/favi.png')}}">
<title>Category - Add - New</title>


<!-- CSS Files -->
<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" />

<!--   Core JS Files   -->

<script src="{{asset('public/js/jquery.3.2.1.min.js')}}"></script>


<!-- Select2  -->
<script src="https://generateappicon.com/kids_education/assets/ap_assets/select2/select2.min.js" ></script>


<!--custom style-->
<style>
    .table-hover tbody tr:hover
    {
        background-color: #dde1e5;
    }
    .main-panel-custom
    {
        background-color: #DEE2E6;height: auto;
    }
	span#select2-language_name-container {
    display: none;
}
</style>



<!-- page js functions -->
<script type="text/javascript">

$(document).on('keypress change', ".required", function() {
		var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var passwordRegex =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
		var fieldId = $(this).attr('id');
		var fieldVal = $(this).val();
		if(fieldId.indexOf('email') === -1) {  var checkEmail = false; }else{ var checkEmail = true; }
		if(fieldId.indexOf('userPassword') === -1) {  var checkPassword = false; }else{ var checkPassword = true; }
		 if(checkEmail === true){
			if(!ck_email.test(fieldVal)){
				setMsg(fieldId,'Please enter a valid email id.');
			} else {
				$('#div_'+fieldId).removeClass('has-error').addClass('has-success');$('#err_'+fieldId).html('');
			}  
		}else if(checkPassword === true){
			if(!passwordRegex.test(fieldVal)){
				setMsg(fieldId,'Minimum 8  characters, upper and lowercase letters and numeric digit.');
			}else {
				$('#div_'+fieldId).removeClass('has-error').addClass('has-success');$('#err_'+fieldId).html('');
			} 
		}else{
			if(fieldVal == 0){
				setMsg(fieldId,'');
			}else {
				$('#div_'+fieldId).removeClass('has-error').addClass('has-success');$('#err_'+fieldId).html('');
			}
		}
	});
	
    var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var ck_username = /^[A-Za-z0-9_]{1,20}$/;
   
    function clrErr(){
    	  $(".form-group, .checkbox,.col-xs-8" ).removeClass( "has-error" );
    	   $(".err_msg").hide();
    }

    function validateFormFields(fieldName, errMsg, fieldType,fieldValue=null){
// 		alert(fieldType)
		if(fieldType == 'radioClass'){
			console.log($('.'+fieldName).is(':checked').length);
			if($('.'+fieldName).is(':checked').length  == 0){
				console.log('checked'+fieldType);
				setMsg(fieldName,errMsg);return true;
			}else{
				return false
			}
		}
		
		else if(fieldType == 'radio' ){
			if($("input[name="+fieldName+"]:checked").length  == 0){
				setMsg(fieldName,errMsg);return true;
			}else{
				return false
			}
		}else if(fieldType == 'checkbox'){
			if($("input[name='"+fieldName+"[]']:checked").length  == 0){
				setMsg(fieldName,errMsg);return true;
			}else{
				return false
			}
		}   else{
		    
			if(($.trim($('#'+fieldName).val()) == '' || $('#'+fieldName).val() == 0)){
				setMsg(fieldName,errMsg);return true;
 			}else if(fieldType == 'validEmail' && !ck_email.test($('#'+fieldName).val())){
				setMsg(fieldName,'Please enter a valid email id.');return true;
			}else if(fieldType == 'validUsername' && !ck_username.test($('#'+fieldName).val())){
				setMsg(fieldName,'Please enter a valid username .');return true;
			}
			else if(fieldType == 'validPass' && !passwordRegex.test($('#'+fieldName).val()) && ($('#'+fieldName).val())){
				setMsg(fieldName,'Minimum 8  characters, upper and lowercase letters and numeric digit!');return true;
			}
		else{
				return false;
			}
		}
	}
	
	function setMsg(fieldId,errMsg){
		$('#div_'+fieldId).removeClass('has-success').addClass('has-error');
		$('#err_'+fieldId).fadeIn();
		$('#err_'+fieldId).html(errMsg);
		$('#'+fieldId).focus();
	}
	
	
	$(function () {
		hideErrorMessages();
// 		$('input[type=checkbox], input[type=radio]').checkator();
	});
	
	function hideErrorMessages(){
 	    $('.alert-hide').delay(6000).fadeOut("slow");       
    }
    
    
     function doSort(id,url){
	  url = url+'&sortBy='+id;
	  if($( "#sort_"+id ).hasClass( "fa-sort-down" )) url = url+'&sortOrder=desc';
	  else url = url+'&sortOrder=asc';
// 	  console.log(url);console.log(id);
 	  window.location = url;  
    }
    
	$(document).ready(function() {
            $('input:checkbox').click(function(){ 
               	//  $(this).screwDefaultButtons("enable"); 	
            });
	  
            $('#checkedAll').change(function(){ 
    			if($(this).is(':checked')){ 
     				$('.checkedAll').prop('checked',true); 
    				//$('.checkedAll').screwDefaultButtons("enable");
    			}else{ 
     				$('.checkedAll').prop('checked',false);
    				//$('.checkedAll').screwDefaultButtons("disable"); 	
    			}
	        });

        });
        
        
        
</script>

<link rel="stylesheet" href="{{asset('public/css/multi-select.css')}}" type="text/css"/>
<script src="{{asset('public/js/jquery.multi-select.js')}}"></script>
	<script src="https://generateappicon.com/kids_education/assets/ap_assets/multi-select/jquery.quicksearch.js"></script>



<style type="text/css">
.ms-container
{
    width:100%;
}
.ms-container .ms-list
{
    height:130px;
}

.form-inline label{
    display: inline-table;
}
</style>

<script type="text/javascript">
 function doActionFn(action,id){
	 if(action == 'edit' || action == 'view'){
			window.location= "{url('category/delete/')}}"+action+'/'+id;
	}else{
		 $('#doAction').val(action);	
		 if(action == 'delete'){
			if (confirm("Are you sure you want to delete?")) {
				$('#listFrm').submit();
			}	
		} else{
			$('#listFrm').submit();
		}
	}
 }
function validateAccountForm(){
	clrErr();
	$errStaus = false; 
	var action = 'add';
	var lang_val = $('.language_name option:selected').val();
	if(lang_val == ""){
	   // alert(lang_val);
	    if(validateFormFields('language_name','Please enter the Language name.',''))$errStaus=true;
	   
	}
	
	if($('.cat_audio_upload').is(':checked') ){
// 		if(validateFormFields('category_audio','Please enter the password.',''))$errStaus=true;
		if(validateFormFields('categoryaudioUploadType','Please select the upload type.',''))$errStaus=true;
		if($('#categoryaudioUploadType').val() == 2){
        			if(validateFormFields('category_audio1','Please enter  URL.',''))$errStaus=true;
        	}
        	
        // if(validateFormFields('category_audio','Please select file.',''))$errStaus=true;	
        	if($('#categoryaudioUploadType').val() == 1){
        // 			if(action != 'edit'){
        				if(validateFormFields('category_audio','Please select file.',''))$errStaus=true;
        // 			}
        			if($('#category_audio').val() != '') {
        				var ext = $('#category_audio').val().split('.').pop().toLowerCase();
        				        				// var allow = new Array('mp4');
        				        				var allow = new Array('mp3');
        				        				
        				if(jQuery.inArray(ext, allow) == -1 ){
        					 setMsg('category_audio','Please select valid file!'); $errStaus=true;
        				}
        			}
        		}
 	 }
//   	if(validateFormFields('language_name','Please enter the Language Name.',''))$errStaus=true;
  	if(validateFormFields('category_name','Please enter the Category Name.',''))$errStaus=true;
  	

  	
  	if(validateFormFields('categoryImageUploadType','Please enter upload type.',''))$errStaus=true;
 	if($('#categoryImageUploadType').val() == 2){
			if(validateFormFields('category_img1','Please enter  URL.',''))$errStaus=true;
	}
	
	
	if($('#categoryImageUploadType').val() == 1){
			if(action != 'edit'){
				if(validateFormFields('category_img','Please select file.',''))$errStaus=true;
			}
			if($('#category_img').val() != '') {
				var ext = $('#category_img').val().split('.').pop().toLowerCase();
								// var allow = new Array('mp4');
								var allow = new Array('gif','png','jpg','jpeg','webp');
								
				if(jQuery.inArray(ext, allow) == -1 ){
					 setMsg('category_img','Please select valid file!'); $errStaus=true;
				}
			}
		}
  	
  	
   
  	if($errStaus) {
		return false;
	} else {
	return true;		
	}
}

function showPImgBox(value){
     
// 	$('#category_img1').hide();
	$('#div_category_img').hide();
	if(value == 2){
		$('#div_category_img1').show();$('#div_category_img').hide();
	}else if(value == 1){
		$('#div_category_img1').hide();$('#div_category_img').show();
	}
	
}

function showaudioBox(value){
     
// 	$('#category_img1').hide();
	$('#div_category_img').hide();
	if(value == 2){
		$('#div_category_audio1').show();$('#div_category_audio').hide();
	}else if(value == 1){
		$('#div_category_audio1').hide();$('#div_category_audio').show();
	}
	
}

</script>

</head>

<body>
    
      
		
                      <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 ml-4 font-weight-bold">Category</h1>
						<!-- @if(Session::has('message'))
                                <span  class="d-none d-sm-inline-block">
                                    <p class="alert alertinfo text-white" style="background-color:#308930; margin-right:30px;">
									{{ Session::get('message') }}</script></p>
								</span>
									@endif -->
                                @if(Session::has('message'))
                                <span  class="d-none d-sm-inline-block">
                                    <p class="alert alertinfo text-white" style="background-color:#308930">{{ Session::get('message') }}</script></p></span>@endif
</div> 				          



<section  style="padding-top:0px !important;width:90%;margin:0 auto;">
<div class="card">
								
								<div class="card-header">
								    <div class="card-head-row">
									    <h4 class="card-title mt-3">Add Category</h4>
				
									</div>
								</div>

					                     	    <div class="row">
						        <div class="col-md-12">
    							<div class="card">
    								
    									<div class="card-body">
    								    
    							        <form action="{{route('add-category.insert')}}" name="accAdminFrm" id="accAdminFrm" onSubmit="return validateAccountForm()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    										        <input type="hidden" name="_token" value="{{csrf_token()}}">
										        
										        <div class="form-group form-inline" id="div_language_name">
    												<label for="language_name" class="col-md-2 col-xs-3 col-sm-3 col-form-label">Language Name<span style="color:red;">&nbsp;*</span></label>
    												<div class="col-md-6 p-0" >
    												    <select class="form-control required input-full language_name" name="language_name" id="language_name" style="width:100%">
                                <option selected="true" disabled="disabled">Select Language</option>    
                                @foreach($selects as $select)
                                                            <option value="{{$select->name}}">{{$select->name}}</option>
                                                             @endforeach
</select>
    													<small class="form-text text-danger err_msg" id="err_language_name"></small>
    												</div>
    											</div>
										        
    										    <div class="form-group form-inline" id="div_category_name">
    												<label for="category_name" class="col-md-2 col-xs-3 col-sm-3 col-form-label">Category Name<span style="color:red;">&nbsp;*</span></label>
    												<div class="col-md-6 p-0" >
    												    <input type="text" name="category_name" value="" id="category_name" placeholder="Category Name" class="form-control input-full required" style="width:100%"  />
    													<small class="form-text text-danger err_msg" id="err_category_name"></small>
    												</div>
    											</div>
    											
    											<div class="form-group form-inline" id="div_audio_upload">
    												<label for="" class="col-md-2 col-xs-3 col-sm-3 col-form-label">Select for audio upload</label>
    												<!--<div class="col-md-6 p-0" >-->
    												    <label class="form-check-label" for="cat_audio_upload">
            												<input class="form-check-input cat_audio_upload" name="cat_audio_upload" 
            												type="checkbox"  value="1" id="cat_audio_upload" >
            												<!--<span class="form-check-sign" id="appr_s_text"></span>-->
            												category read audio
            											</label>
    													<small class="form-text text-danger err_msg" id="err_audio_upload"></small>
    												<!--</div>-->
    											</div>
    											
    											
    											
    											
    											<div class="toggle_audio_field">
    											    <div class="form-group form-inline" id="div_audio_UploadType">
        												<label for="categoryaudioUploadType" class="col-md-2 col-xs-3 col-sm-3 col-form-label">Audio Upload Type<span style="color:red;">&nbsp;*</span></label>
        												<div class="col-md-6 p-0" >
        												    <select onchange="showaudioBox(this.value)" class="form-control input-full" name="categoryaudioUploadType" id="categoryaudioUploadType" style="width:100%">
                                                                <option value="">Select audio Upload Type</option>
                                                                <option value="1" > Upload</option>
                                                                <option value="2" > URL</option>
                                                            </select>
        													<small class="form-text text-danger err_msg" id="err_categoryaudioUploadType"></small>
        												</div>
    											    </div>
    											    
    											    <div class="form-group form-inline" id="div_category_audio1" 
    											    style="display:
    											    none">
        												<label for="planImage" class="col-md-2 col-xs-3 col-sm-3 col-form-label">Audio URL<span style="color:red;">&nbsp;*</span></label>
        												<div class="col-md-6 p-0" >
        												     <input type="text" name="category_audio" value="" id="category_audio1" placeholder="URL" class="form-control input-full "  style="width:100%" />
        													<small class="form-text text-danger err_msg" id="err_category_audio1"></small>
        													
        												</div>
    											    </div>
    											    
    											    <div class="form-group form-inline" id="div_category_audio" 
    											    style="display:
    											    none">
                                                      <label class="col-form-label col-md-2 col-xs-3 col-sm-3 " for="planImage">Audio Upload File <span style="color:red;">&nbsp;*</span></label>
                                                        <div class="col-md-6 p-0" >
                                                          <input type="file" name="category_audio" value="" class="form-control input-full " id="category_audio" placeholder=""  style="width:100%" />
                                                        <small class="form-text text-danger err_msg" id="err_category_audio"></small>
                                                        <small class="" id="" style="display:
                                                        none">
                                                            <a href="" target="_blank"></a></small>
                                                      </div>
                                                    </div>
    											
    											</div>
    											
    											
    											
    											
    											
    											
    											
    											    											<div class="form-group form-inline" id="div_categoryImageUploadType">
        												<label for="categoryImageUploadType" class="col-md-2 col-xs-3 col-sm-3 col-form-label">Image Upload Type<span style="color:red;">&nbsp;*</span></label>
        												<div class="col-md-6 p-0" >
        												    <select onchange="showPImgBox(this.value)" class="form-control input-full" name="categoryImageUploadType" id="categoryImageUploadType"  style="width:100%">
                                                                <option value="0">Select Image Upload Type</option>
                                                                <option value="1" > Upload</option>
                                                                <option value="2" > URL</option>
                                                            </select>
        													<small class="form-text  text-danger err_msg" id="err_categoryImageUploadType"></small>
        												</div>
    											</div>
    											    
    											    <div class="form-group form-inline" id="div_category_img1" 
    											    style="display:
    											    none">
        												<label for="planImage" class="col-md-2 col-xs-3 col-sm-3 col-form-label">Image URL<span style="color:red;">&nbsp;*</span></label>
        												<div class="col-md-6 p-0" >
        												     <input type="text" name="  " value="" id="category_img1" placeholder="Image URL" class="form-control input-full " style="width:100%"/>
        													<small class="form-text text-danger err_msg" id="err_category_img1"></small>
        													
        												</div>
    											    </div>
    											    
    											    <div class="form-group form-inline" id="div_category_img" style="display:
    											    none">
                                                      <label class="col-form-label col-md-2 col-xs-3 col-sm-3 " for="planImage">Upload File <span style="color:red;">&nbsp;*</span></label>
                                                        <div class="col-md-6 p-0" >
                                                          <input type="file" name="category_img" value="" class="form-control input-full " id="category_img" placeholder=""  style="width:100%" />
                                                        <small class="form-text text-danger err_msg" id="err_category_img"></small>
                                                       
                                                      </div>
                                                    </div>
    											
    									        <br>
    									        
    											<div class="form-group form-inline">
    												<label for="inlineinput" class="col-md-2 col-xs-3 col-sm-3 col-form-label "></label>
    												<div class="col-md-6 p-0">
    												    <button name="catbtn" type="submit" 	value="true" id="catbtn" class="btn btn-success" >Submit</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="resetBtn" type="reset" value="true" id="resetBtn" class="btn btn-warning" onclick="window.location.href=document.referrer" >Cancel</button>
    												</div>
    											</div>
        									    
    								        </form>    								</div>
    							</div>
    						</div>
					        </div>
                    	    
                	    				</div>
			</div>
		    <!--<footer class="footer">-->
			    			<!--</footer>-->
		</div>
		
	</div>
                              </section>
	
    <script>
//success popup
$(document).ready(function () {
    $(".alertinfo").fadeOut(10000);
});

     $("#language_name").select2();
     
     $(document).ready(function(){
        if($('.cat_audio_upload').is(":not(:checked)")){
            $('.toggle_audio_field').hide();
        }else if($('.cat_audio_upload').is(":checked")){
            $('.toggle_audio_field').show();
        }
     });
     
     $('.cat_audio_upload').on('change',function(){
        
        if($(this).is(":not(:checked)")){
            $('.toggle_audio_field').hide();
        }
        else if($(this).is(":checked")){
            $('.toggle_audio_field').show();
            $('.toggle_audio_field').load(document.URL +  ' .toggle_audio_field');
        }
         
     });
     
    </script>
</body>

<script>



$(document).ready(function(){

$('.dev_mysel').multiSelect({
 
 selectableHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",
  selectionHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",

   afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';


    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
    afterSelect: function(){
        this.qs1.cache();
        this.qs2.cache();
      },
      afterDeselect: function(){
        this.qs1.cache();
        this.qs2.cache();
      }
 });
 
 //  $('.mysel2').multiSelect('select_all');
 

$('#dev_select-all').click(function(){
  $('.dev_mysel').multiSelect('select_all');
  return false;
});
$('#dev_deselect-all').click(function(){
  $('.dev_mysel').multiSelect('deselect_all');
  return false;
});


});


$(document).ready(function(){

$('.tester_mysel').multiSelect({
 
 selectableHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",
  selectionHeader: "<input type='text' class='search-input  form-control w-100' autocomplete='off' placeholder='Search...'>",

   afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';


    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
    afterSelect: function(){
        this.qs1.cache();
        this.qs2.cache();
      },
      afterDeselect: function(){
        this.qs1.cache();
        this.qs2.cache();
      }
 });
 
 //  $('.mysel2').multiSelect('select_all');
 

$('#tester_select-all').click(function(){
  $('.tester_mysel').multiSelect('select_all');
  return false;
});
$('#tester_deselect-all').click(function(){
  $('.tester_mysel').multiSelect('deselect_all');
  return false;
});


});

    function show_field(value=null)
    {
        if(value == 'android')
        {
            $("#show_a_field").show();
            $("#show_ios_field").hide();
            $("#ios_bundle_id").val('');
        }
        else if(value == 'ios')
        {
            $("#show_a_field").hide();
            $("#show_ios_field").show();
            $("#package_name").val('');
        }
        else
        {
            $("#show_a_field").hide();
            $("#show_ios_field").hide();
            $("#package_name").val('');
            $("#ios_bundle_id").val('');
        }
    }
    
</script>
 
 <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/js/sb-admin-2.min.js')}}"></script>



</body>

</html> 