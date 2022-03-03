<?php
    // Thêm dữ liệu vão file results.json
    function writeDataContent($fileName, $data){
        $data = json_encode($data);
        file_put_contents($fileName, $data);
    }

    if(!empty($_POST['age'])){
        $age        = $_POST['age'];
        $name       = $_POST['name'];
        $phone      = $_POST['phone'];
        $email      = $_POST['email'];
        $content    = $_POST['content'];
        $symptomJson = json_decode($_POST['inputCheck']);

        // File chứa dữ liệu
        $fileName = 'results.json';
        // Lấy dữ liệu trong file resluts.json
        $jsonData = file_get_contents($fileName);
        $jsonData = json_decode($jsonData, true);

        $dataArr = array(
            'id'         => rand(1, 10000),
            'age'        => $age, 
            'name'       => $name,
            'phone'      => $phone,
            'email'      => $email,
            'content'    => $content,
            'symptom'    => $symptomJson,
            'created_at' => date('Y-m-d H:i:s')
        );

        // check empty
        if(empty($jsonData)){
            // Khởi tạo giá trị đầu tiên cho file json
            $data[0] = $dataArr;
            
            writeDataContent($fileName, $data);
        }else{
            // Thêm value mới vào mảng json
            array_push($jsonData, $dataArr);

            writeDataContent($fileName, $jsonData);
        }
        header('Location: thank.php');
        die();
    }

?>