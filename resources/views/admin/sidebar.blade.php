 <nav id="sidebar">
     <!-- Sidebar Header-->
     <div class="sidebar-header d-flex align-items-center">
         <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle">
         </div>
         <div class="title">
             <h1 class="h5">Mark Stephen</h1>
             <p>Web Designer</p>
         </div>
     </div>
     <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
     <ul class="list-unstyled">
         <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
         <li><a href="{{ url('create_field') }}"> <i class="icon-grid"></i>Tambah Lapangan </a></li>
         <li><a href="{{ url('view_field') }}"> <i class="icon-grid"></i>View Lapangan </a></li>
         <li><a href="{{ url('bookings') }}"> <i class="icon-grid"></i>Bookings </a></li>
         <li><a href="{{ url('view_gallery') }}"> <i class="icon-grid"></i>Gallery </a></li>
         <li><a href="{{ url('message') }}"> <i class="icon-grid"></i>Message </a></li>

     </ul>
 </nav>
