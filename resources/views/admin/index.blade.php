@include('admin.layouts.header')
@include('admin.layouts.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
      <h1>
          @yield('title')
      </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      @include('admin.layouts.message')
    @yield('content')
    </section>
    <!-- /.content -->
  </div>
  
@include('admin.layouts.footer')

