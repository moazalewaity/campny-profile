  <!-- BEGIN HEADER -->
       @include ('admin.content.uppernav')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            @include ('admin.content.navsidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                     @include('/admin/content/panel')
                    <!-- END THEME PANEL -->
                   <!-- <h1 class="page-title"> Blank Page Layout
                        <small>blank page layout</small>
                    </h1>-->
                    @include ('/admin/content/page_bar')
                    <!-- END PAGE HEADER-->
                     @yield('content')
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
           @include('/admin/content/quick_sidebar')
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
       @include('/admin/content/footer')