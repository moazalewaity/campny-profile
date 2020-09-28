  <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
               <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <?php $menu_for_user=Sentinel::getUser(); ?>

                    @foreach (\App\Menu::where('p_id','=',0)->get() as $menues)
                    <?php
                 
                    //dd($menu_for_user);
                    
                    //echo $menues->slug;exit;
                    ?>
                    @if($menu_for_user->hasAccess($menues->slug.'.*') || $menues->ignore_permission==1)
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="{{$menues->icon}}"></i>
                                <span class="title">{{$menues->title}}</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                             @foreach ($menues->submenus as $submenues)
                             
                              @if($menu_for_user->hasAccess($submenues->slug) || $menu_for_user->hasAccess($submenues->slug.'.*')  ||  $submenues->ignore_permission==1 )

                                <li class="nav-item start ">
                                   @if($submenues->typeoflink)
                                 <a href="{{$submenues->url}}" class="nav-link "  target="_blank">
                                        <i class="{{$submenues->icon}}"></i>
                                        <span class="title">{{$submenues->title}} </span>
                                    </a>
                                @else

                                <a href="{{url('/adminpanel/')}}{{$submenues->url}}" class="nav-link ">
                                        <i class="{{$submenues->icon}}"></i>
                                        <span class="title">{{$submenues->title}} </span>
                                    </a>

                                @endif
                                  <ul class="sub-menu">
                                    
                                   @foreach ($submenues->submenus as $submenues_data)
                              @if($menu_for_user->hasAccess($submenues_data->slug)  || $submenues_data->submenues_data==1 )  
                               <li class="nav-item start ">
                                 
                                 @if($submenues_data->typeoflink)
                                  <a href="{{$submenues_data->url}}" class="nav-link "  target="_blank">
                                        <i class="{{$submenues_data->icon}}"></i>
                                        <span class="title">{{$submenues_data->title}} </span>
                                    </a>
                                 @else
                                    <a href="{{url('/adminpanel/')}}{{$submenues_data->url}}" class="nav-link ">
                                        <i class="{{$submenues_data->icon}}"></i>
                                        <span class="title">{{$submenues_data->title}} </span>
                                    </a>
                                 @endif
                             </li> 
                                  @endif
                              @endforeach 
                             
                                 </ul>

                                </li>


                                @endif
                              @endforeach  
                                
                            </ul>
                        </li>
                        @endif
                       @endforeach  
                      
                     
                     
                       
                       
                        
                       
                       
                        
                      
                    
                       
                     
                       
                      
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>