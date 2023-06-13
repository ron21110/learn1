<p>Sửa danh mục sản phẩm</p>
<?php
$sql_sua_danhmucsp="SELECT * from tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
$query_sua_danhmucsp=mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>

<table border="1" width="50% " style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
        <tr>
            <td>Tên danh mục</td>
            <td> <input type="text" name="tendanhmuc"> </td>

        </tr>
        <tr>
            <td>Thứ tự</td>
            <td> <input type="text" name="thutu"> </td>

        </tr>
        <tr>
            <td colspan="2"> <input type="submit" name="themdanhmuc" value="Thêm danh mục"> </td>
        </tr>
    </form>


</table>