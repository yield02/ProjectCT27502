

$(document).ready(function(){
    $('#changePass').submit(function(event){
        event.preventDefault();
        $.ajax({
            url: "/user/changePwd",
            type: "POST",
            data: {
                oldPassword: $("#opwd").val(),
                newPassword: $("#npwd").val(),
            },
            success: function(response) {
                $("#cpResult").html(response);
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

   $('#changeInformation').submit(function(event){
        event.preventDefault();
        var email = $("#iEmail").val().trim();
        var fullname = $("#iFullName").val().trim();
        var address = $("#iAddress").val().trim();
        var phone = $("#iPhone").val().trim();

        var flag = true;

        if (email === "") {
            var html = "Bạn chưa nhập email kìa!";
            $('#e_validation').html(html);
            $('#iEmail').addClass('is-invalid');
            flag = false;
        }
        
        if (fullname === "") {
            var html = "Bạn chưa nhập họ và tên kìa";
            $('#n_validation').html(html);
            $('#iFullName').addClass('is-invalid');
            flag = false;
        }
        
        if (address === "") {
            var html = "Bạn chưa nhập địa chỉ kìa";
            $('#a_validation').html(html);
            $('#iAddress').addClass('is-invalid');
            flag = false;
        }
        
        if (phone === "") {
            var html = "Bạn chưa nhập số điện thoại kìa";
            $('#p_validation').html(html);
            $('#iPhone').addClass('is-invalid');
            flag = false;
        }
        

        if (email !== "" && !isValidEmail(email)) {
            var html = "Email không hợp lệ!";
            $('#e_validation').html(html);
            $('#iEmail').addClass('is-invalid');
            flag = false;
        }else $('#iEmail').addClass('is-valid');

        if (fullname !== "" && (fullname.length > 26 || /\d/.test(fullname))) {
            var html = "Không nhập số hoặc vượt quá 26 từ!";
            $('#n_validation').html(html);
            $('#iFullName').addClass('is-invalid');
            flag = false;
        }else $('#iFullName').addClass('is-valid');
    
        if (address !== "" && address.length > 256) {
            var html = "Không nhập quá 255 kí tự!";
            $('#a_validation').html(html);
            $('#iAddress').addClass('is-invalid');
            flag = false;
        }else $('#iAddress').addClass('is-valid');
    
        if (phone !== "" && (phone.length < 10 || phone.length > 11)) {
            var html = "Chỉ nhập 10 số!";
            $('#p_validation').html(html);
            $('#iPhone').addClass('is-invalid');
            flag = false;
        }else $('#iPhone').addClass('is-valid');
        
        if (flag) {
            $.ajax({
                url: "/user/changeinfor",
                type: "POST",
                data: {
                    Email: $("#iEmail").val(),
                    Fullname: $("#iFullName").val(),
                    Address: $("#iAddress").val(),
                    Phone: $("#iPhone").val()
                },
                success: function(response) {
                    console.log(response);
                    $("#ciResult").html(response);
                     
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        } else {
            // Hiển thị thông báo lỗi cho tất cả các trường không hợp lệ
        }

    });
});