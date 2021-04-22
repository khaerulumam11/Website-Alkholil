<?php
include "config.php";

if ($_POST) {

    $opd = $_POST['opd'];
    $instansi = $_POST['instansi'];
    $fungsi = $_POST['fungsi'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];

    if ($opd == '' && $instansi == '' && $fungsi == '' && $provinsi == '' && $kota == '' && $desa == '' && $kecamatan == '') {
        $queryGedung = "SELECT * FROM `tb_bagunan`";
    } else {

        if ($opd != '') {
            $opdSearch = "`odp` LIKE '$opd' ";
        } else {
            $opdSearch = "`odp` !='NULL'";
        }

        if ($instansi != '') {
            $instansiSearch = "`instruktur` LIKE '$instansi' ";
        } else {
            $instansiSearch = "`instruktur` !='NULL'";
        }

        if ($fungsi != '') {
            $fungsiSearch = "`fungsi` LIKE '$fungsi' ";
        } else {
            $fungsiSearch = "`fungsi` !='NULL'";
        }

        if ($provinsi != '') {
            $provinsiSearch = "`provinsi` LIKE '$provinsi' ";
        } else {
            $provinsiSearch = "`provinsi` !='NULL'";
        }
        if ($kota != '') {
            $kotaSearch = "`kota` LIKE '$kota' ";
        } else {
            $kotaSearch = "`kota` !='NULL'";
        }
        if ($desa != '') {
            $desaSearch = "`kelurahan` LIKE '$desa' ";
        } else {
            $desaSearch = "`kelurahan` !='NULL'";
        }
        if ($kecamatan != '') {
            $kecamatanSearch = "`kecamatan` LIKE '$kecamatan' ";
        } else {
            $kecamatanSearch = "`kecamatan` !='NULL'";
        }

        $queryGedung = "SELECT * FROM `tb_bagunan` WHERE $opdSearch AND $instansiSearch AND $fungsiSearch AND $provinsiSearch AND $kotaSearch AND $desaSearch AND $kecamatanSearch";
    }

    if ($result = mysqli_query($mysqli, $queryGedung)) {
        while ($meal = mysqli_fetch_array($result)) {
            $filteredOpd = $meal['odp'];
            $filteredInstansi = $meal['instruktur'];
            $filteredFungsi = $meal['fungsi'];
            $filteredProvinsi = $meal['provinsi'];
            $filteredKota = $meal['kota'];
            $filteredDesa = $meal['kelurahan'];
            $filteredKecamatan = $meal['kecamatan'];
            // $foto = $meal['foto'];
            $nama = $meal['nama'];
            $alamat = $meal['alamat'];
            $id_bangunan = $meal['id_bangunan'];
?>

<div class="sidebar-box recent-blog-box mb-30">
    <div class="recent-blog-items">
        <div class="recent-blog mb-30">
            <div class="recent-blog-img">
                <!-- <img src="../dokumen/<?php echo $foto; ?>" alt=""> -->
                <?php
                            $result9 = mysqli_query($mysqli, "SELECT * FROM gambar_bangunan WHERE id_bangunan='$id_bangunan' LIMIT 1");

                            while ($data9 = mysqli_fetch_array($result9)) {
                                $gambar_bangunan = $data9['gambar']; ?>


                <img src="../dokumen/<?php echo $gambar_bangunan; ?>" alt="">


                <?php } ?>
            </div>
            <div class="recent-blog-content">
                <h5><?php echo $nama; ?></h5>
                <p><a href="detailgedung.php?id_bangunan=<?php echo $id_bangunan; ?>"><?php echo $id_bangunan; ?></a>
                </p>
                <span><?php echo $alamat; ?></span></br></br>
                <div class="table-responsive">
                    <table class="table-hover dataTables-example">
                        <tr>
                            <td>
                                Instansi
                            </td>
                            <td>:</td>
                            <td><?php echo $filteredInstansi; ?></td>
                        </tr>
                        <tr>
                            <td>
                                OPD
                            </td>
                            <td>:</td>
                            <td><?php echo $filteredOpd ?></td>
                        </tr>
                        <tr>
                            <td>
                                Fungsi
                            </td>
                            <td>:</td>
                            <td><?php echo $filteredFungsi; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        }
    }
}
