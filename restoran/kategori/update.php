<?php 

    require_once "../function,php";


    $sql ="SELECT * FROM tbkategori WHERE idkategori = $id";
    $result =mysqli_query($koneksi,$sql);
    $row=mysqli_fetch_assoc($result);
   
    $kategori = 'es jus';
    $id = 21;
    $sql = "UPDATE tbkategori SET kategori='$kategori' WHERE idkategori= $id ";

    $result = mysqli_query($koneksi,$sql);
    echo $sql;




?>

<form action="" method="post">
    kategori:
    <input type="text" name="kategori" value="<?php echo $row['kategori']?>">
    <br>
    <input type="submit" name="simpan" value="simpan">
</form>

<?php 

    if (iset($_POST['simpan'])) {
       $kategori = $_POST['kategori'];
     
       $sql = "UPDATE tbkategori SET kategori='$kategori' WHERE idkategori= $id ";

    $result = mysqli_query($koneksi,$sql);
    
    header("location:http://localhost/smkrevit/restoran/kategori/select.php");
    }

?>