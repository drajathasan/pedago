<?php

class table_maker
{
	public $table;
	public $head_data = array();
	public $body_data = array();
	
	public function startTable()
	{
		$this->table .= '<table width="100%" class="table table-striped">';
	}

	public function setHead()
	{
		// Set attribute
		$this->table .= '<thead>';
		$this->table .= '<tr>';
		// Loop for data
		foreach ($this->head_data as $value) {
			$this->table .= '<th><b>'.strtoupper($value).'</b></th>';
		}
		$this->table .= '</tr>';
		$this->table .= '</thead>';
	}

	public function setBody()
	{
		// Set attribute
		$this->table .= '<tbody>';
		$this->table .= '<tr>';
		// Loop for data
		foreach ($this->body_data as $value) {
			$this->table .= '<td>'.strtoupper($value).'</td>';
		}
		$this->table .= '</tr>';
		$this->table .= '</tbody>';
	}

	public function closeTable()
	{
		$this->table .= '</table>';
	}

	public function printOut()
	{
		$this->startTable();
		$this->setHead();
		$this->setBody();
		$this->closeTable();
	}
}