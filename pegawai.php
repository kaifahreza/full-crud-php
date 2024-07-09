<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Silahkan untuk login terlebih dahulu');
            document.location.href = 'login.php'; 
          </script>";
    exit;
}

// membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 4) {
    echo "<script>
            alert('Perhatian anda tidak punya hak akses');
            document.location.href = 'akun.php'; 
          </script>";
    exit;
}

$title = 'Daftar Pegawai';

include 'layout/header.php';

$data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-users"></i> Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Data Pegawai</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>

                                        <tbody id="live_data">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    $('document').ready(function() {
        setInterval(function() {
            getPegawai()
        }, 500) // request per 2 detik
    });

    function getPegawai() {
        $.ajax({
            url: "realtime-pegawai.php",
            type: "GET",
            success: function(response) {
                $('#live_data').html(response)
            }
        });
    }
</script>

<?php

include 'layout/footer.php';

?>