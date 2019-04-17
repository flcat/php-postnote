<html>
<head>
<script language="javascript">
  function sub(){
   
   var frm   =  document.fileFrm;
  
   frm.submit();
   
  }
  
</script>
</head>
<body>
<form name="fileFrm" action="pcupload.php" method="post" enctype="multipart/form-data">
<!--  보통 여기를 많이 빼먹어서 오류가 난다  -->
    엑셀 파일 : <input type="file" name="excelFile"><br>
    <input type="button" value="전송" onclick="sub()">

</form>
</body>
</html>