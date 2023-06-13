<style>
    table {
        text-align: center;
    }
</style>

<?php
$sql_lietke_danhmucsp = "SELECT * from tbl_danhmuc ORDER BY thutu DESC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<p>Liệt kê danh mục sản phẩm</p>

<?php
$lietKe = mysqli_query($mysqli, "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC ");

?>


<table border="1" width="100% " style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Quản lý</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
            $i++;
            ?>

            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $row['tendanhmuc'] ?>
                </td>
                <td>
                    <a class="btn btn-info" title="Sửa"
                        href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"> <span
                            class="glyphicon glyphicon-pencil"></span></a>
                    <a class="btn btn-danger" title="Xóa"
                        href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"> <span
                            class="glyphicon glyphicon-trash"></span></a>





            </tr>
        <?php } ?>


    </form>