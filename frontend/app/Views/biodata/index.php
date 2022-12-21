<?= view("layout/header") ?>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?= view("layout/sidebar") ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?= view("layout/navbar") ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Data Tables</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Data Tables</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Data Biodata</h4>
                                    </div>
                                    


                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="basic-datatable-preview">
                                            <table id="member" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Penulis</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>no telp</th>
                                                        <th>action</th>

                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php foreach ($biodata as $row) : ?>
                                                        <tr>
                                                            <td><?= $row->nama ?></td>
                                                            <td><?= date('d-m-Y', strtotime($row->tgl_lahir)) ?></td>
                                                            <td><?= $row->tempat_lahir ?></td>
                                                            <td><?= $row->alamat ?></td>
                                                            <td><?= $row->no_telp ?></td>
                                                            <td>
                                                                <div class="send-panel">
                                                                    <a onclick="umur('<?=$row->id?>')" class="btn mb-3 btn-info" style="margin-top: 15px;"><i class="fa fa-trash"></i>detail</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- end preview-->


                                    </div> <!-- end tab-content-->


                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <div class="iq-card-body">
                        <div class="modal fade" id="detailEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Umur:</label>
                                                <div id="umur"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Jumlah Karakter Nama:</label>
                                                <div id="jumlah"></div>
                                            </div>
                                        </div><br>
                                        <!-- <label>Description:</label>
                                        <div id="description"></div><br>
                                        <label>Location:</label>
                                        <div id="location"></div><br>
                                        <label>Summary:</label>
                                        <div id="summary"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->


    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <?= view("layout/script") ?>
    <?= view("layout/js") ?>
    <!-- end demo js-->
</body>

</html>