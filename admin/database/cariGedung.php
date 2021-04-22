<?php
include "config.php";

if ($_POST) {

    $cari = $_POST['cari'];

    if ($cari == '') {
        $queryGedung = "SELECT * FROM `tb_bagunan`";
    } else {

        if ($cari != '') {
            $cariSearch = "`nama` LIKE '$cari' ";
        } else {
            $cariSearch = "`nama` !='NULL'";
        }

        $queryGedung = "SELECT * FROM `tb_bagunan` WHERE $cariSearch ";
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
