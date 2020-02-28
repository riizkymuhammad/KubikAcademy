<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kubik Academy</title>
    <!-- Bootstrap Styles-->
    <link href="{!! asset('dasboard/assets/css/bootstrap.css') !!}" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="{!! asset('dasboard/assets/css/font-awesome.css') !!}" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="{!! asset('dasboard/assets/css/custom-styles.css') !!}" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="{!! asset('dasboard/assets/js/dataTables/dataTables.bootstrap.css') !!}" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-cube"></i> <strong>Kubik Academy </strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
               
                </li>
                <!-- /.dropdown -->
              <li class="nav-item mx-0 mx-lg-1 dropdown">
               <a class="nav-link py-2 px-0 px-lg-2 rounded js-scroll-trigger" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="{{ URL('admin/') }}" ><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ URL('admin/kelas') }}" class="active-menu"><i class="fa fa-desktop"></i> Daftar Kelas</a>
                    </li>
                    <li>
                        <a href="{{ URL('admin/users') }}"><i class="fa fa-bar-chart-o"></i> Daftar User</a>
                    </li>
                    <li>
                        <a href="{{ URL('admin/konten')}}"><i class="fa fa-qrcode"></i> Konten Online</a>
                    </li>
                    
                   
                   

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                       <div class="table-responsive" >
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th>Kelas</th>
                        <th>Pendaftaran</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>
                            <a href="{{ URL('admin/kelas/create') }}" class="btn btn-success">New</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($progerams as $key => $progeram)
                    <tr>
                        <td>{{ ($key+1)}} </td>
                        <td>{{ $progeram->name }}</td>
                        <td>{{ $progeram->pendaftaran }} </td>
                        <td>{{ $progeram->mulai }} </td>
                        <td>{{ $progeram->selesai }} </td>
                        <td>
                            <center>
                                <a href="{{ URL('admin/kelas/' . $progeram->id . '/edit') }}" class="btn btn-xs btn-info">Edit</a>
                                <form action="{{ URL('kelas/' . $progeram->id) }}" method="POST">

                                {{ csrf_field()}}
                                {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
                                
                                </form>

                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
                 
             </div>
                 <!-- /. ROW  -->
               
          
                    <!--End Advanced Tables -->
                
                <!-- /. ROW  -->
        
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
    </div>
             <!-- /. PAGE INNER  -->
           
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{!! asset('dasboard/assets/js/jquery-1.10.2.js') !!}"></script>
      <!-- Bootstrap Js -->
    <script src="{!! asset('dasboard/assets/js/bootstrap.min.js') !!}"></script>
    <!-- Metis Menu Js -->
    <script src="{!! asset('dasboard/assets/js/jquery.metisMenu.js') !!}"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="{!! asset('dasboard/assets/js/dataTables/jquery.dataTables.js') !!}"></script>
    <script src="{!! asset('dasboard/assets/js/dataTables/dataTables.bootstrap.js') !!}"></script>
        
         <!-- Custom Js -->
    <script src="{!! asset('dasboard/assets/js/custom-scripts.js') !!}"></script>
    
   
</body>
</html>
