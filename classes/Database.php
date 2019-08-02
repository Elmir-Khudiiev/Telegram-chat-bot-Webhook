<?php

namespace classes;

use PDO;

class Database
{
    protected $config;

    protected function connect()
    {
        $this->config = json_decode(json_encode(require('./config.php')));

        $host = $this->config->host;
        $dbname = $this->config->dbname;
        $user = $this->config->user;
        $password = $this->config->password;

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];

        $pdo = new PDO($dsn, $user, $password, $opt);

        return $pdo;
    }

    public function getAnswer(string $var = null)
    {
        $db = $this->connect();
        $request = $db->prepare("SELECT `answer` FROM chat WHERE question = :question");
        $request->execute(['question' => $var]);
        $data = $request->fetchAll();
        foreach ($data as $dt) {
            $result[] = $dt->answer;
        }

        return $result;
    }
}