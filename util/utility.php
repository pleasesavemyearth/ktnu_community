<?php

// 사용자 ip를 가져오는 함수 get_client_ip() 생성
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN'; 
return $ipaddress;
}

// 게시판 관리자 정보를 읽어오는 함수
function setup($conn){
    global $category_name;

    $sql = "SELECT * FROM board_admin WHERE category_name = ".$category_name;
    $result = $conn->query($sql);
    $data = mysqli_fetch_array($result);

    return $data;
 }

?>