 <?php
/*
 * !CodeTemplates.newfile.content1!
 *
 * !CodeTemplates.newfile.content2!
 * !CodeTemplates.newfile.content3!
 */
// include_once '../include/error.php';
 
 
$uploaddir = 'uploads/thumbnails/';
$uploadfile = $uploaddir.basename($_FILES['uploadedfile']['extension']['name']);

echo '<pre>';
echo "file error:".$_FILES['uploadedfile']['error'];
//************ 오류 코드 ***************************
// 0 : 성공
// 1 : php.ini 의 upload_max_filesize 보다 큽니다.
// 2 : html 폼에서 지정한  max file size 보다 큽니다.
// 3 : 파일이 일부분만 전송되었습니다.
// 4 : 파일이 전송되지 않았습니다.
// 6 : 임시 폴더가 없습니다.
// 7 : 디스크에 파일 쓰기를 실패하였습니다.
// 8 : 확장에 의해 파일 업로드가 중지되었습니다.
//************ 오류 코드 ***************************
if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$uploadfile)) {
//임시로 파일 업로드 되는 곳에서 실제로 파일 업로드 할 곳으로 옮겨준다
    echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
} else {
    print "파일 업로드 공격의 가능성이 있습니다!\n";
}
echo '자세한 디버깅 정보입니다:';
print_r($_FILES);
print "</pre>"; 
?>