<?php
if(isset($_POST['select1'])){
    $select1 = $_POST['select1'];
    switch ($select1) {
        case 'value1':
            echo 'this is value1<br/>';
            break;
        case 'value2':
            echo 'value2<br/>';
            break;
        default:
            # code...
            break;
    }
}
?>


<form action="" method="post">
    <select name="select1">
        <option value="value1">Value 1</option>
        <option value="value2">Value 2</option>
    </select>
    <input type="submit" name="submit" value="Go"/>
</form>