<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 03/09/2018
 * Time: 10:39
 */
require_once '../autoload.php';
class ParticipantList
{
    private $participantId;
    private  $eventId;
    private  $validation;
    private $Cnx;
    /**
     * ParticipantList constructor.
     * @param $participantId
     * @param $eventId
     * @param $validation
     */
    public function __construct($participantId=null, $eventId=null, $validation=null)
    {
        $this->participantId = $participantId;
        $this->eventId = $eventId;
        $this->validation = $validation;
        $this->Cnx = ConnexionBD::getInstance();
    }
    //FONCTIONS=====================================================================================================================
    public function validateParticipant($part_id,$event_id)
    {
        $req = $this->Cnx->prepare("UPDATE `participantslist` SET `validation` = :val WHERE event_id= :event AND participant_id= :part");
        $req->execute(array(
            'event' => $event_id,
            'part' => $part_id,
            'val' => 1
        ));
    }
    public function findParticipant($part_id,$event_id)
    {
    $req= $this->Cnx-> prepare(" SELECT * FROM participantslist WHERE event_id= :event AND participant_id= :part");
    $req->execute(array(
    'event' => $event_id,
    'part' => $part_id,
    ));
    return $req;
    }
    public function newParticipant($part_id,$event_id)
    {
        $req= $this->Cnx-> prepare(" INSERT INTO participantslist (participant_id, event_id, validation) VALUES (:part, :event,:val)");
        $req->execute(array(
            'event' => $event_id,
            'part' => $part_id,
            'val' => 0
        ));
    }
    public function findParticipantsOfEvent($event_id)
    {
        $req = $this->Cnx->prepare(" SELECT * FROM participantslist WHERE validation = :val  AND event_id= :event ");
        $req->execute(array(
            'event' => $event_id,
            'val' => 1
        ));
        return $req;
    }
    public function demandsList()
    {
        $req= $this->Cnx-> prepare(" SELECT * FROM participantslist WHERE validation = 0  ");
        $req->execute();
        return $req;
    }

}