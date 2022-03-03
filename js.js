let inputCheck = [];
        
$('#selectAge').change(function(){
    let age = $(this).val();
    $('#age').val(age);
    $("#formData1").show();
    $(this).hide();
});

$('#nextForm2').click(function(){
    $("#formData1").hide();
    $("#formData2").show();
})

$('.sysptom').click(function(){
    let value = $(this).data('value');
    
    // Check tồn tại
    if(inputCheck.includes(value)){
        // Nếu đã tồn tại thì xóa
        while (inputCheck.indexOf(value) !== -1) {
            inputCheck.splice(inputCheck.indexOf(value), 1);
        }
    }else{
        // Thêm vào mảng
        inputCheck.push(value);
    }
    $('#inputCheck').val( JSON.stringify(inputCheck) );
});