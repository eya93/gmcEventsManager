<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 17/08/2018
 * Time: 09:01
 */


class Events
{
    private $name;
    private $location;
    private $start_date;
    private $end_date;
    private $nbPlace;
    private $nbPlaceRes;
    private $id;
    private $Cnx;

    public function __construct($id=null,$name=null, $start_date=null, $end_date=null, $location=null, $nbPlace=null, $nbPlaceRes=null)
    {
        $this->name = $name;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->location = $location;
        $this->nbPlace = $nbPlace;
        $this->nbPlaceRes = $nbPlaceRes;
        $this->id = $id;
        $this->Cnx = ConnexionBD::getInstance();
    }

//FONCTIONS=====================================================================================================================
    public function findAllEvents() {
        //$req = $this->Cnx-> prepare(" SELECT * FROM events  ");
        $req = $this->Cnx-> prepare("SELECT event_id, event_name, DATE_FORMAT(event_start,'le %d/%m/%Y à %Hh%imin') AS date_start, DATE_FORMAT(event_end, 'le %d/%m/%Y à %Hh%imin') AS date_end, event_location, event_nbPlace, event_nbPlaceRes FROM events ORDER BY date_start DESC ");
//        $req->execute();
//        if (!$req){
//            return null;
//        }
       return $req;
    }
    public function findEvent($id) {
        $req= $this->Cnx-> prepare("SELECT * FROM events where event_id = :id");
        $req->execute(
            array(
                'id' => $id
            )
        );
        return $req;
    }

    public function addEvent() : void {
        $req = $this->Cnx-> prepare(" INSERT INTO events (event_name, event_location, event_start, event_end, event_nbPlace, event_nbPlaceRes) VALUES (:name_event, :location, :date_start, :date_end, :nbPlace, :res)");
        $req->execute(
            array(
                'name_event' => $this->name,
                'location' => $this->location,
                'date_start' => $this->start_date,
                'date_end'=> $this->end_date,
                'nbPlace' => $this->nbPlace,
                'res' => 0
            )
        );
    }
    public function deleteEvent($id) {
        $req= $this->Cnx-> prepare("DELETE FROM events where event_id = :id");
        $req->execute(
            array(
                'id' => $id
            )
        );
    }

    public function updateEvent($id)
    {
        $req = $this->Cnx->prepare("UPDATE events SET event_name = :name_event, event_location = :location, event_start = :date_start, event_end = :date_end, event_nbPlace= :nbPlace  WHERE event_id = :id");
        $req->execute(
            array(
                'id' => $id,
                'name_event' => $this->name,
                'location' => $this->location,
                'date_start' => $this->start_date,
                'date_end' => $this->end_date,
                'nbPlace' => $this->nbPlace
            )
        );
    }
    //GETTERS AND SETTERS ------------------------------------------------------------------------------------------

}