<?php 
    $fileName = 'results.json';
    // Lấy dữ liệu trong file resluts.json
    $jsonData = file_get_contents($fileName);
    $listData = json_decode($jsonData);

    $ageDataArr = array(
        '1' => '0-16 tuổi',
        '2' => '25-40 tuổi',
        '3' => '40-60 tuổi',
        '4' => 'Trên 60 tuổi',
    );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <a type="button" class="btn btn-success" href="index.php">Đặt lịch</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên KH</th>
                    <th>Độ tuổi</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th>Triệu chứng</th>
                    <th>Đặt lịch vào lúc</th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($listData)) :
                        foreach($listData as $key => $row) :
                            $symptom = '';

                            // Lấy mảng symptom
                            foreach($row->symptom as $row_s){
                                $symptom .= $row_s.', ';
                            }

                            // Bỏ dấu ',' cuối chuỗi
                            $symptom = trim($symptom, ', ');
                ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $row->name ?>
                                </td>
                                <td>
                                    <?= $ageDataArr[$row->age] ?>
                                </td>
                                <td>
                                    <?= $row->phone ?>
                                </td>
                                <td>
                                    <?= $row->email ?>
                                </td>
                                <td>
                                    <?= $row->content ?>
                                </td>
                                <td>
                                    <?= $symptom ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y H:i:s', strtotime($row->created_at)) ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-info">Tư vấn</button>
                                </td>
                            </tr>
                <?php
                        endforeach;
                    endif;
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>