<?php
class Table
{
	private $id;
	private $code;
	private $capacite;
}

	public function __construct($id,$code,$capacite)
	{
		$this->setId($id);
		$this->setCode($code);
		$this->setCapacite($capacite);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getCapacite()
	{
		return $this->capacite;
	}

	public function setCode($code)
	{
		if (ctype_alpha($code))
		{
			$this->code = $code;
			return true;
		}
		return false;
	}

	public function setCapacite($capacite)
	{
		$capacite = intval($capacite);
		if ($capacite > 2 && $capacite < 8)
		{
			$this->capacite = $capacite;
			return true;
		}
		return false;
	}

?>