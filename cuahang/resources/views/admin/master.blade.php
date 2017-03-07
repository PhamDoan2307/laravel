@include('admin.layouts.header')
<div class="page-container">
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
    <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
    <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
    @include('admin.layouts.menu')
    <div class="main-content">
        <!-- User Info, Notifications and Menu Bar -->

        @include('admin.layouts.nav')
                <!-- Content -->

        @include('admin.layouts.errors')


        @yield('content')

                <!-- Main Footer -->
        <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
        <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
        <!-- Or class "fixed" to  always fix the footer to the end of page -->
@include('admin.layouts.footer')