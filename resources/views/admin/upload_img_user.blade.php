<style type="text/css">
            .demo-gallery > ul {
              margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: right;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 150px;
				height: 170px;
				text-align:center;
				border: 1px solid;
            }
            .demo-gallery > ul > li a {
              border: 3px solid #FFF;
              border-radius: 3px;
              display: block;
              overflow: hidden;
              position: relative;           
            }
            .demo-gallery > ul > li a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
              height: 48px;
              margin-left: -24px;
              margin-top: -24px;
              opacity: 0.8;
              width: 48px;
            }
            .demo-gallery.dark > ul > li a {
              border: 3px solid #04070a;
            }
            .home .demo-gallery {
              padding-bottom: 80px;
            }
</style>
<div class="modal fade" id="view_attachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class=" modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
    ×</span></button>
   <h4 class="modal-title" id="myModalLabel"></h4>
      </div>


    <div class="modal-body " >
    <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-user"></i>
                                        <span class="caption-subject font-dark bold uppercase" id="cont_name2"></span>
                                    </div>
                                  
                                </div>
                               
                                    <div class="table-scrollable" id="view_attachment_info">
                                        
                                    </div>
   
    
   
 <div  class="col-sm-12">


<p >
<div class="demo-gallery">
   <ul id="attache1_images" class="list-unstyled row lightgallery">

  </ul>
  <div id="attache1_files" class="list-unstyled row">

  </div>
  </div>
  
  </p>

 
</div>
                                                

                  
                       
                        </div>
                        <div class="modal-footer">
                          
                           
                        </div>
                    </div>
                </div>
            </div>




<script type="text/javascript">
var $lg = $('#attache1_images');
$lg.lightGallery();
  function displayAttachuser(e)
  {
	  //alert('11');
	$('#attache1_images').empty();
	$('#attache1_files').empty();
	$.each(e, function(k, v) {
      if(v['imgext']=='JPG' || v['imgext']=='PNG'  || v['imgext']=='GIF' || v['imgext']=='jpg' || v['imgext']=='png' || v['imgext']=='gif'  ){

         if(true)
		 {
			 $('#attache1_images').append('<li class="col-xs-6 col-sm-4 col-md-3" data-src="'+show_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'" data-responsive="" data-sub-html="">'+
                    '<a href="">'+
                        '<img class="img-responsive" src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
						'<div class="demo-gallery-poster">'+
							'<img src="{{url("/")}}/admin/assets/global/plugins/lightGallery-master/dist/img/zoom.png">'+
                        '</div>'+
                    '</a>'+
                '</li>');
		 }
		 

       } else {

          var val;
		var view_icon='';

 switch (v['imgext'].toUpperCase()) {
    case 'PDF': 
			var pdf_viewer=download_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname'];
			pdf_viewer=pdf_viewer.replace('{{url("/")}}/','{{url("/")}}/pdf_viewer?pdf=');
			val='{!!URL::asset("/icon/PDF.png")!!}';
			view_icon='<li>'+
							'<a class="btn default btn-outline" href="'+pdf_viewer+'" target="_blank">'+
							'<i class="icon-eye"></i>'+
							'</a>'+
					   '</li>';
	break;
    default:
		   val='{!!URL::asset("/")!!}icon/'+v['imgext'].toUpperCase()+'.png';
		   view_icon='<li>'+
						'<a class="btn default btn-outline" href="'+download_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
							'<i class="fa fa-download"></i>'+
						'</a>'+
					 '</li>';
			
  }


 $('#attache1_files').append(' <div class="mt-element-overlay col-sm-2 col-md-2">'+
                                        '<div class="row thumbnail" style="margin-left:3px">'+
                                            '<div class="col-md-12">'+
                                                '<div class="mt-overlay-3 mt-overlay-3-icons">'+
                                                    //'<img src="'+thumbnail_url+v['arch_year']+'/'+v['arch_month']+'/'+v['imgname']+'">'+
                          '<div style="background-size: contain;background-position: center;background-repeat: no-repeat;background-image:url('+val+'); width:150px; height:170px"></div>'+
                                                    '<div class="mt-overlay">'+
                                                       
                              							'<ul class="mt-info">'+                                                            
                                                                view_icon+                     
                                                        '</ul>'+
                            
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>')


       }
	});
	
	$lg.data('lightGallery').destroy(true);	
	$lg.lightGallery({
		share:false
	});
  }

</script>
