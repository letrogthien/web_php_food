<link href="../resource/static/css/sidebarAdmin.css" rel="stylesheet"type="text/css">
<div class="bg-dark text-white sidebar-container" id="sidebar-wrapper">
    <a href="/web_php_food/views/index.php" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
        <svg class="bi pe-none me-2" width="30" height="24">
            
        </svg>
        <span class="fs-5 fw-semibold">WEFOOD</span>
    </a>
    <div class="sidebar-body">
        <ul class="sidebar-ul">
            <li>
                <button type="button" class="btn btn-sm product-mn" data-bs-toggle="collapse" 
                    href="#collapseProduct" role="button" aria-expanded="false" aria-controls="collapseProduct">
                    Quản lí sản phẩm
                </button>
                <div class="collapse collapse-product" id="collapseProduct">
                    <ul>
                        <li><a href="/web_php_food//views/adminView.php">Danh sách sản phẩm</a></li>

                    </ul>
                </div>
            </li>
            <li>
    <button type="button" class="btn btn-sm product-mn active" data-bs-toggle="collapse" href="#collapseUser"
        role="button" aria-expanded="false" aria-controls="collapseUser">
        Quản lí người dùng
    </button>
    <div class="collapse collapse-user" id="collapseUser">
        <ul>
             <li><a href="adminWithUser.php">Danh sách người dùng</a></li>
        </ul>
    </div>
</li>

            <li>
                <button type="button" class="btn btn-sm product-mn" data-bs-toggle="collapse" href="#collapseBill"
                    role="button" aria-expanded="false" aria-controls="collapseBill">
                    Quản lí hóa đơn
                </button>
                <div class="collapse collapse-bill" id="collapseBill">
                    <ul>
                        <li><a href="adminBill.php">
                            <span>Danh sách hóa đơn</span>
                        </a></li>
                    </ul>
                </div>
            </li>
             
        </ul>
    </div>




</div>