<div class="create-form">
<h2>Create Professor</h2>

  <form method="POST">
    <p>
      Enter Professor ID
    </p>
    <input type="text" id="professorid" name="professorid" class="form-control createstudent" placeholder=""/>
    <div class="spacer">
    </div>
    <input type="submit" class="btn btn-color" id="create-professor-submit" />
  </form>
  <script type="text/javascript">

    $('#create-professor-submit').on('click', function (event) {
      event.preventDefault();
      var professorid=document.getElementById("professorid").value;
      if (professorid== "") {
        alert(" Please enter the usn format ");
        $('html, body').animate({
          scrollTop: ($('#usnformat').offset().top)
        }, 500);
        return false;
      }

          else {
            var formData=new FormData();
            formData.append('professorid',professorid);
            //  for (var pair of formData.entries()) {
            //  console.log(pair[0]+ ', ' + pair[1]);
            //}
            $.ajax({
            type: "POST",
            url: "admin_create_professor_ajax.php",
            processData: false,
            contentType: false,
            data:formData,
            success:function(result)
            {
              if(result=='Error')
              {
                alert("Did not create the ID");
              }
              else {
                alert("Sucesfully created");
                window.location.replace("http://localhost/Stor/admin/admin_professor.php");
              }
            }
            });
          }
    });

    </script>
</div>
