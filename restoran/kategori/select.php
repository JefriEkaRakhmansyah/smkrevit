<div style="margin:auto; width:900px;">

<H3><a href="http://localhost/smkrevit/restoran/kategori/select.php">TAMBAH DATA</a></H3>

<?php

    require_once "../function.php";

    $sql= "SELECT idkategori FROM tbkategori ";
    $result = mysqli_query($koneksi, $sql);

    $jumlahdata =mysqli_num_rows($result);

    
    
    $banyak = 3;

        $halaman = ceil ($jumlahdata / $banyak);

        for ($i=1; $i <= $halaman; $i++) { 
            echo '<a href="?p='.$i.'">'.$i. '</a>';
            echo '&nbsp &nbsp &nbsp';
        }

        echo '<br> <br> ';

        if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai = ($p *$banyak) -$banyak;
        }else {
            $mulai = 0;
        }
        
        
    $sql= "SELECT * FROM tbkategori LIMIT $mulai,$banyak";

    $result = mysqli_query($koneksi, $sql);

   // var_dump($result);

    $jumlah = mysqli_num_rows($result);
    // echo '<br>';
    // echo $jumlah;

    echo '
    <table border="1px">
    <tr>
        <th>No</th>
        <th>kategori</th>
    </tr>
    
    ';
    $no=$mulai+1;
    if ($jumlah > 0) {
        while ($row = mysqli_fetch_assoc ($result)) {
            echo ' <tr>';
            echo '<td> '.$no++.'</td>';
            echo '<td> '.$row['kategori']. '</td>';
            echo '</tr>';
        }
    }

 
    echo '</table>';
 

?>
