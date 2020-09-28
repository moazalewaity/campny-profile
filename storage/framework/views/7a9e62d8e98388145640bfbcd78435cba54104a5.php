<!DOCTYPE html>
<html lang="<?php echo e($site_langs->shortname ? $site_langs->shortname : 'en'); ?>" dir="<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>">
    <head>

<!--<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="<?php echo e(url('/')); ?>/arrowchat/external.php?type=css" charset="utf-8" />-->


        <meta charset="utf-8" />

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <meta content="Preview page of Metronic Admin RTL Theme #2 for blank page layout" name="description" />

        <meta content="" name="author" />
       <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


        
        <style type="text/css">
        .page-header.navbar .top-menu .navbar-nav>li.dropdown-user .dropdown-toggle>img{
            width: 39px;
        }
            .loading>i {
                display: none !important;
            }
            .loading.active>span {
                display: none !important;
            }
            .loading.active>i {
                display: inline-block !important;
            }
            div#myTablesw_filter {
                display: none !important;
            }
            div#myTablesw_length{
                float: right;
            }
            span#many-txt {
                min-width: 50px;
                padding: 0 5px;
                display: inline-block;
                border-bottom: 1px dashed #000;
                margin-bottom: 5px;
            }
            .form-control{
                width: 100% !important;
            }
            .dataTables_filter{
                float: left !important;
            }
            .dataTables_length{
                float: right !important;
            }
            .item_delete {
    float: right;
    padding: 2px 5px;
    cursor: pointer;
    color: #F44336;
}
        </style>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

       <!--<link href="<?php echo e(url('/')); ?>/admin/assets/fonts_googleapis.css" rel="stylesheet" type="text/css" />-->

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap/css/bootstrap-<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>.min.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->



         <!-- BEGIN PAGE LEVEL PLUGINS -->

            <?php echo $__env->yieldContent('page_level_plugins_styles'); ?>



         <!-- END PAGE LEVEL PLUGINS -->



        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/css/components-<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>.min.css" rel="stylesheet" id="style_components" type="text/css" />

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/css/plugins-<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/lightGallery-master/dist/css/lightgallery.css" rel="stylesheet">

        <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/Print.js-1.0.30/dist/print.min.css" rel="stylesheet">
        <link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet">

         <?php echo $__env->yieldContent('page_global_styles'); ?>

        <!-- END THEME GLOBAL STYLES -->



         <!-- BEGIN PAGE LEVEL STYLES -->        

        <?php echo $__env->yieldContent('page_level_styles'); ?>

        <!-- END PAGE LEVEL STYLES -->



        <!-- BEGIN THEME LAYOUT STYLES -->

        <link href="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/css/layout-<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/css/themes/blue-<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>.min.css" rel="stylesheet" type="text/css" id="style_color" />

        <link href="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/css/custom-<?php echo e($site_langs->direction ? $site_langs->direction : 'ltr'); ?>.min.css" rel="stylesheet" type="text/css" />

         <?php echo $__env->yieldContent('theme_layout_styles'); ?>

        <!-- END THEME LAYOUT STYLES -->

        <?php echo $__env->yieldContent('style'); ?>



        <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/img/favicon.ico" />

        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700&display=swap" rel="stylesheet">
        <style>
               *{
                font-family: 'Cairo', sans-serif;

               }
           </style>




     </head>

    <!-- END HEAD -->



    <body         class="<?php echo $__env->yieldContent('body_class'); ?>" >



    <?php echo $__env->yieldContent('body'); ?>

      

            <!-- END QUICK NAV -->

            <!--[if lt IE 9]>

<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/respond.min.js"></script>

<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/excanvas.min.js"></script> 

<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/ie8.fix.min.js"></script> 

<![endif]-->

            <!-- BEGIN CORE PLUGINS -->

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

            <!-- END CORE PLUGINS -->



             <!-- BEGIN PAGE LEVEL PLUGINS -->

              <?php echo $__env->yieldContent('page_level_plugins_js'); ?>

              <!-- END PAGE LEVEL PLUGINS -->



            <!-- BEGIN THEME GLOBAL SCRIPTS -->

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>

            <!-- END THEME GLOBAL SCRIPTS -->

           

           <!-- BEGIN PAGE LEVEL SCRIPTS -->

           <?php echo $__env->yieldContent('page_level_scripts_js'); ?>

            <!-- END PAGE LEVEL SCRIPTS -->




            <!-- <div class="loading">
                <img src="<?php echo e(url('/')); ?>/img/material-loader.gif" title="loading">
            </div> -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <!--<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>-->
            <script src="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/lightGallery-master/dist/js/lightgallery-all.js"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/lightGallery-master/lib/jquery.mousewheel.min.js"></script>

            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/Print.js-1.0.30/dist/print.min.js"></script>
            <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
            <?php 
                $user = Sentinel::getUser();
                $con = 0;
                $rol = \DB::table("role_users")->where('user_id' , $user->id)->get();
                foreach ($rol as $value) {
                    if($value->role_id == '17'){
                        $con++;
                    }
                }
                // dd($user);
            ?>
            <script src="<?php echo e(url('/')); ?>/admin/assets/yusuf/toast.js"></script>
            <?php if(false): ?>
                <script type="text/javascript" src="<?php echo e(url('/')); ?>/arrowchat/external.php?type=djs" charset="utf-8"></script>
                <script type="text/javascript" src="<?php echo e(url('/')); ?>/arrowchat/external.php?type=js" charset="utf-8"></script>
            <?php endif; ?>
            
             <?php echo $__env->yieldContent('theme_layout_scripts_js'); ?>

            <!-- END THEME LAYOUT SCRIPTS -->

            <?php if(session()->has('Success')): ?>
                <script>
                    showError('<?php echo session('Success'); ?>','success',true);
                </script>
            <?php endif; ?>
            <?php if(session()->has('Danger')): ?>
                <script>
                    showError('<?php echo session('Danger'); ?>','error',true);
                </script>
            <?php endif; ?>
                <script>
                    $(window).keydown(function(e) {
                        if(e.keyCode == 13 ){
                            e.preventDefault();
                            return false;
                        }
                    });
                </script>

            <?php echo $__env->yieldContent('scripts'); ?>


        <!--<script type="text/javascript">
            Dropzone.prototype.defaultOptions.dictDefaultMessage = "<?php echo e(trans('mainpage.add_dropzone')); ?>";
        </script>-->

       

        <!--<script>
            $(function() {
                $( ".date-picker" ).datepicker();
            });
        </script>-->

        <script>
            $(document).ready(function(){
				if($('title').html()=='') $('title').html('اوحة تحكم');
                $('#clickmewow').click(function(){
                    $('#radio1003').attr('checked', 'checked');
                });

                notify_counters();

                //////////////////////////////////////////////////////////////////////
                $("#header_inbox_bar").click(function(){
                    $.get('<?php echo URL::asset("/adminpanel/arrowchatmsg/display_nuread"); ?>', function (e) { 
                        $('#new_messages').empty();
                        $.each(e, function(k, v) {
                            $('#new_messages').append('<li id="arrowchat_userlist_'+v['from']+'">'+
                            '<a href="javascript:;" onClick="jqac.arrowchat.openCloseApp(\'THE APPLICATION FOLDER NAME\');jqac.arrowchat.chatWith(\''+v['from']+'\');">'+
                            ' <span class="photo">'+
                            "<img src=\"<?php echo e(url('/')); ?>/admin/user_image/"+v['image']+"\" class=\"img-circle\" alt=\"\"> </span>"+
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
                    $.get('<?php echo URL::asset("/adminpanel/display_nuread"); ?>', function (e) { 
                        $('#d_n_r').empty();
                        $.each(e, function(k, v) {
                            $('#d_n_r').append("<li>  <a href='<?php echo e(url('/adminpanel/notifications/')); ?>/"+v['id']+"' >   <span class='time'>"+v.data['title']+"</span>   <span class='details'> <span class='label label-xs label-icon label-success'>    <i class='fa fa-plus'></i> </span> "+v.data['details']+"</span><div style='padding-right: 35px'>"+v['created_at']+"</div> </a></li>"

                            );   
                        }); 
                    }); 
                    /////////////////////////////////////////////////////////////
                    $.get('<?php echo URL::asset("/adminpanel/counter_seen"); ?>', function (e) {

                    });
                    ////////////////////////////////////////////////////////
                });
            });
        </script>

<script type="text/javascript">
function notify_counters(){
            $.get('<?php echo URL::asset("/adminpanel/notify_counters"); ?>', function (data) {
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
                window.setTimeout(notify_counters,10000);
            });
}
//////////////////////////////
$(document).on("change",'.get-submenu' , function(){
              var id = $(this).val();
			  var type = $(this).attr('data-type');
			  var submenu = $(this).attr('data-submenu');
			  var form = $(this).attr('data-form');
			  
			  $('#'+form).find('#'+submenu).find('option').not(':first').remove();
			  $('#'+form).find('#loading-'+submenu).show();
			  
              $.ajaxSetup({
                     headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
              });
              $.ajax({
                     url: "<?php echo e(url('/')); ?>/adminpanel/submenu/"+type+"/"+id,
                     type: "get",
                     success: function (data) {
                           // console.log(data.length);
                            if(data.length != 0){                                   
                                   for(var i=0 ; i < data.length ; i++){
                                          $('#'+form).find('#'+submenu).append('<option value="'+data[i].id+'">'+data[i].name+'</option>')
                                   }
                            }
							switch(submenu)
							{
								case "university":$('#'+form).find("#"+submenu+" option[value="+selectedUniversity+"]").attr("selected", true).prop("selected", true).trigger("change");break;
								case "college":$('#'+form).find("#"+submenu+" option[value="+selectedCollege+"]").attr("selected", true).prop("selected", true).trigger("change");break;
								case "sps":$('#'+form).find("#"+submenu+" option[value="+selectedSps+"]").attr("selected", true).prop("selected", true).trigger("change");break;
							}
							$('#'+form).find('#loading-'+submenu).hide();
                     },
                     error: function (xhr, ajaxOptions, thrownError) {
                            console.log('Error');
                     }
              });
});
</script>
</body>



</html>