<?php     
    // Array triệu chứng bệnh
    $symptomData = [
        'Đau thượng vị',
        'Đau bụng',
        'Buồn nôn, nôn',
        'Ói ra máu',
        'Thiếu máu',
        'Tiêu chảy',
        'Táo bón',
        'Đau hậu môn'
    ];

    $ageDataArr = [
        [
            'id'   => 1,
            'name' => '0-16 tuổi'
        ],
        [
            'id'   => 2,
            'name' => '25-40 tuổi'
        ],
        [
            'id'   => 3,
            'name' => '40-60 tuổi'
        ],
        [
            'id'   => 4,
            'name' => 'Trên 60 tuổi'
        ],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="center">Đặt lịch khám</h1>
                <p class="center">Đặt lịch khám ngay với bác sĩ của Doctor Check. Đội ngũ chăm sóc khách hàng sẽ liên hệ để xác nhận cuộc hẹn.</p>
                <div class="center">
                    <h4>LIÊN HỆ QUA ONLINE:</h4>
                    <a href="tel:02856789999" class="btn phone">028 5678 9999</a>
                </div>
                <br>
                <select class="form-control" id="selectAge">
                    <option selected>Chọn độ tuổi</option>
                    <?php foreach($ageDataArr as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div id="formData1" style="display:none;">
                    <p>Triệu chứng</p>
                    <div class="row">
                        <?php foreach($symptomData as $key => $row) : ?>
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input sysptom" type="checkbox" data-value="<?= $row ?>" id="value_<?= $key + 1 ?>">
                                    <label class="form-check-label" for="value_<?= $key + 1 ?>">
                                        <?= $row ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <br>
                    <div class="center">
                        <button type="button" id="nextForm2" class="btn btn-primary">Tiếp theo</button>
                    </div>
                </div>    
                
                <div id="formData2" style="display:none;">
                    <form method="post" action="control.php">
                        <input id="age" name="age" type="text" hidden>
                        <input id="inputCheck" name="inputCheck" type="text" hidden>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên *" require>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại *" require>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ email *" require>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="content" name="content" cols="10" rows="5" placeholder="Nội dung"></textarea>
                        </div>
                        <div class="center">
                            <button type="submit" class="btn btn-primary" id="send">Đặt lịch khám</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js.js"></script>
</body>
</html>