<!DOCTYPE html>
<html>
<head>
  <title>Mở trang web ngẫu nhiên</title>
</head>
<body>
  <form method="post">
    <label for="linkInput">Nhập đường link:</label>
    <input type="text" id="linkInput" name="link" required />
    <label for="numLinksInput">Số lượng trang web cần mở:</label>
    <input type="number" id="numLinksInput" name="num_links" min="1" max="50" value="10" required />
    <label for="tabOption">Loại tab mở trang web:</label>
    <select id="tabOption" name="tab_option">
      <option value="_blank">Mở tab mới</option>
      <option value="_self">Mở tab hiện tại</option>
      <option value="_blank-switch">Mở tab mới và chuyển đổi đến tab đó</option>
    </select>
    <button type="submit" name="submit">Mở các trang web</button>
  </form>

  <?php
  if(isset($_POST['submit'])) {
    $link = $_POST['link'];
    $html = file_get_contents($link);
    $dom = new DOMDocument();
    
    // Kiểm tra tính hợp lệ của đường link được nhập vào
    if (filter_var($link, FILTER_VALIDATE_URL) === false) {
      echo "<p style='color:red;'>Đường link không hợp lệ.</p>";
      exit();
    }

    // Lấy danh sách các đường link từ bên trong trang web được nhập vào
    @$dom->loadHTML($html);
    $links = $dom->getElementsByTagName('a');
    $linkList = array();
    foreach ($links as $link) {
      $href = $link->getAttribute('href');
      if (strpos($href, '#main') === false && !empty($href)) {
        array_push($linkList, $href);
      }
    }

    // Kiểm tra số lượng trang web cần mở
    $numLinks = $_POST['num_links'];
    if ($numLinks > count($linkList)) {
      echo "<p style='color:red;'>Sốlượng trang web cần mở vượt quá số lượng đường link có sẵn.</p>";
      exit();
    }

    // Chọn ngẫu nhiên các đường link từ danh sách các đường link bên trong trang web
    $randomLinks = array_rand($linkList, $numLinks);

    // Mở các trang web ngẫu nhiên trong các tab mới, tab hiện tại, hoặc tab mới và chuyển đổi đến tab đó
    $tabOption = $_POST['tab_option'];

    foreach ($randomLinks as $index) {
      $randomLink = $linkList[$index];
      echo "<script>window.open('$randomLink', '$tabOption');</script>";
    }
  }
  ?>
</body>
</html>