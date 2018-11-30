<?php

Class Items_model extends CI_Model {

	
	// Read data from database to show data in admin page
	public function get_items_list($array = null) {
		$draw = intval($this->input->get("draw"));
      	$start = intval($this->input->get("start"));
      	$length = intval($this->input->get("length"));

		$this->db->select('*');
		$this->db->from('items');
		//$this->db->where($condition);
		//$this->db->limit(1);
		$query = $this->db->get();


		$data = [];

		if ($query->num_rows() > 0) {
			foreach($query->result() as $r) {
				$data[] = array(
				    $r->id,
				    $r->title,
				    $r->description,
				    "<a href='".BASE_URL.'items/edit_item/'.$r->id."'>Edit</a> <a href='#' id='delete' onclick='delete(".$r->id.")''>Delete</a>"
				);
			}


			$result = array(
			   "draw" => $draw,
			     "recordsTotal" => $query->num_rows(),
			     "recordsFiltered" => $query->num_rows(),
			     "data" => $data
			);
			
			echo json_encode($result);
			exit();
		} else {
			return false;
		}
	}

	public function insertitem($item){
		return $this->db->insert('items', $item);
	}

	public function getItem($id){
		$query = $this->db->get_where('items',array('id'=>$id));
		return $query->row_array();
	}

	public function updateitem($item, $id){
		$this->db->where('items.id', $id);
		return $this->db->update('items', $item);
	}

	public function deleteitem($id){
		$this->db->where('items.id', $id);
		return $this->db->delete('items');
	}
}

?>