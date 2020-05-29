​<?php
    class DB {
        private $connect;
        function __construct($server,$user,$pass,$dbname){
            $this->connect = new Mysqli($server, $user, $pass, $dbname);
            if (mysqli_connect_errno()) {
                printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                exit();
            }
        }
        
        public function select($query){
                $data =$this->connect->query($query);
                while ($row =  mysqli_fetch_assoc($data)) {
                    $result[] = $row;
                }
                return $result; 
        }

        public function insert($table, $data){
            $qKeys ='';
            $qValues = '';
            foreach ($data as $key => $value){
                $qKeys .= $this->connect->real_escape_string(htmlspecialchars($key)).',';
                $qValues .= '"'. $this->connect->real_escape_string(htmlspecialchars($value)) .'"' .',';
            }
            $table = $this->connect->real_escape_string(htmlspecialchars($table));
            $qKeys = substr($qKeys,0,-1);
            $qValues = substr($qValues,0,-1);
            $result = $this->connect->query("INSERT INTO $table ($qKeys) VALUES ($qValues)");
            return $result;
        }

        public function delete($from, $where){
            return $this->connect->query("DELETE FROM $from WHERE $where");
        }

        public function update($table, $data, $where= "1 = 1"){
            $toSet = '';
            foreach ($data as $key => $value){
                $toSet .= "$key = '$value', "; 
            }
            $toSet = substr($toSet,0,-2);
            return $this->connect->query("UPDATE $table SET $toSet WHERE $where");
        }
        
        public function insertTest($table, $data){
            $qKeys ='';
            $qValues = '';
    
            $qKeys = substr($qKeys,0,-1);
            $qValues = substr($qValues,0,-1);

            $result = $this->connect->query("INSERT INTO $table ($qKeys) VALUES ($qValues)");
            return $result;
        }

        function __destruct() {
            $this->connect->close();
        }
    }
    $obj = new DB('localhost','root','','artur');
    // SELECT
    // $sel = $obj->select("SELECT *  FROM market");
    // var_dump( $sel);

    // INSERT
    $data = [
        'title' => 'Ford',
         'description' => 'Lovely old american car',
         'count' => 1000,
         'price' => 7000
     ];
     $insert = $obj->insert('market',  $data);
     var_dump($insert);

    // DELETE
    // $delete = $obj->delete('market', 'id = 131');   
    // var_dump($delete);


    // UPDATE 
    // $data2 = [
    //     'title' => 'Another',
    //     'description' => 'Another car',
    //     'count' => 300,
    //     'price' => 1001
    // ];
    // $update = $obj->update('market', $data2, "id = 131");
    // var_dump($update);


