<?php

require ("models/table.class.php");

class Reservation
{
	private $id;
	private $id_user;
	private $id_service;
	private $date;
	private $couvert;

	public function __construct($data = null)
	{
		if ($data != null)
		{
			if (isset($data['id_user']))
				$id_user = $data['id_user'];
			else
				$id_user = 0;
			if ($this->setIdUser($id_user))
				throw new Exception("User Id error");	

			if (isset($data['id_service']))
				$id_service = $data['id_service'];
			else
				$id_service = 0;
			if ($this->setIdService($id_service))
				throw new Exception("Service Id error");			


			if (isset($data['date']))
				$date = $data['date'];
			else
				$date = '';	
							
			if ($this->setDate($date))
				throw new Exception("Date error");			

			if (isset($data['couvert']))
				$couvert = $data['couvert'];
			else
				$couvert = 0;
			
			if ($this->setCouvert($couvert))
				throw new Exception("Couvert error");

		}
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

/*	public function getTable()
	{
		$query = "SELECT * FROM reserver, table 
				  WHERE reserver.id_table = table.id 
				  AND id_reservation=" . $this->id;
		$res = mysqli_query($mysqli,$query);

		while ($table = mysqli_fetch_object($res)
		{

		}		
	}*/

	public function getCouvert()
	{
		return $this->couvert;
	}

	public function setDate($date)
	{
		return $this->date;		
	}

	public function setCouvert($couvert)
	{
		return $this->couvert;
	}


}

?>