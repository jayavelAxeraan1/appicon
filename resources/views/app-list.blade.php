@include('sidebar')

@include('header')

<head>
    <title>App List</title>
	<link rel="icon" type="image/x-icon" href="{{asset('public/img/favi.png')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>


                <!-- Begin Page Content -->
                <!-- <div class="container-fluid">
                     Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 ml-4 font-weight-bold">Apps</h1>
						@if(Session::has('message'))
                                <span  class="d-none d-sm-inline-block">
                                    <p class="alert alertinfo text-white" style="background-color:#308930; margin-right:30px;">
									{{ Session::get('message') }}</script></p>
								</span>
									@endif
</div> 
<section id="profile_update" style="padding-top:0px !important;">

<div class="card">
								
								<div class="card-header">
								    <div class="card-head-row">
									    <h4 class="card-title mt-3">Apps List</h4>
									    
									    <div class="card-tools">
											<ul class="nav nav-pills nav-secondary nav-pills-no-bd " role="tablist">
											    <li class="nav-item">
										            <a class="nav-link active" style="background: #28a745;!important;border-radius: 50px !important;;" href="{{url('add-new-app')}}"> <i class="fa fa-plus"></i>&nbsp; Add New App</a>
</li>
											</ul>
										</div>
									</div>
								</div>
								
								<!--notifiactions-->
    							<div class="container" id="">
                                                                    </div>
                                
                                <div class="container" id="showActionErr"></div>
                                <!--notifiactions-->
								
								<div class="card-body">
								    
								     <div class="row">
                                            <div class="col-md-12 " style="padding: 0rem 1.25rem;">
                                                <!--<div class="text-left">-->
                                                  <!--<h3>Search</h3>-->
                                                <!--</div>-->
                                                <form action="" name="searchFrm" id="searchFrm" method="get" accept-charset="utf-8">
                                                <div class="row">
                                                  <div class="form-group col-md-3">
                                                    <label for="searchKey">Search Key</label>
                                                    <input type="text" name="searchKey" value="" id="searchKey" placeholder="" class="form-control required">
                                                  </div>
                                                  <div class="form-group col-md-3">
                                                    <label for="searchBy">Search By</label>
                                                    <select name="searchBy" class="form-control" id="searchBy">
<option value="" selected="selected">Select</option>
<option value="app_id">App ID</option>
<option value="app_name">App Name</option>
</select>
                                                  </div>
                                                  <div class="form-group col-md-3">
                                                    <label for="searchStatus">Status</label>
                                                    <select name="searchStatus" class="form-control" id="searchStatus">
<option value="all">All</option>
<option value="Disabled">Disabled</option>
<option value="Enabled">Enabled</option>
</select>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="form-group col-md-12">
                                                    <button name="myAccountBtn" type="submit" value="true" id="myAccountBtn" class="btn btn-success btn-sm">Search</button>
&nbsp;<button name="resetAgrmtBtn" type="reset" value="true" id="resetAgrmtBtn" class="btn btn-warning btn-sm" onclick="">Reset</button>
                                                  </div>
                                                </div>
                                                </form>                                            </div>
                                      </div>
								   
                        		    <div class="btn-wrapper text-center d-flex justify-content-between">
                        		        <div class="d-flex align-items-center">
                        		            <h4 class="card-title"> Apps List</h4>
                        		        </div>
                        		        <div class="d-flex align-items-center">
                        		             <form action="" name="perPageForm" method="post">
                        		                 <input type="hidden" name="listUrl" value="admin/app">
                                              <select name="perPage" class="form-control" id="perPage" style="width:auto;" onchange="this.form.submit()">
<option value="5">5</option>
<option value="10">10</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="75">75</option>
<option value="100">100</option>
<option value="150">150</option>
</select>
                                            </form>
                        		        </div>
                        		    </div>
                  
                        		                                		    <div class="btn-wrapper text-center d-flex justify-content-between">
                        		        <div class="d-flex align-items-center">
                                           
                        		            <h4 class="card-title"> Total App : <?php $count = DB::table('app_name')->count(); echo $count; ?> </h4>
                                           
                        		        </div>
                        		        <div class="d-flex align-items-center">
                        		             <div class="form-group col-md-4">
                                                  <div class="">
                                                                                                      </div>
                                            </div>
                        		        </div>
                        		    </div>
                        		    
                        		    <form action="" name="listFrm" id="listFrm" method="post" accept-charset="utf-8">
<input type="hidden" name="doAction" value="" id="doAction">
							        <div class="table-responsive">
										<table id="feedback_list_table" class="display table table-striped table-hover table-bordered ">
										    
											<thead>
 					                            <input type="hidden" name="listUrl" value="">
                                                <tr>
                                                    <th><input type="checkbox" name="checkedAll" value="" id="checkedAll">
                                                    </th>
                                                    <th>#</th>
                                                    <th onclick="">App ID <i class="fas fa-sort " id="sort_app_id"></i></th>
                                                    <th onclick="">App Name <i class="fas fa-sort " id="sort_app_name"></i></th>
                                                    <th onclick="">Mapping Category <i class="fas fa-sort " id="sort_category_id"></i></th>
                                                    <th class="text-center">Action</th>
                                                    <th onclick="">Created <i class="fas  fa-sort " id="sort_created_at"></i></th>
                                                    
                                                    <th>Status</th>
                                                </tr>
											</thead>
										
											<tbody>
											@php
											$serial_no=1;
											@endphp
											
                                            @foreach($select as $selects)
									                                                                    <tr>
                                                            <td>
                                                                <input type="checkbox" name="appIds[]" value="3" id="checked_3" class="checkedAll">
                                                            </td>
                                                
                                                            <td>{{$serial_no++}}
															</td> 
                                                            <td>{{$selects->id}}</td>
                                                            
                                                            <td>{{$selects->app_name}}</td>
                                                            <td style="white-space: normal;" class="cat_list_box" >{{$selects->category_id_as_name}}</td>
                                                            <td class="text-center">
                                                                                        									    <div class="form-button-action">
                                            					
                                            		     	   
                                            					<a href="{{url('app-list/edit', $selects->id )}}" data-toggle="tooltip" title="" class="btn btn-white text-primary" data-original-title="Edit">
                                            						<i class="fas fa-pencil-alt "></i></a>
                                            					
                                            					<a type="button" href="{{url('app-list/delete/'.$selects->id)}}"  data-toggle="tooltip" title="" class="btn btn-white text-danger delbtn" data-original-title="Delete">
                                            						<i class="fas fa-trash "></i>
																	</a>
                                            					
                                            				</div>
    									                    </td>
                                                            <td>{{$selects->created_at}}</td>
                                                        
    								
                								            <td>
                                                                <button type="button" data-toggle="tooltip" data-original-title="Enable" title="" class="btn btn-xs btn-icon btn-round btn-success">
                                											<i class="fa fa-check"></i>
                                										    </button>                                                            </td>
                                                    </tr>
                                                                                                           
                                                    @endforeach
                                                    											</tbody>
										</table>
									</div>
									</form>								</div>
								
								<div class="card-footer ">
								     <div class="btn-wrapper text-center d-flex justify-content-between">
                        		        <div class="d-flex align-items-center">
                        		            <h4 class="card-title"></h4>
                        		        </div>
                        		        <div class="d-flex align-items-center">
                        		             <div class="form-group col-md-4">
                                                  <div class="">
                                                                                                      </div>
                                            </div>
                        		        </div>
                        		    </div>
								    <div class="btn-wrapper text-center d-flex justify-content-between">
								        <div class="d-flex align-items-center">
											<label for="inlineinput" class="col-form-label "> With Selected &nbsp;&nbsp;&nbsp;&nbsp; </label>
											<div class="p-0">
											    <button type="button" class="btn btn-success btn-sm btn-enable" title="Enable" onclick="doActionFn('enable','all');"> <i class="far fa-check-circle"></i> Enable </button>
											    <button type="button" class="btn btn-warning btn-sm btn-disable" title="Disable" onclick="doActionFn('disable','all');"> <i class="fas fa-ban"></i> Disable</button>
                                                <button type="button" class="btn btn-danger btn-sm  btn-delete " title="Delete" onclick="doActionFn('delete','all');"> <i class="fas fa-trash"></i> Delete</button>
											</div>
										</div>
										<div class="d-flex align-items-center">
											<form action="" name="perPageForm" method="post">
											    <input type="hidden" name="listUrl" value="admin/app">
                                                <select name="perPage" class="form-control" id="perPage" style="width:auto;" onchange="this.form.submit()">
<option value="5">5</option>
<option value="10">10</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="75">75</option>
<option value="100">100</option>
<option value="150">150</option>
</select>
                                            </form>
										</div>
                                    </div>
                                </div>
							</div>
                                    </section>




  <!-- page js functions -->
<script type="text/javascript">

//success popup
$(document).ready(function () {
    $(".alertinfo").fadeOut(10000);
});




$(document).ready(function() {
$('.delbtn').click(function(){ 
alert('are you sure?');
   
});
});



$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


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

<style>
    .cat_list_box{
            height: auto !important;
            white-space: normal !important;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
    }
	.table-responsive td{
			display:revert;
			}

</style>

<script type="text/javascript">

 function doActionFn(action,id){
	 if(action == 'edit' || action == 'view'){
			window.location= ''+action+'/'+id;
	}
	else if(action == 'mapquesapp'){
			window.location= ''+id;
	}
	else{
		 $('#doAction').val(action);	
 		 if(id != 'all' && $('#checked_'+id).length){
			 $('.checkedAll').prop('checked',false); 	
			 $('#checked_'+id).prop('checked',true); 
		  }
		 var checkBox = false;
		$.each($("input[name='appIds[]']:checked"), function() {
			checkBox =  true;
		});
 		 if(checkBox == false){
			$('#showActionErr').html(' <div class="alert alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Please select at least one item </div>');	 
 			return false;
		 }
		 if(action == 'delete'){
			if (confirm("Are you sure you want to delete?")) {
				$('#listFrm').submit();
			}	
		} else{
			$('#listFrm').submit();
		}
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