<div class="spacer">
</div>
<div class="view-students">
<h2>View Students</h2>
  <?php
  include dirname($_SERVER['DOCUMENT_ROOT']).'/htdocs/Stor/db-connect.php';
  ?>
  <p>
    Choose the batch
  </p>
  <select name="batch" id="batch">
    <option selected>
      ----select---
    </option>
<?php
$sql1="SELECT DISTINCT `batch` FROM `student_details`";
$res = mysqli_query($conn, $sql1);
while ($row = $res->fetch_assoc()){
echo "<option value=".$row['batch'].">" . $row['batch'] . "</option>";
}
?>
</select>
<script type="text/javascript">
$('#batch').on('change', function (event) {
  event.preventDefault();
  var batch=document.getElementById("batch").value;
    var formData=new FormData();
    formData.append('batch',batch);
        //  for (var pair of formData.entries()) {
        //  console.log(pair[0]+ ', ' + pair[1]);
        //}
         $.ajax({
         type: "POST",
         url: "admin_view_all_student_delete_ajax.php",
         processData: false,
         contentType: false,
         data:formData,
         success:function(result){
         $("#view-table-results").html(result);
        }
        });
});
</script>
<div id="view-table-results">

</div>
</div>
