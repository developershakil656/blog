<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('admin')}}/css/bootstrap-reset.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admin')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="{{asset('admin')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('admin')}}/css/owl.carousel.css" type="text/css">


    <!--right slidebar-->
    <link href="{{asset('admin')}}/css/slidebars.css" rel="stylesheet">

     <!--dynamic table-->
    <link href="{{asset('admin')}}/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="{{asset('admin')}}/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin')}}/assets/data-tables/DT_bootstrap.css" />

    <!--toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('admin')}}/css/style-responsive.css" rel="stylesheet" />

    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <style>
        #output_image {
            max-width: 300px;
        }
    </style>

</head>

<body>

    <section id="container">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <i class="fa fa-bars"></i>
            </div>
            <!--logo start-->
            <a href="{{route('adminHome')}}" class="logo">Flat<span>lab</span></a>
            <!--logo end-->

            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{!empty(Auth::user()->image)?url(Auth::user()->image):''}}" style="height:31px; width:31px">
                            <span class="username">{{Auth::user()->name}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="{{request()->is('dashbord')?'active':''}}" href="{{route('adminHome')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @if(Auth::user()->user_role=='admin')
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{request()->is('user/*')?'active':''}}">
                            <i class="fa fa-laptop"></i>
                            <span>User</span>
                        </a>
                        <ul class="sub">
                            <li class="{{request()->is('user/create')?'active':''}}"><a href="{{url('user/create')}}">Add User</a></li>
                            <li class="{{request()->is('/user')?'active':''}}"><a href="{{url('user')}}">Manage User</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{request()->is('category/*')?'active':''}}">
                            <i class="fa fa-laptop"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sub">
                            <li class="{{request()->is('category/add-category')?'active':''}}"><a href="{{route('add-category')}}">Add Category</a></li>
                            <li class="{{request()->is('category/manage-category')?'active':''}}"><a href="{{route('manage-category')}}">Manage Category</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="{{request()->is('post/*')?'active':''}}">
                            <i class="fa fa-laptop"></i>
                            <span>Post</span>
                        </a>
                        <ul class="sub">
                            <li class="{{request()->is('post/add-post')?'active':''}}"><a href="{{route('add-post')}}">Add Post</a></li>
                            <li class="{{request()->is('post/manage-post')?'active':''}}"><a href="{{route('manage-post')}}">Manage Post</a></li>
                        </ul>
                    </li>


                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                @yield('content')

            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2018 &copy; FlatLab by VectorLab.
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('admin')}}/js/jquery.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.bundle.min.js"></script>
    <script class="include" type="text/javascript" src="{{asset('admin')}}/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{asset('admin')}}/js/jquery.scrollTo.min.js"></script>
    <script src="{{asset('admin')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="{{asset('admin')}}/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="{{asset('admin')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="{{asset('admin')}}/js/owl.carousel.js"></script>
    <script src="{{asset('admin')}}/js/jquery.customSelect.min.js"></script>
    <script type="text/javascript" language="javascript" src="{{asset('admin')}}/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{{asset('admin')}}/assets/data-tables/DT_bootstrap.js"></script>
    <script src="{{asset('admin')}}/js/respond.min.js"></script>

    <!--right slidebar-->
    <script src="{{asset('admin')}}/js/slidebars.min.js"></script>

    <!--dynamic table initialization -->
    <script src="{{asset('admin')}}/js/dynamic_table_init.js"></script>

    <!--common script for all pages-->
    <script src="{{asset('admin')}}/js/common-scripts5e1f.js?v=2"></script>

    <!--script for this page-->
    <script src="{{asset('admin')}}/js/sparkline-chart.js"></script>
    <script src="{{asset('admin')}}/js/easy-pie-chart.js"></script>
    <script src="{{asset('admin')}}/js/count.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript" src="{{asset('admin')}}/js/jquery.validate.min.js"></script>

    <!--script for Toastr Notification-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('script')
    <script>
        //owl carousel
        $('body').on('change', '#categoryStatus', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var status = 1;
            } else {
                var status = 0;
            }

            console.log('categoryStatus/' + id + '/' + status)
            $.ajax({
                url: 'category-status/' + id + '/' + status,
                method: 'get',
                success: function(result) {
                    console.log(result)
                }
            })
        })

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: true

            });
        });

        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });

        $(window).on("resize", function() {
            var owl = $("#owl-demo").data("owlCarousel");
            owl.reinit();
        });

        
    </script>
    <script>
        //script for toastr notification
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
        @endif
    </script>
    <script>
        //script for sweet alert
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>

</body>

</html>