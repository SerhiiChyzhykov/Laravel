<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Gallery - Admin</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/css/admin/styles.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/core.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/components.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/colors.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/octicons.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Core JS files -->
    <script type="text/javascript" src="/js/admin/pace.min.js"></script>
    <script type="text/javascript" src="/js/admin/jquery.min.js"></script>
    <script type="text/javascript" src="/js/admin/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/admin/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="/js/admin/d3.min.js"></script>
    <script type="text/javascript" src="/js/admin/d3_tooltip.js"></script>
    <script type="text/javascript" src="/js/admin/switchery.min.js"></script>
    <script type="text/javascript" src="/js/admin/uniform.min.js"></script>
    <script type="text/javascript" src="/js/admin/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="/js/admin/moment.min.js"></script>
    <script type="text/javascript" src="/js/admin/daterangepicker.js"></script>
    <script type="text/javascript" src="/js/admin/app.js"></script>
    <script type="text/javascript" src="/js/admin/dashboard.js"></script>
    <!-- /theme JS files -->
</head>
<body id="app-layout">
 <div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="/assets/images/logo_light.png" alt=""></a>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    @if (Auth::user()->avatar != NULL)
                    {{Auth::user()->name }}
                    @else
                    <img src="/assets/images/demo/users/face11.jpg" alt="face">
                    @endif
                    <span>{{ Auth::user()->name }}</span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li><a href="/logout"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
@include('common.errors')
<div class="page-content">
    <div class="sidebar sidebar-main">
        <div class="sidebar-content">
            <!-- User menu -->
            <div class="sidebar-user">
                <div class="category-content">
                    <div class="media">
                        <a href="#" class="media-left"><img src="assets/images/demo/users/face11.jpg" class="img-circle img-sm" alt=""></a>
                        <div class="media-body">
                            <span class="media-heading text-semibold">Victoria Baker</span>
                            <div class="text-size-mini text-muted">
                                <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                            </div>
                        </div>
                        <div class="media-right media-middle">
                            <ul class="icons-list">
                                <li>
                                    <a href="#"><i class="icon-cog3"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /user menu -->
            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">
                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>
                        <li class="active"><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#" class="has-ul"><i class="icon-stack2"></i> <span>Page layouts</span></a>
                            <ul class="hidden-ul">
                                <li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>
                                <li><a href="layout_navbar_sidebar_fixed.html">Fixed navbar &amp; sidebar</a></li>
                                <li><a href="layout_sidebar_fixed_native.html">Fixed sidebar native scroll</a></li>
                                <li><a href="layout_navbar_hideable.html">Hideable navbar</a></li>
                                <li><a href="layout_navbar_hideable_sidebar.html">Hideable &amp; fixed sidebar</a></li>
                                <li><a href="layout_footer_fixed.html">Fixed footer</a></li>
                                <li class="navigation-divider"></li>
                                <li><a href="boxed_default.html">Boxed with default sidebar</a></li>
                                <li><a href="boxed_mini.html">Boxed with mini sidebar</a></li>
                                <li><a href="boxed_full.html">Boxed full width</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-ul"><i class="icon-copy"></i> <span>Layouts</span></a>
                            <ul class="hidden-ul">
                                <li><a href="../../../layout_1/LTR/index.html" id="layout1">Layout 1</a></li>
                                <li><a href="index.html" id="layout2">Layout 2 <span class="label bg-warning-400">Current</span></a></li>
                                <li><a href="../../../layout_3/LTR/index.html" id="layout3">Layout 3</a></li>
                                <li><a href="../../../layout_4/LTR/index.html" id="layout4">Layout 4</a></li>
                                <li><a href="../../../layout_5/LTR/index.html" id="layout5">Layout 5</a></li>
                                <li class="disabled"><a href="../../../layout_6/LTR/index.html" id="layout6">Layout 6 <span class="label label-transparent">Coming soon</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-ul"><i class="icon-droplet2"></i> <span>Color system</span></a>
                            <ul class="hidden-ul">
                                <li><a href="colors_primary.html">Primary palette</a></li>
                                <li><a href="colors_danger.html">Danger palette</a></li>
                                <li><a href="colors_success.html">Success palette</a></li>
                                <li><a href="colors_warning.html">Warning palette</a></li>
                                <li><a href="colors_info.html">Info palette</a></li>
                                <li class="navigation-divider"></li>
                                <li><a href="colors_pink.html">Pink palette</a></li>
                                <li><a href="colors_violet.html">Violet palette</a></li>
                                <li><a href="colors_purple.html">Purple palette</a></li>
                                <li><a href="colors_indigo.html">Indigo palette</a></li>
                                <li><a href="colors_blue.html">Blue palette</a></li>
                                <li><a href="colors_teal.html">Teal palette</a></li>
                                <li><a href="colors_green.html">Green palette</a></li>
                                <li><a href="colors_orange.html">Orange palette</a></li>
                                <li><a href="colors_brown.html">Brown palette</a></li>
                                <li><a href="colors_grey.html">Grey palette</a></li>
                                <li><a href="colors_slate.html">Slate palette</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-ul"><i class="icon-stack"></i> <span>Starter kit</span></a>
                            <ul class="hidden-ul">
                                <li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
                                <li><a href="starters/1_col.html">1 column</a></li>
                                <li><a href="starters/2_col.html">2 columns</a></li>
                                <li>
                                    <a href="#" class="has-ul">3 columns</a>
                                    <ul class="hidden-ul">
                                        <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                                        <li><a href="starters/3_col_double.html">Double sidebars</a></li>
                                    </ul>
                                </li>
                                <li><a href="starters/4_col.html">4 columns</a></li>
                                <li>
                                    <a href="#" class="has-ul">Detached layout</a>
                                    <ul class="hidden-ul">
                                        <li><a href="starters/detached_left.html">Left sidebar</a></li>
                                        <li><a href="starters/detached_right.html">Right sidebar</a></li>
                                        <li><a href="starters/detached_sticky.html">Sticky sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="starters/layout_boxed.html">Boxed layout</a></li>
                                <li class="navigation-divider"></li>
                                <li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
                                <li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
                                <li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
                                <li><a href="starters/layout_fixed.html">Fixed layout</a></li>
                            </ul>
                        </li>
                        <li><a href="changelog.html"><i class="icon-list-unordered"></i> <span>Changelog <span class="label bg-blue-400">1.4</span></span></a></li>
                        <li><a href="../../RTL/default/index.html"><i class="icon-width"></i> <span>RTL version</span></a></li>
                        <!-- /main -->
                    </ul>
                </div>
            </div>
            <!-- /main navigation -->
        </div>
    </div>
    <div class="content-wrapper">
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
                </div>
                <div class="heading-elements">
                    <div class="heading-btn-group">
                        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                    </div>
                </div>
                <a class="heading-elements-toggle"><i class="icon-more"></i></a>
            </div>
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ul>
                <ul class="breadcrumb-elements">
                    <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear position-left"></i>
                            Settings
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                            <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                            <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                        </ul>
                    </li>
                </ul>
                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            </div>
        </div>
        <div class="content">
            @yield('content')
            <div class="footer text-muted">
                © {{ date("Y") }}
            </div>
        </div>
    </div>
</div>
<!-- JavaScripts -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
{!! csrf_field() !!}
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
