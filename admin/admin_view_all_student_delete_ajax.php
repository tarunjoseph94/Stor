<?php
include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $batch=$_POST['batch'];
  $sql1="SELECT `usn_pk` as usn FROM `student_details` WHERE `batch`='$batch'";
  $res=mysqli_query($conn, $sql1);

  ?>
  <div class="spacer">
  </div>
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <div class="results">
        <h2>USN</h2>
        <?php
        while ($rows = $res->fetch_assoc()){
          ?>
          <div class="row">
            <div class col-sm-6>
              <span class="usn-list"><?php echo $rows['usn'];?></span>
            </div>
            <div class="col-sm-6">
              <button class="btn btn-color" onclick="deleteStudent('<?php echo $rows['usn']; ?>','<?php echo $batch; ?>')">Delete Student</button>
            </div>
          </div>
          <div class="spacer">
          </div>
        <?php } ?>
        <div class="hidden">
        </div>
        <script type="text/javascript">
        function deleteStudent(usn,batch)
        {
          var choice=confirm("Are you sure you want delete all the student files ");
          if(choice)
          {
            var formData=new FormData();
            formData.append('usn',usn);
            formData.append('batch',batch);
            //  for (var pair of formData.entries()) {
            //  console.log(pair[0]+ ', ' + pair[1]);
            //}
            $.ajax({
              type: "POST",
              url: "admin_zip_student_ajax.php",
              processData: false,
              contentType: false,
              async:false,
              data:formData,
              success:function(result)
              {
                if (result.path) {
                  var dlif = $('<iframe/>',{'src':result.path}).hide();
                  $('.hidden').append(dlif);
                  $.ajax({
                    type: "POST",
                    url: "admin_delete_student_ajax.php",
                    processData: false,
                    contentType: false,
                    data:formData,
                    success:function(result)
                    {
                      if(result=='Success')
                      {
                        alert("Student has been sucessfully deleted");
                        window.location.replace("http://localhost/Stor/admin/admin_student.php");
                      }
                    }
                  });
                }
                else if(result="nofile")
                {
                  alert("Student has not uploaded any files")
                  $.ajax({
                    type: "POST",
                    url: "admin_delete_student_ajax.php",
                    processData: false,
                    contentType: false,
                    data:formData,
                    success:function(result)
                    {
                      if(result=='Success')
                      {
                        alert("Student has been sucessfully deleted");
                        window.location.replace("http://localhost/Stor/admin/admin_student.php");
                      }
                    }
                  });
                }
                else
                {
                  alert("File did NOT zip");
                  window.location.replace("http://localhost/Stor/admin/admin_student.php");
                }
              }
            });

          }
        }
        </script>
        </div>
        </div>

        </div>
        <?php }
        ?>
