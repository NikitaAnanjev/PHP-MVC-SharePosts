<nav id="sidebar" class="mCustomScrollbar _mCS_1 mCS-autoHide" style="overflow: visible;">
    <div id="mCSB_1" class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside" style="max-height: 969px;"
         tabindex="0">
        <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
            <div class="sidebar-header">
                <div class="navbar-brand">
                    <a href="<?php echo URLROOT;?>">
<!--                        <img src="http://localhost/bootstrap/wp-content/uploads/2019/02/logotwo-1.svg"-->
<!--                             alt="TEsting ajax" class="mCS_img_loaded">-->
                        <?php echo  SITENAME;?>
                    </a>

                </div>

                <!--                        sidebar header-->
            </div>

            <div class="menu-menu-1-container">
                <ul id="menu-menu-1" class="list-unstyled components">
                    <?php
                    if(isset($_SESSION['user_id'])) : ?>
                        <li id="menu-item-5"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-16 ">
                            <a title="LogOut" href="<?php echo URLROOT;?>/users/logout" class="nav-link">LogOut</a></li>
                    <?php  else :?>
                    <li id="menu-item-1"
                        class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-16 ">
                        <a title="Home" href="<?php echo URLROOT;?>" class="nav-link">Home</a></li>
                    <?php  endif;?>
                    <li id="menu-item-2"
                        class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-16 ">
                        <a title="About" href="<?php echo URLROOT;?>/pages/about" class="nav-link">About</a></li>
                </ul>
                <ul id="menu-menu-2" class="list-unstyled components">
                    <li id="menu-item-3"
                        class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-16 ">
                        <a title="Home" href="<?php echo URLROOT;?>/users/register" class="nav-link">Register</a></li>
                    <li id="menu-item-4"
                        class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-16">
                        <a title="About" href="<?php echo URLROOT;?>/users/login" class="nav-link"> LogIn</a></li>
                </ul>
            </div>
            <button type="button" id="sidebarCollapse" class="btn btn-info but-collapse">
                <i class="fas fa-align-left"></i>
                <!--                <span>Toggle Sidebar</span>-->
            </button>
        </div>
    </div>
    <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical"
         style="display: block;">
        <div class="mCSB_draggerContainer">
            <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                 style="position: absolute; min-height: 0px; display: block; height: 0px;">
                <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
            </div>
            <div class="mCSB_draggerRail"></div>
        </div>

    </div>
</nav>

<?php
/**
 * Created by PhpStorm.
 * User: Nikita A
 * Date: 15/04/2019
 * Time: 23:24
 */

