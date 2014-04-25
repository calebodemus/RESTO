<?php
class Reservation
{
	private $id;
	private $id_user;
	private $id_service;
	private $date;
	private $couvert;

	public function __construct($id,$id_user,$id_service,$date,$couvert)
	{
		$this->setId($id);
		$this->setIdUser($id_user);
		$this->setIdService($id_service);
		$this->setDate($date);
		$this->setCouvert($couvert);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getIdUser()
	{
		return $this->id_user;
	}

	public function getIdService()
	{
		return $this->id_service;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getCouvert()
	{
		return $this->couvert;
	}

	public function setDate($date)
	{
		
	}
}

?>