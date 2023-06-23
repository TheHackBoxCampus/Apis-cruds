<?php
    namespace App\controllers; 
    use App\models\model_working_info;
    use PDOException;

    class controller_working_info {
        // get data from table working_info 
        public function getDataAll() {
            try {
                $MdlWing = new model_working_info; 
                print_r($MdlWing->getDataWorkingInfo()); 
            }catch (\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }

?>