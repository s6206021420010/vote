  <script type="text/javascript">
     function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("รหัสผ่านระดับง่าย' (ควรมีอย่างน้อย 6 ตัวอักษร)");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("รหัสผ่านระดับดีเยี่ยม");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("รหัสผ่านระดับกลาง (ควรประกอบด้วยตัวอักษร ตัวเลข และอักขระพิเศษ)");
                }
            }
        }
        
    $('#sub_pass').click(function(){
      var pass1 = $('#password').val()
      var pass2 = $('#pass_new2').val()
      var id = $('#pass_id').html()
      if (pass2 == pass1 && pass1 != "" && pass2 != "") {
        $.ajax({
                type: "POST",
                url: "chang_pass.php",
                data: {pass: pass1,
                  id: id
                },
                success: function(data){
                  Swal.fire(
                  'เปลี่ยนรหัสผ่าน!',
                  'เปลี่ยนรหัสผ่านสำเร็จ!',
                  'success'
                )

                }
              })
      }
      else{
        Swal.fire({
        icon: 'error',
        title: 'เปลี่ยนรหัสไม่สำเร็จ',
        text: 'กรุณาลองอีกครั้ง!',
      })
      }
    })
    $('#pass_new2').keyup(function(){
      var pass1 = $('#password').val()
      var pass2 = $('#pass_new2').val()
      if (pass2 == pass1) {
        Swal.fire('รหัสผ่านตรงกัน')

      }
    })
    $('#pass_ck').keyup(function(){
      // alert("hello")
      var pass_last = $('#pass_ck').val()
      var pass_base = $('#pass_base').html()
       if (pass_base == pass_last) {
        $('#new_pass').fadeIn()
        $('#pass_ck').hide()
        $('#lab_ck').hide()
        
        
       }
    })


  $('#provinces').change(function() {
    var id_province = $(this).val();
// $('#provinces').val();
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_province,function:'provinces'},
      success: function(data){
          $('#amphures').html(data);

      }
    });
  });

  $('#amphures').change(function() {
    var id_amphures = $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_amphures,function:'amphures'},
      success: function(data){
          $('#districts').html(data);
      }
    });
  });
</script>
