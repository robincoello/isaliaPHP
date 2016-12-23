<?php
class Model extends ORM {
	protected $_model;

	function __construct() {

		$this->connect(DB_DSN,DB_USER,DB_PASSWORD);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model);
	}


	function all()
	{
		$table = $this->_table;
		return $this->db->$table();
	}

	function get($id)
	{
		$table = $this->_table;
		return isset($id) ? $this->db->$table("id = ?", (int)$id)->fetch() : null;
	}

	function firstBy($field, $value)
	{
		$table = $this->_table;
		return isset($field) && isset($value) ? $this->db->$table("$field = ?", $value)->fetch() : null;
	}

	function create($data)
	{
		$table = $this->_table;
		$data['created_at'] = new NotORM_Literal("NOW()");
		return $this->db->$table()->insert($data);
	}

	function update($id, $data)
	{
		$table = $this->_table;
		$item = $this->db->$table("id = ?", (int)$id)->fetch();
		$data['updated_at'] = new NotORM_Literal("NOW()");
		return ($item->update($data) == 1);
	}

	function destroy($id)
	{
		$table = $this->_table;
		$item = $this->db->$table("id = ?", (int)$id)->fetch();

		return $item->delete();
	}

	function __destruct() {
	}
}
