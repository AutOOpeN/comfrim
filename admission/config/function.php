<?php
class spk
{
    public function spkHeader($edu_year)
    {
        echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <title>ระบบรับนักเรียน ห้องเรียนปกติ $edu_year </title>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                <link rel='stylesheet' type='text/css' href='../../../bootstrap/dist/css/bootstrap.css'>
                <link rel='stylesheet' type='text/css' href='../../../Font-Awesome/css/all.css'>
                <script src='../../../js/jquery-3.3.1.min.js'></script>
                <script src='../../../js/popper.min.js'></script>
                <script src='../../../bootstrap/dist/js/bootstrap.min.js'></script>

            ";
    }

    public function spkFooter()
    {
        $Ycopyright = date('Y') + 543;
        echo "
			<footer class='container-fluid text-center '>
			  <p>
			  	<i class='far fa-copyright'></i> $Ycopyright <a href='http://www.satreephuket.ac.th' target='_blank'>โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000  โทร 076-222368
			  </p>
			</footer>
		";
    }
    public function spkMenu()
    {
        /* echo "
        <div class='col-sm-2 sidenav'>
        <p><a href='../index.php'><i class='fas fa-angle-double-right'></i> หน้าแรก <i class='fas fa-angle-double-left'></i></a></p>
        <p><a href='#'><i class='fas fa-angle-double-right'></i> อัพโหลดเอกสาร O-NET <i class='fas fa-angle-double-left'></i></a></p>
        <p><a href='#'><i class='fas fa-angle-double-right'></i> พิมพ์ใบชำระเงิน <i class='fas fa-angle-double-left'></i></a></p>
        <p><a href='#'><i class='fas fa-angle-double-right'></i> รายงาน <i class='fas fa-angle-double-left'></i></a></p>
        </div>
        ";
         */
        echo "
        <div class='col-sm-2 sidenav'>
        </div>
        ";
    }
}

class mydb
{
    public $statusConn;
    protected $datab;

    // connect to database
    public function __construct($username = "rosot", $password = "spk0nline", $host = "127.0.0.1", $dbname = "SpkEntrance", $options = [])
    {
        $this->statusConn = true;
        try {
            $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    // disconnect database
    public function Disconnect()
    {
        $this->datab      = null;
        $this->statusConn = false;
    }

    // get row
    public function getRow($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    // get rows
    public function getRows($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    // insert row
    public function insertRow($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    // update row
    public function updateRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

    // delete row
    public function deleteRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }
}
