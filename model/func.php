<?php
require_once('database.php');

class Func
{
    private static $instance = null;
    private $db;

    private function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Func();
        }
        return self::$instance;
    }

    public function selectQuery($query)
    {
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function escapeString($string)
    {
        if ($this->db) {
            return $this->db->quote($string);
        }
        return addslashes($string);
    }
    public function executeQuery($query)
{
    try {
        return $this->db->exec($query);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

    public function inupdel($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }
    function smtp_mailer($to,$subject, $msg){
        require_once("../smtp/PHPMailerAutoload.php");
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587; 
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = 2; 
        $mail->Username = "";
        $mail->Password = "";
        $mail->SetFrom("email");
        $mail->Subject = $subject;
        $mail->Body =$msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if(!$mail->Send()){
            echo $mail->ErrorInfo;
        }else{
            return 'Sent';
        }
    }
}
