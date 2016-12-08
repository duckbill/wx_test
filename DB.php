<?php

require('./Helper.php');

class DB
{
    protected $pdo;

    function __construct()
    {
        $serverName = env("MYSQL_PORT_3306_TCP_ADDR", "localhost");
        $databaseName = env("MYSQL_INSTANCE_NAME", "tfjs");
        $username = env("MYSQL_USERNAME", "tfjs");
        $password = env("MYSQL_PASSWORD", "tfjs_admin");

        try {
            $this->pdo = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 检测数据库是否存在表
            $isInstall = $this->pdo->query("SHOW TABLES like 'contacts';")
                ->rowCount();

            if (!$isInstall) {
                $sql = "
            CREATE TABLE contacts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            statue VARCHAR(255) NOT NULL default '0' )
            ";
                $this->pdo->exec($sql);

                $sqlData = "
        INSERT INTO `contacts` VALUES ('1', 'John','0');
        INSERT INTO `contacts` VALUES ('2', 'Bob','0');
        INSERT INTO `contacts` VALUES ('3', 'Zoe','0')";
                $this->pdo->exec($sqlData);
            }


        } catch (PDOException $e) {
            echo "数据库链接失败: " . $e->getMessage();
            die();
        }
    }

    public function all()
    {
        return $this->pdo->query('SELECT * from contacts')
            ->fetchAll();
    }
    public  function list_user()
    {
        return $this->pdo->query('SELECT name from contacts')->fetchAll();
    }
    public function find($id)
    {
        return $this->pdo->query("SELECT * from contacts WHERE id = $id ")
            ->fetch();
    }

    public function remove($id)
    {
        return $this->pdo->exec("DELETE from contacts WHERE id = $id ");
    }

    public function admin_add($name)
    {
        $sql = "INSERT INTO contacts ( name ) VALUES ('$name')";
        return $this->pdo->exec($sql);
    }

}
