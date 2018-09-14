<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 17/08/2018
 * Time: 09:01
 */



class Member
{
    private $id;
    private  $firstName;
    private  $lastName;
    private $email;
    private $tel;
    private $role;
    private $password;
    private $isConfirmedEmail;
    private $user_token;
    private $pwd_token;
    private $pwd_token_expire;
    private $Cnx;

    public function __construct($id=null,$firstName=null, $lastName=null,$email=null, $tel=null,$role=null,$password=null,  $isConfirmedEmail=null, $user_token=null, $pwd_token=null,$pwd_token_expire=null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->tel = $tel;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->isConfirmedEmail = $isConfirmedEmail;
        $this->user_token = $user_token;
        $this->pwd_token = $pwd_token;
        $this->pwd_token_expire = $pwd_token_expire;
        $this->Cnx = ConnexionBD::getInstance();
    }

//FONCTIONS=====================================================================================================================
    public function findAllMember() {
    $req= $this->Cnx-> prepare(" SELECT firstName,lastName,email,tel FROM  members ");
    $response = $req->execute();
    if (!$response){
        return null;
    }
    $participants= $response->fetchAll(PDO::FETCH_OBJ);
    return $participants;
    }

    public function findMemberById($id) {
        $req= $this->Cnx-> prepare("SELECT * FROM members where mem_id = :id");
        $req->execute(
            array(
                'id' => $id
            )
        );
        return $req;

    }
    public function findMemberByEmail($email) {
        $req= $this->Cnx-> prepare("SELECT * FROM members where mem_email = :mail");
        $req->execute(
            array(
                'mail' => $email
            )
        );
        return $req;
    }

    public function addMember() {
        $req= $this->Cnx-> prepare(" INSERT INTO members (mem_firstName, mem_lastName, mem_email, mem_tel, mem_role, password, isConfirmedEmail, user_token , pwd_token, pwd_token_expire ) 
                              VALUES (:firstName, :lastName, :email, :tel, :role, :password, :confEmail, :uToken, :pToken, :pTokenEx)");
         $req->execute(
            array(
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'tel' => $this->tel,
                'email' => $this->email,
                'role' => $this->role,
                'password' => $this->password,
                'confEmail' => $this->isConfirmedEmail,
                'uToken' => $this->user_token ,
                'pToken' => $this->pwd_token ,
                'pTokenEx' => $this->pwd_token_expire
            )
        );
    }
    public function deleteMember($id) {
//        $reponse= $this->Cnx-> prepare(" DELETE FROM users WHERE id=?");
//        $reponse->execute([$id]);
        $req= $this->Cnx-> prepare("DELETE FROM members where mem_id = :id");
        $req->execute(
            array(
                'id' => $id
            )
        );
    }
    public function pwdToken($email,$token) {
        $req = $this->Cnx->prepare( "UPDATE members 
                                                      SET pwd_token_expire= DATE_ADD(NOW(),INTERVAL  5 MINUTE ), pwd_token= :token 
                                                      WHERE mem_email = :email");
        $req->execute(array(
            'token' => $token,
            'email' => $email
        ));
    }
    public function verifyUserTokenAndEmail($email,$token) {
        $req = $this->Cnx->prepare( "SELECT mem_id FROM members WHERE mem_email = :email AND user_token= :token AND isConfirmedEmail= :conf");
        $req ->execute(array(
            'email' => $email,
            'token' => $token,
            'conf' => 0
        ));
        return $req;
    }
    public function confirmationEmail($email) {
        $req = $this->Cnx->prepare( "UPDATE members SET isConfirmedEmail = 1, user_token= '' WHERE mem_email = :email");
        $req->execute(array('email' => $email));

    }
    public function updatePassword($hashedPwd,$email) {
        $req = $this->Cnx->prepare("UPDATE members SET password= :pwd, pwd_token= :pwd_token WHERE mem_email = :email");
        $req->execute(array(
            'pwd' => $hashedPwd,
            'pwd_token' => '',
            'email' => $email
        ));
    }
    public function resetPwdMember($email,$token) {
    $req = $this->Cnx->prepare( "SELECT mem_id FROM members WHERE mem_email = :email AND pwd_token= :token AND pwd_token <> '' AND pwd_token_expire > NOW()");
    $req ->execute(array(
        'email' => $email,
        'token' => $token,
    ));
    return $req;
    }
    public function updatePwdToken($email) {
    $req = $this->Cnx->prepare( "UPDATE members SET pwd_token = '' WHERE mem_email = :email");
    $req->execute(array('email' => $email));
    }

//    public function updateEvent($id) {
//        $reponse2= $this->Cnx-> prepare("UPDATE evenements SET evnmt_nom = :nom, evnmt_lieu = :lieu, evnmt_debut = :debut, evnmt_fin = :fin, evnmt_nbPlace= :nbPlace  WHERE evnmt_id = :id");
//        $reponse2->execute(
//            array(
//                'id' => $id,
//                'nom' => $this->nom,
//                'lieu' => $this->lieu,
//                'debut' => $this->date_debut,
//                'fin'=> $this->date_fin,
//                'nbPlace' => $this->nbPlace
//            )
//        );
//    }


//GETTERS AND SETTERS ------------------------------------------------------------------------------------------

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param null $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param null $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return null
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param null $tel
     */
    public function setTel($tel): void
    {
        $this->tel = $tel;
    }

    /**
     * @return null
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param null $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getisConfirmedEmail()
    {
        return $this->isConfirmedEmail;
    }

    /**
     * @param null $isConfirmedEmail
     */
    public function setIsConfirmedEmail($isConfirmedEmail): void
    {
        $this->isConfirmedEmail = $isConfirmedEmail;
    }

    /**
     * @return null
     */
    public function getUserToken()
    {
        return $this->user_token;
    }

    /**
     * @param null $user_token
     */
    public function setUserToken($user_token): void
    {
        $this->user_token = $user_token;
    }





    /**
     * @return null|PDO
     */
    public function getCnx(): ?PDO
    {
        return $this->Cnx;
    }

    /**
     * @param null|PDO $Cnx
     */
    public function setCnx(?PDO $Cnx): void
    {
        $this->Cnx = $Cnx;
    }
}