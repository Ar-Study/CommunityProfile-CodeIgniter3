<?php
class Madmin extends CI_Model
{
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function get_published_count($table)
    {
        $query = $this->db->get($table);
        return $query->num_rows();
    }
    public function get_published($limit = null, $offset = null, $table)
    {
        if (!$limit && !$offset) {
            $query = $this->db->get($table);
        } else {
            $query = $this->db->get($table, $limit, $offset);
        }
        return $query->result();
    }
}
