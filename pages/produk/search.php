<?php
require 'function.php';

$sort = $_GET['sort'] ?? '';
$sortText = 'Sort by';

if ($sort === 'stok') {
    $produk = query("SELECT * FROM produk ORDER BY stok ASC");
    $sortText = 'Sort by stok';
} elseif ($sort === 'harga') {
    $produk = query("SELECT * FROM produk ORDER BY harga ASC");
    $sortText = 'Sort by harga';
} 

$keyword = $_GET["keyword"];
$query = "SELECT * FROM produk 
            WHERE 
            kode_produk LIKE '%$keyword%' OR
            nama LIKE '%$keyword%'
        ";
$produk = query($query);

?>
<div>
    <div class="table-responsive">
        <table style="border: 1px solid #ddeeee;
                border-collapse: collapse;
                border-spacing: 0;
                width: 70%;
                margin: 10px auto">
            <thead>
                <th>No.</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Gambar Produk</th>
                <th>Aksi</th>
            </thead>
            <tbody style="text-align: center;">
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $sortText; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?sort=stok" data-sort="stok">Stok</a>
                        <a class="dropdown-item" href="?sort=harga" data-sort="harga">Harga</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../produk/">Default</a>
                    </div>
                </div>
                <?php $no = 1;?>
                <?php foreach($produk as $row): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["kode_produk"]; ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["stok"] ?></td>
                    <td>Rp. <?= number_format($row["harga"], 0, ',' , '.'); ?></td>
                    <td><img src="img/<?= $row["gambar"]; ?>" width="120"></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"];?>">Edit</a>
                        <a href="hapus.php?id=<?= $row["eksternal_id"];?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                    <?php $no++;?>
                    <?php endforeach;?>    
            </tbody>
        </table>
    </div>
    <br />
</div>