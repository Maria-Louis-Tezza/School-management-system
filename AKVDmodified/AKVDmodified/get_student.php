<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Code for Students
if (!empty($_POST["classid"])) {
    $cid = intval($_POST['classid']);
    if (!is_numeric($cid)) {
        echo "Invalid Class";
        exit;
    } else {
        $sql = "SELECT username, id FROM user WHERE ClassId = $cid ORDER BY username";
        $result = mysqli_query($data, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<option value=''>Select Student</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . htmlentities($row['id']) . "'>" . htmlentities($row['username']) . "</option>";
            }
        }
    }
}

// Code for Subjects
if (!empty($_POST["classid1"])) {
    $cid1 = intval($_POST['classid1']);
    if (!is_numeric($cid1)) {
        echo "Invalid Class";
        exit;
    } else {
        $status = 0;
        $sql = "SELECT tblsubjects.SubjectName,tblsubjects.id FROM tblsubjectcombination join tblsubjects on tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=$cid1 and tblsubjectcombination.status!=$status order by tblsubjects.SubjectName";
        $result = mysqli_query($data, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . htmlentities($row['SubjectName']) . "<input type='text' name='marks[]' value='' class='form-control' required='' placeholder='Enter marks out of 100' autocomplete='off' maxlength='3'></p>";
        }
    }
}

if (!empty($_POST["studclass"])) {
    $id = $_POST['studclass'];
    $dta = explode("$", $id);
    $id = $dta[0];
    $id1 = $dta[1];
    $sql = "SELECT StudentId, ClassId FROM tblresult WHERE StudentId='$id1' and ClassId='$id'";
    $result = mysqli_query($data, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<p><span style='color:red'> Result Already Declare .</span><script>$('#submit').prop('disabled',true);</script></p>";
    }
}
?>