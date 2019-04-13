<!DOCTYPE html>
<html ng-app="ariaNg" manifest="index.manifest">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no,minimal-ui" name="viewport">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="AriaNg">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-TileColor" content="#3c4852">
    <meta name="msapplication-TileImage" content="tileicon.png">
    <meta name="description" content="AriaNg, a modern web frontend making aria2 easier to use.">
    <meta name="theme-color" content="#3c4852">
    <meta name="format-detection" content="telephone=no">
    <title>AriaNg</title>
    <link rel="icon" href="favicon.png">
    <!--[if IE]><link rel="shortcut icon" href="favicon.ico"><![endif]-->
    <link rel="apple-touch-icon" href="touchicon.png">
    <link rel="stylesheet" href="css/bootstrap-3.3.7.min.css">
    <link rel="stylesheet" href="css/plugins-a7090b9582.min.css">
    <link rel="stylesheet" href="css/aria-ng-aed476e868.min.css">
</head>

<body class="hold-transition skin-aria-ng sidebar-mini fixed">
    <div class="wrapper" ng-controller="MainController" ng-swipe-left="swipeActions.leftSwipe()" ng-swipe-right="swipeActions.rightSwipe()"
        ng-swipe-disable-mouse>
        <header class="main-header">
            <div class="logo">
                <div class="logo-mini">AriaNg</div>
                <div class="logo-lg" title="AriaNg v0.4.0">
                    <div class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown"><span class="logo-lg-title">AriaNg</span><i
                                class="fa fa-caret-right fa-right-bottom fa-rotate-45 fa-half" aria-hidden="true"></i></span>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li ng-repeat="setting in rpcSettings" ng-class="{'active': setting.isDefault}"><a class="pointer-cursor"
                                    ng-click="switchRpcSetting(setting)"><span ng-bind="(setting.rpcAlias ? setting.rpcAlias : setting.rpcHost + ':' + setting.rpcPort)">RPC</span>
                                    <i class="fa" ng-class="{'fa-check': setting.isDefault}"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-toolbar">
                    <ul class="nav navbar-nav">
                        
                        <li><a class="toolbar" title="{\{'New' | translate}}" ng-href="#!/new"><i class="fa fa-plus"></i>
                                <span translate>New</span></a></li>
                        <li class="divider"></li>
                        <li class="disabled" ng-class="{'disabled': !isSpecifiedTaskSelected('paused')}"><a class="toolbar"
                                title="{\{'Start' | translate}}" ng-click="changeTasksState('start')"><i class="fa fa-play"></i></a></li>
                        <li class="disabled" ng-class="{'disabled': !isSpecifiedTaskSelected('active', 'waiting')}"><a
                                class="toolbar" title="{\{'Pause' | translate}}" ng-click="changeTasksState('pause')"><i
                                    class="fa fa-pause"></i></a></li>
                        <li class="disabled" ng-class="{'disabled': !isTaskSelected() && !isSpecifiedTaskShowing('complete', 'error', 'removed')}"><a
                                class="toolbar dropdown-toggle" data-toggle="dropdown" title="{\{'Delete' | translate}}"><i
                                    class="fa fa-trash-o"></i> <i class="fa fa-caret-right fa-right-bottom fa-rotate-45 fa-half"
                                    aria-hidden="true"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li ng-if="isTaskSelected()"><a class="pointer-cursor" ng-click="removeTasks()"><span
                                            translate>Remove Task</span></a></li>
                                <li ng-if="taskContext.enableSelectAll && isSpecifiedTaskShowing('complete', 'error', 'removed')"><a
                                        class="pointer-cursor" ng-click="clearStoppedTasks()"><span translate>Clear
                                            Stopped Tasks</span></a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="disabled" ng-class="{'disabled': !taskContext.enableSelectAll || !taskContext.list || taskContext.list.length < 1}"><a
                                class="toolbar" title="{\{'Select All' | translate}}" ng-click="selectAllTasks()"><i
                                    class="fa fa-th-large"></i></a></li>
                        <li class="disabled" ng-class="{'disabled': !taskContext.enableSelectAll || !taskContext.list || taskContext.list.length < 1}"><a
                                class="toolbar dropdown-toggle" data-toggle="dropdown" title="{\{'Display Order' | translate}}"><i
                                    class="fa fa-sort-alpha-asc"></i> <i class="fa fa-caret-right fa-right-bottom fa-rotate-45 fa-half"
                                    aria-hidden="true"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="pointer-cursor" ng-click="changeDisplayOrder('default:asc')"><span
                                            translate>Default</span> <i class="fa" ng-class="{'fa-check': isSetDisplayOrder('default')}"></i></a></li>
                                <li><a class="pointer-cursor" ng-click="changeDisplayOrder('name:asc')"><span translate>By
                                            File Name</span> <i class="fa" ng-class="{'fa-check': isSetDisplayOrder('name')}"></i></a></li>
                                <li><a class="pointer-cursor" ng-click="changeDisplayOrder('size:asc')"><span translate>By
                                            File Size</span> <i class="fa" ng-class="{'fa-check': isSetDisplayOrder('size')}"></i></a></li>
                                <li><a class="pointer-cursor" ng-click="changeDisplayOrder('percent:desc')"><span
                                            translate>By Progress</span> <i class="fa" ng-class="{'fa-check': isSetDisplayOrder('percent')}"></i></a></li>
                                <li><a class="pointer-cursor" ng-click="changeDisplayOrder('remain:asc')"><span
                                            translate>By Remain Time</span> <i class="fa" ng-class="{'fa-check': isSetDisplayOrder('remain')}"></i></a></li>
                                <li><a class="pointer-cursor" ng-click="changeDisplayOrder('dspeed:desc')"><span
                                            translate>By Download Speed</span> <i class="fa" ng-class="{'fa-check': isSetDisplayOrder('dspeed')}"></i></a></li>
                                <li><a class="pointer-cursor" ng-click="changeDisplayOrder('uspeed:desc')"><span
                                            translate>By Upload Speed</span> <i class="fa" ng-class="{'fa-check': isSetDisplayOrder('uspeed')}"></i></a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li><a class="toolbar" title="{\{'Help' | translate}}" href="http://github.com/mayswind/AriaNg"
                                target="_blank"><i class="fa fa-question-circle-o"></i></a></li>
                    </ul>
                </div>
                <div class="navbar-searchbar hidden-xs">
                    <ul class="nav navbar-nav">
                        <li><input class="form-control" ng-placeholder="('Search' | translate)" title="{\{'Search' | translate}}"
                                ng-model="searchContext.text">
                            <div class="form-control-icon"><span class="fa fa-search form-control-feedback"></span></div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul id="siderbar-menu" class="sidebar-menu">
                    <li class="header" translate>user</li>
                    <li class="treeview">
                        <a href="javascript:void(0);">
                            <i class="fa fa-cogs"></i> <span translate> {{ Auth::user()->name }}</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li data-href-match="/settings/aria2/basic">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span translate>logout</span>
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="header" translate>Download</li>
                    <li data-href-match="/downloading"><a href="#!/downloading"><i class="fa fa-arrow-circle-o-down"></i>
                            <span ng-bind="('Downloading' | translate) + (globalStat && globalStat.numActive > 0 ? ' (' + globalStat.numActive + ')' : '')">Downloading</span></a></li>
                    <li data-href-match="/waiting"><a href="#!/waiting"><i class="fa fa-clock-o"></i> <span ng-bind="('Waiting' | translate) + (globalStat && globalStat.numWaiting > 0 ? ' (' + globalStat.numWaiting + ')' : '')">Waiting</span></a></li>
                    <li data-href-match="/stopped"><a href="#!/stopped"><i class="fa fa-check-circle-o"></i> <span
                                ng-bind="('Finished / Stopped' | translate) + (globalStat && globalStat.numStopped > 0 ? ' (' + globalStat.numStopped + ')' : '')">Finished
                                / Stopped</span></a></li>
                    <li class="header" translate>Settings</li>
                    <li data-href-match="/settings/ariang"><a href="#!/settings/ariang"><i class="fa fa-cog"></i> <span
                                translate>AriaNg Settings</span></a></li>
                    <li class="treeview"><a href="javascript:void(0);"><i class="fa fa-cogs"></i> <span translate>Aria2
                                Settings</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li data-href-match="/settings/aria2/basic"><a href="#!/settings/aria2/basic"><span
                                        translate>Basic Settings</span></a></li>
                            <li data-href-match="/settings/aria2/http-ftp-sftp"><a href="#!/settings/aria2/http-ftp-sftp"><span
                                        translate>HTTP/FTP/SFTP Settings</span></a></li>
                            <li data-href-match="/settings/aria2/http"><a href="#!/settings/aria2/http"><span translate>HTTP
                                        Settings</span></a></li>
                            <li data-href-match="/settings/aria2/ftp-sftp"><a href="#!/settings/aria2/ftp-sftp"><span
                                        translate>FTP/SFTP Settings</span></a></li>
                            <li data-href-match="/settings/aria2/bt"><a href="#!/settings/aria2/bt"><span translate>BitTorrent
                                        Settings</span></a></li>
                            <li data-href-match="/settings/aria2/metalink"><a href="#!/settings/aria2/metalink"><span
                                        translate>Metalink Settings</span></a></li>
                            <li data-href-match="/settings/aria2/rpc"><a href="#!/settings/aria2/rpc"><span translate>RPC
                                        Settings</span></a></li>
                            <li data-href-match="/settings/aria2/advanced"><a href="#!/settings/aria2/advanced"><span
                                        translate>Advanced Settings</span></a></li>
                        </ul>
                    </li>
                    <li data-href-match="/status"><a href="#!/status"><i class="fa fa-server"></i> <span translate>Aria2
                                Status</span> <span class="label pull-right" ng-if="globalStatusContext.isEnabled"
                                ng-class="{'label-primary': taskContext.rpcStatus === 'Connecting', 'label-success': taskContext.rpcStatus === 'Connected', 'label-danger': taskContext.rpcStatus === 'Not Connected'}"
                                ng-bind="taskContext.rpcStatus | translate"></span></a></li>
                </ul>
            </section>
        </aside>
        <div id="content-wrapper" class="content-wrapper">
            <div id="content-body" class="content-body">
                <div ng-view cg-busy="{ promise: loadPromise, message: ('Loading' | translate) }"></div>
            </div>
        </div>
        <footer class="main-footer">
            <nav class="navbar" role="navigation">
                <div class="navbar-toolbar">
                    <ul class="nav navbar-nav">
                        <li><a data-toggle="offcanvas" role="button" title="{\{'Toggle Navigation' | translate}}"><i
                                    class="fa fa-bars"></i></a></li>
                        <li class="divider"></li>
                        <li class="dropup"><a class="dropdown-toggle" data-toggle="dropdown" role="button" title="{\{'Quick Setting' | translate}}"><i
                                    class="fa fa-wrench"></i> <span translate>Quick Setting</span> <i class="fa fa-caret-right fa-right-bottom fa-rotate-45 fa-half"
                                    aria-hidden="true"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="pointer-cursor" ng-click="showQuickSettingDialog('globalSpeedLimit', 'Global Speed Limit')"><span
                                            translate>Global Speed Limit</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="pull-right ng-cloak" ng-if="globalStatusContext.isEnabled"><a class="global-status" title="{\{('Click to pin' | translate)}}"
                        ng-pop-chart ng-data="globalStatusContext.data" ng-container="body" ng-placement="top"
                        ng-trigger="click hover" ng-popover-class="global-status-chart"><span class="realtime-speed"><i
                                class="icon-download fa fa-arrow-down"></i> <span ng-bind="(globalStat.downloadSpeed | readableVolume) + '/s'"></span>
                        </span><span class="realtime-speed"><i class="icon-upload fa fa-arrow-up"></i> <span ng-bind="(globalStat.uploadSpeed | readableVolume) + '/s'"></span></span></a></div>
            </nav>
        </footer>
        <ng-setting-dialog setting="quickSettingContext"></ng-setting-dialog>
    </div>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/angular-packages-1.6.5.min.js"></script>
    <script src="js/bootstrap-3.3.7.min.js"></script>
    <script src="js/moment-with-locales-2.18.1.min.js"></script>
    <script src="js/echarts-common-3.7.1.min.js"></script>
    <script src="js/plugins-7eed010b9e.min.js"></script>
    <script src="js/aria-ng-32e6c713b1.min.js"></script>
</body>

</html>