<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="home.php"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="home.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal"><?= $_SESSION['nama'] ?></h5>
                        <span>Gold Member</span>
                    </div>
                </div>
                
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                
                    <div class="dropdown-divider"></div>
                    
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        
        <li class="nav-item menu-items">
            <a class="nav-link" href="home.php">
                <span class="menu-icon">
                    <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-tag-outline"></i>
                </span>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="product.php">
                            <span class="menu-icon">
                                <i class="mdi mdi-tag"></i>
                            </span>
                            <span class="menu-title">Product</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="category.php">
                            <span class="menu-icon">
                                <i class="mdi mdi-bookmark"></i>
                            </span>
                            <span class="menu-title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="tag.php">
                            <span class="menu-icon">
                                <i class="mdi mdi-bookmark-outline"></i>
                            </span>
                            <span class="menu-title">Sub Category</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item menu-items">
            <a class="nav-link" href="blog.php">
                <span class="menu-icon">
                    <i class="mdi mdi-library-books"></i>
                </span>
                <span class="menu-title">Blog</span>
            </a>
        </li>
        
        <?php
            if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'owner') {
        ?>
        <li class="nav-item menu-items">
            <a class="nav-link" href="users.php">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <?php } ?>
    </ul>
</nav>