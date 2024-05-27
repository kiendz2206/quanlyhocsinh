<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','hocsinh') or die('kết nối thất bại ');
	mysqli_query($link, 'SET NAMES UTF8');  //kết nối cơ sở dữ liệu
?>

    <head>
        <meta charset="utf-8">
        <title>HỌC SINH</title>
        <link rel="stylesheet" href="css/qlhs.css">
        <link rel="stylesheet" href="style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="image/anh4.png">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="image/anh4.png " width="30px">
					  </div>
					<a href="index.php">Trường THPT Xuân Phương</a>
				 </div>
				<div id="accountName">
					
					<p> Xin chào ! </p>
					<a href="dangxuat.php" alt= "Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				</div>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li><a href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="lop.php"><i class="fas fa-users"></i>LỚP</a></li>
                      <li><a href="hocsinh.php" ><i class="fas fa-graduation-cap"></i>HỌC SINH</a></li>
                      <li><a href="giaovien.php"><i class="fas fa-chalkboard-teacher"></i>GIÁO VIÊN</a></li>
                      <li><a id="current"  href="diemthi.php"><i class="fas fa-check"></i>ĐIỂM THI</a></li>
                      <li><a href="contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>CHỌN SỬA Ở CỘT CHỨC NĂNG </h2><br>
			  <div id="listSV">
				

							  <table width = "70%">
								<tr>
									<th>STT</th>
									
									<th>HỌC SINH</th>
									<th>Toán</th>
									<th>Lý</th>
									<th>Hóa</th>
									<th>Anh</th>
									<th>Chức năng</th>
								</tr>
							 
							<?php
								
										$query = " SELECT *  FROM hocsinh INNER JOIN diemthi ON hocsinh.hocsinhID = diemthi.hocsinhID ";
									
									
										$result = mysqli_query($link, $query);
										if(mysqli_num_rows($result) > 0){
											$i=0;
											while ($r = mysqli_fetch_assoc($result)){
												$i++;
												$hocsinhID = $r['hocsinhID'];
												$diemthiID = $r['diemthiID'];
												$ten= $r['name'];
												$toan=$r['toan'];
												$ly = $r['ly'];
												$hoa = $r['hoa'];
												$anh = $r['anh'];
												$TBC = ($toan + $ly +$hoa + $anh)/4;
												echo "<tr> ";
												echo "<td>$i</td>";	
												echo "<td>$ten</td>"	;
												echo "<td>$toan</td>";
												echo "<td>$ly</td>";	
												echo "<td>$hoa</td>"	;
												echo "<td>$anh</td>"	;
											
												echo "<td style='text-align: center;'> <a href='chucnang/formsuadiem.php?id=$hocsinhID'><input id='btnSua' type='button' value='sửa' '></a> </td>";

												}
											}
									
								
								
							?>
							</table>
					  </div>
					
			  <br>
			
		
              </div>
                    
            </div>
           
        </div>
       
    </body>
</html>
<?php
	}
	else {
		header('location:login.php');
	}
?>