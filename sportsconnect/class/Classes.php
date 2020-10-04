<?php 
// Title: Product Filter Search with Ajax, PHP & MySQL
// Author: PHPZAG Team
// Date: 4 December, 2019
// Code Version: 1.0
// Availability: https://www.phpzag.com/product-filter-search-with-ajax-php-mysql/
class Classes{
    private $servername = "localhost";
    private $dBUsername = "root";
    private $dBPassword = "";
    private $dBName = "sportsconnect";
    private $classTable = 'class';
    private $dbConnect = false;
    

    public function __construct(){
        if(!$this->dbConnect){
            $conn = new mysqli($this->servername, $this->dBUsername, $this->dBPassword, $this->dBName);
            if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }

    private function getData($sqlQuery){
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if(!$result){
            die('Error in query: '.mysqli_error());
        }
        $data = array();
        while($row = mysqli_fetch_array($result)){
            $data[]=$row;
        }
        return $data;
    }

    private function getNumRows($sqlQuery){
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if(!$result){
            die('Error in query: '. mysqli_error());
        }
        $numRows = mysqli_num_rows($result);
		return $numRows;
    }

    public function getDay(){
        $sqlQuery = "SELECT DISTINCT(day_class) FROM class ";
        return $this->getData($sqlQuery); 
    }

    public function getLevel(){
        $sqlQuery = "SELECT DISTINCT(trng_level) FROM class ";
        return $this->getData($sqlQuery);
    }

    public function searchClass(){
        $sqlQuery = "SELECT * FROM class WHERE status = '1'";
        if(isset($_POST["minPrice"],$_POST["maxPrice"]) && !empty($_POST["minPrice"]) && !empty ($_POST["maxPrice"])){
            $sqlQuery .="
            AND rate BETWEEN '".$_POST["minPrice"]."' AND '".$_POST["maxPrice"]."'";
        }
        if(isset($_POST["day"])){
            $dayFilterData = implode("','", $_POST["day"]);
            $sqlQuery .="
            AND day_class IN('".$dayFilterData."')";
            //echo $sqlQuery;
        }
        if(isset($_POST["level"])){
            $levelFilterData = implode("','", $_POST["level"]);
            $sqlQuery .="
            AND trng_level IN ('".$levelFilterData."')";
        }
        // echo $sqlQuery;
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $totalResult = mysqli_num_rows($result);
        $searchResultHTML = '';
        if($totalResult>0){
            while($row=mysqli_fetch_array($result)){
                $time = new DateTime($row['time']);
                $searchResultHTML .='
                <div class="col-md-auto">
                <div class="card bg-light mb-3">
                <div class="card-header" style="text-transform: capitalize;">'.$row['coach_name'].'</div>
                <div class="card-body" >
                                                    
                <h6 class="card-subtitle mb-2 text-muted" style="text-transform: capitalize;" >'.$row['sport'].'</h6>
                <p class="card-text" style="text-transform: capitalize;">Level: '.$row['trng_level'].'<br>
                    Location: '.$row['location'].'<br>
                    Day of the class: '.$row['day_class'].'<br>
                    Class time: '.$time->format('h:i A').'<br>
                    Price of the class: $'.$row['rate'].'<br>
                    Maximum Class size: '.$row['class_size'].'</p>
                    <a href="#" class="card-link">Join Class</a>
                    </div>
                </div>
                </div>';
            }
        } else{
            $searchResultHTML = '<h3>No Classes found.</h3>';
        }
        return $searchResultHTML;
    }
}
?>

