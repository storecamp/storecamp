<?php
/**
 * @param $navigation['auth'] \Illuminate\Auth\AuthManager
 */
$user = $navigation['auth']->user() ? $navigation['auth']->user() : null; ?>
<header class="main-header">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/home" class="navbar-brand"><img src="{{asset('img/Logo!.png')}}" style="    height: 80%;
    padding-top: 14px;
    width: 120px;" alt="storecamp"
                                                          class="img-responsive"></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class=" ">
                        <a class="nav-link" href="/credit">Credit</a>
                    </li>
                    <li class=" ">
                        <a class="nav-link" href="warranty">Warranty</a>
                    </li>
                    <li class=" ">
                        <a class="nav-link" href="/contacts">Contacts</a>
                    </li>
                    <li class=" ">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="form-inline pull-left">
                    <form class="navbar-form active" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control pull-right"
                                   style="width: 300px; margin-right: 1px; border: 1px solid #ddd; background-color: #e5e5e5;"
                                   placeholder="Search">
                            <span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search">
									<span class="sr-only">Search</span>
								</span>
							</button>
						</span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown cart-menu">
                        <!-- Menu Toggle Button -->
                        <a href="{!! route('site::cart::show') !!}" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cart-plus"></i>
                            <?php $countItems = $navigation['cartSystem']->count(); ?>
                            @if($countItems)
                                <span class="label label-primary">{{$countItems}}</span>
                            @else
                                <span class="label label-yellow">0</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 items</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    @if(!$navigation['auth']->guest())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{str_limit(
                            $navigation['auth']->user()->name,
                            20
                            )}}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><!-- start notification -->
                                    <a class="dropdown-item" href="profile">Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/history">Orders History</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                        logout
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="submit" value="logout" style="display: none;">
                                </form>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url('/login') }}">{{ trans('message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('message.register') }}</a></li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>