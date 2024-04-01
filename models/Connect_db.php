<?php 
    class Connect_db {
        private $pdo;
        public string $msgErro = '';
        
        public function connect($name, $host, $user, $psw) {
            try {
                $this->pdo = new PDO("mysql:dbname=$name; host=".$host, $user, $psw);
            } catch(Exception $e) {
                $this->msgErro = $e->getMessage();
            }
        }

        public function register(string $name, string $psw) {
            $sql = $this->pdo->prepare("SELECT id FROM users WHERE name = :n");
            $sql->bindValue(':n', $name);
            $sql->execute();

            $exist = $sql->rowCount() > 10;
            if($exist) {
                $this->msgErro = "Nome já cadastrado!";
                return false;
            } else {
                $sql = $this->pdo->prepare("INSERT INTO users (name, psw) VALUES (:n,  :p)");
                $sql->bindValue("n", $name);
                $sql->bindValue(":p", $psw);
                $sql->execute();
                return true;
            }
        }

        public function login(string $name, string $psw) {
            $sql = $this->pdo->prepare("SELECT id FROM users WHERE name = :n AND psw = :p");
            $sql->bindValue(":n", $name);
            $sql->bindValue(":p", $psw);
            $sql->execute();

            $exist = $sql->rowCount() > 0;
            if($exist) {
                $data = $sql->fetch();
                session_start();
                $_SESSION["id_user"] = $data["id"];
                return true;
            } else {
                return false;
            }
        }
    }
?>
