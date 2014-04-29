<?php

require ("models/reservation.class.php");

class ReservationManager
{

	public function couvert_restant($date,$id_service)
	{
		$query = "SELECT SUM(capacite)
				  FROM `table` 
				  WHERE id NOT IN (
				  	SELECT reserver.id_table
				  	FROM reserver,reservation
				  	WHERE reservation.id = reserver.id_reservation
				  	AND date = '" . $date . "' 
				  	AND id_service = " . $id_service . ")";

		$res = mysqli_query($mysqli,$query);
		$couvert_restant = mysqli_fetch_assoc($res);
		return $couvert_restant;
	}

	public function table_libre($date,$id_service)
	{
		$query = "SELECT id
				  FROM `table` 
				  WHERE id NOT IN (
				  	SELECT reserver.id_table
				  	FROM reserver,reservation
				  	WHERE reservation.id = reserver.id_reservation
				  	AND date = '" . $date . "' 
				  	AND id_service = " . $id_service . ")";

		$res = mysqli_query($mysqli,$query);
		$i=0;
		while ($table = mysqli_fetch_object($res,'Table')
		{
			$tab_table[$i] = $table;
			$i++;
		}
		return $tab_table;
	}

	public function insert_reservation($tab_table)
	{
		$tab_table = $this->table_libre();
		$couvert_reserver = 0;
		$i=0;

		while (isset($tab_table[$i]) || $couvert_reserver < $couvert)
		{
			$table = $tab_table[$i];
			$capacite = $table->getCapacite();

			$couvert_reserver += $capacite;
			$tab_table_reserver[$i] = $table->getId();
			$i++;
		}
		$query = "INSERT INTO reservation(id_user,
										  id_service,
										  `date`,
										  couvert) 
				VALUES (" . $id_user . ","
					  	  . $id_service . ",'"
					  	  . $date . "',"
					  	  . $couvert . ")";

		mysqli_query($mysqli,$query);

		$id_reservation = mysqli_insert_id($mysqli);
		if ($id_reservation < 0)
			$message = "Votre réservation a échoué. Veuillez réessayer.";
			return false;
		else
		{
			while (isset($tab_table_reserver[$i]))
			{
				$table = $tab_table_reserver[$i];
				$query = "INSERT INTO reserver(id_table,id_reservation) 
						  VALUES (" . $table->getId() . "," . $id_reservation . ")";

				mysqli_query($mysqli,$query);

				if (!empty(mysqli_error))
				{
					$message = "Votre réservation a échoué. Veuillez réessayer.";
					$query = "DELETE FROM reservation WHERE id = " . $id_reservation;

					mysqli_query($mysqli,$query);

					return false;
				}
				$i++;
			}

		}
		return true;
	}	

}
?>