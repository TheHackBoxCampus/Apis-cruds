<?php
    namespace App\models; 
    use Config\connection; 
    use PDO;

    class model_working_info {
        protected $message; 

        public function __construct(
            public $id = 1, 
            public $staff = 1, 
            public $years_exp = 4, 
            public $months_exp = 2, 
            public $id_work_reference = 1, 
            public $id_personal_ref = 1, 
            public $start_contract = 1, 
            public $end_contract = 1) {

                $this->id = $id;     
                $this->staff = $staff;     
                $this->years_exp = $years_exp;     
                $this->months_exp = $months_exp;     
                $this->id_work_reference = $id_work_reference;     
                $this->id_personal_ref = $id_personal_ref;     
                $this->start_contract = $start_contract;     
                $this->end_contract = $end_contract;     
        }

        // get data from table working_info

        public function getDataWorkingInfo() {
            try {
                $db = new connection; 
                $query = 'SELECT w.id AS idWorking, 
                (SELECT s.first_name FROM staff AS s WHERE s.id LIKE w.id) AS Name,
                (SELECT s.second_name FROM staff AS s WHERE s.id LIKE w.id) AS LastName,
                w.years_exp AS Years,
                w.months_exp AS Months,
                (SELECT wr.position FROM work_reference AS wr WHERE w.id_work_reference LIKE wr.id) AS Position,
                (SELECT pf.occupation FROM personal_ref AS pf WHERE w.id_personal_ref LIKE pf.id) AS occupation,
                w.start_contract AS StartC,
                w.end_contract AS EndC
                FROM working_info AS w';

                $stamento = $db->connect()->prepare($query); 
                $stamento->execute(); 
                $res = $stamento->fetchAll(PDO::FETCH_ASSOC); 
                $db->disconnect(); 
                if(empty($res)) {
                    echo "No hay registros"; 
                }
                return ['data' => $res]; 
            }catch(\PDOException $err) {
                echo $err->getMessage(); 
            }
        }
    }
?>

