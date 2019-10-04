<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

// 注册页面样式
AdminAsset::register($this);
?>

<!-- 页面开始 -->
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="#" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Bootstrap </span><strong>Dashboard</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="#" class="nav-link logout"> <span class="d-none d-sm-inline">退出</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Mark Stephen</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading"></span>
          <ul class="list-unstyled">
                    <li class="active"><a href="/user/add"> <i class="icon-home"></i>用户添加 </a></li>
                    <li><a href="/user/list"><i class="icon-user"></i>用户列表 </a></li>
                    <li><a href="/applist/create"><i class="icon-padnote"></i>添加应用 </a></li>
                    <li><a href="/applist/index"> <i class="icon-padnote"></i>应用列表 </a></li>
                    <li><a href="/special/create"> <i class="icon-padnote"></i>添加咨询/专题 </a></li>
                    <li><a href="/special/index"> <i class="icon-padnote"></i>咨询/专题列表 </a></li>
                    <li><a href="/links/create"> <i class="icon-padnote"></i>友链添加 </a></li>
                    <li><a href="/links/index"> <i class="icon-padnote"></i>友链列表 </a></li>
                    <li><a href="/img/create"> <i class="icon-padnote"></i>轮播图添加 </a></li>
                    <li><a href="/img/index"> <i class="icon-padnote"></i>轮播图列表 </a></li>
                   
                    <!-- <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li> -->
          </ul>
        </nav>
        <div class="content-inner">
      
          <section class="dashboard-counts no-padding-bottom">
            <!-- 内容替换部分 -->
           <?= $content ?>
          </section>
         
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Copyright &copy; 2019<a href="http://www.cssmoban.com/" target="_blank" title=""></a><a href="http://www.cssmoban.com/" title="" target="_blank"></a></p>
                </div>
                <div class="col-sm-6 text-right">
                  <p></p>
                 
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    
  </body>
  <!-- 内容结束 -->
  <?php $this->endBody() ?>
</html>
<!-- 页面结束 -->
<?php $this->endPage() ?>