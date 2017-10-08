<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_member_count($searchText = '')
    {
        $searchText = $this->db->escape_like_str($searchText);
        $sql =" SELECT COUNT(r.member_id) as connt_id FROM  tbm_member r WHERE 1=1 ";
        if (!empty($searchText)) {
            $sql = $sql." AND (r.member_id  LIKE '%".$searchText."%' OR  r.name  LIKE '%".$searchText."%')";
        }
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return  $row['connt_id'];
    }

    public function get_member($searchText = '', $page, $segment)
    {
        $searchText = $this->db->escape_like_str($searchText);
        $page = $this->db->escape_str($page);
        $segment = $this->db->escape_str($segment);

        $sql =" SELECT * FROM  tbm_member r
              WHERE 1=1 ";
        if (!empty($searchText)) {
            $sql = $sql." AND (r.member_id  LIKE '%".$searchText."%' OR  r.name  LIKE '%".$searchText."%')";
        }
        $sql = $sql." ORDER BY create_date DESC LIMIT ".$page.",".$segment." ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }


    public function get_member_info($id)
    {
        $id = $this->db->escape_str($id);
        $sql ="SELECT * ,
                  (SELECT COUNT(*) FROM tbh_project WHERE member_id = $id) count_project,
                  (SELECT COUNT(*) FROM tbh_portfolio WHERE member_id = $id) count_portfolio,
                  (SELECT COUNT(*) FROM tbh_selling WHERE member_id = $id) count_selling
              FROM tbm_member r
              WHERE r.member_id = $id ";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }
}
