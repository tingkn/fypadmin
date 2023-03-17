<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Plastic Recycle-It-Up Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar" style="margin-left:20px">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>            
            <p style="color:black; margin-left:10px; margin-top:10px; font-size:25px">Plastic Recycle-It-Up Admin</p>
        </div>        
		<div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
					<div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="overview">
                                        Overview
                                    </a>
                                </li>
								<li>
                                    <a href="adminUser">
                                        User
                                    </a>
                                </li>
								<li>
                                    <a href="blogs">
                                        Blog
                                    </a>
                                </li>
								<li>
                                    <a href="adminForum">
                                        Forum
                                    </a>
                                </li>
								<li>
                                    <a href="newsletter">
                                        Newsletter
                                    </a>
                                </li>
								<li>
                                    <a href="adminForm">
                                        Form
                                    </a>
                                </li>
								<li class="app-sidebar__heading">Authentication</li>
								@guest
                                    <li>
                                        <a href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register-user') }}">Register</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('signout') }}">Logout</a>
									</li>
								@endguest
                            </ul>
                        </div>
                    </div>
                </div>    
				<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
							</div>
							@yield('content')
                        </div>            
                    </div>
				</div>
        </div>
    </div>
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
</body>
</html>
