
            

          

            



            <script>

                $(document).ready(function()

                {

                    $('#clickmewow').click(function()

                    {

                        $('#radio1003').attr('checked', 'checked');

                    });

					 notify_counters();

					 

					 //////////////////////////////////////////////////////////////////////

                 $("#header_inbox_bar").click(function(){

            	 	$.get('{!! URL::asset("/arrowchatmsg/display_nuread") !!}', function (e) { 

           				$('#new_messages').empty();

             			$.each(e, function(k, v) {

           					 $('#new_messages').append('<li id="arrowchat_userlist_'+v['from']+'">'+

                                                '<a href="javascript:;" onClick="jqac.arrowchat.openCloseApp(\'THE APPLICATION FOLDER NAME\');jqac.arrowchat.chatWith(\''+v['from']+'\');">'+

                                                   ' <span class="photo">'+

                                                        "<img src=\"{{url('/')}}/admin/user_image/"+v['image']+"\" class=\"img-circle\" alt=\"\"> </span>"+

                                                    '<span class="subject">'+

                                                        '<span class="from"> '+v['fullname']+' </span>'+

                                                        '<span class="time">'+v['sent']+' </span>'+

                                                    '</span>'+

                                                   '<span class="message"> '+v['message']+' </span>'+

                                                '</a>'+

                                            '</li>'

                              );   

						}); 

				 	 }); 

				  }); 

			 /////////////////////////////////////////////////////////////

              

               //////////////////////////////////////////////////////////////////////

                 $("#header_notification_bar").click(function(){

						$.get('{!! URL::asset("/display_nuread") !!}', function (e) { 

							$('#d_n_r').empty();

							$.each(e, function(k, v) {

								$('#d_n_r').append("<li>  <a href='{{url('notifications/')}}/"+v['id']+"' >   <span class='time'>"+v.data['title']+"</span>   <span class='details'> <span class='label label-xs label-icon label-success'>    <i class='fa fa-plus'></i> </span> "+v.data['details']+"</span><div style='padding-right: 35px'>"+v['created_at']+"</div> </a></li>"

			

													);   

							}); 

						}); 

						/////////////////////////////////////////////////////////////

						$.get('{!! URL::asset("/counter_seen") !!}', function (e) {

			

						});

					////////////////////////////////////////////////////////

                    });

                });
            </script>



             <script type="text/javascript">

    			 function notify_counters()
    			 {

    				 $.get('{!! URL::asset("/notify_counters") !!}', function (data) {

    					 $.each(data,function(k,v){

    					 	if(v==0) {

    							//alert('hide=>'+k+'-'+v);

    							$('#'+k).hide(); 

    							$('#'+k).text(''); 

    						}else {

    							//alert('show=>'+k+'-'+v);

    							$('#'+k).show(); 

    							$('#'+k).text(v); 

    						 }

    					 });

    				 	window.setTimeout(notify_counters,5000);

    				 });

    			 }
             </script>








<!-- End -->

<script type="text/javascript" src="/{{ config('global.public_html') }}arrowchat/external.php?type=djs" charset="utf-8"></script>

<script type="text/javascript" src="/{{ config('global.public_html') }}arrowchat/external.php?type=js" charset="utf-8"></script>

<script>
    function arrowchat_file_upload_mostafa(id)

    {

    	//alert(id);

    	var form = document.getElementById('arrowchat_file_upload_form_'+id);

    	var fileSelect = document.getElementById('arrowchat_file_upload_'+id);

    	var uploadButton = document.getElementById('upload_button_'+id);		

    	

    	// Get the selected files from the input.

    	var files = fileSelect.files;

    	

    	// Create a new FormData object.

    	var formData = new FormData();

    	

    	



      	// Check the file type.

        /*if (!file.type.match('image.*')) {

        	continue;

        }*/



        // Add the file to the request.

    	

    	if(files.length>0)

    	{

    	var file = files[0];

    	uploadButton.innerHTML = 'Uploading...';

        formData.append('file[]', file, file.name);

    	formData.append('_token',"{!! csrf_token() !!}");

    	

    	var xhr = new XMLHttpRequest();

    	xhr.overrideMimeType("application/json");

    	xhr.open('POST', '{!! URL::asset("/arrowchatmsg/file_upload") !!}', true);

    	// Set up a handler for when the request finishes.

    		xhr.onload = function () {

    		  if (xhr.status === 200) {

    			// File(s) uploaded.

    			var jsonResponse = JSON.parse(xhr.responseText);

    			uploadButton.innerHTML = 'Upload';

    			fileSelect.value='';

    			$('.arrowchat_file_upload').hide();

    			//alert(jsonResponse.new_name);

    			var siteurl='{!! URL::asset("/") !!}';

    			siteurl=siteurl.replace('http:','');

    			siteurl=siteurl.replace('https:','');

    			jqac.arrowchat.sendMessage(id, 'attach:///arrowchatmsg/file_download/'+jsonResponse.arch_year+'/'+jsonResponse.month+'/'+jsonResponse.new_name+'|'+jsonResponse.fileName+'|'+jsonResponse.file_exe+'|'+siteurl);			

    		  } else {

    			alert('لم يتم ارسال الملف بنجاح');

    		  }

    		};

    	// Send the Data.

    	xhr.send(formData);

    	}else alert('الرجاء اختيار الملف الذي تريد ارساله');
    }
</script>