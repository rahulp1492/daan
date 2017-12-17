<?php if (!defined('BASEPATH')) {
    exit('No direct script access alloed');
}

class Index_model extends CI_Model
{
    public function getCards($tbl_name, $condition = false, $select = false, $order_by = false, $start = false, $limit = false)
    {
        if ($select != "") {$this->db->select($select);}

        if (count($condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}

        if (count($order_by) > 0 && $order_by != "") {
            foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}
        }

        if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

        $this->db->join('transaction', 'transaction.donation_id=' . $tbl_name . ".id", 'left');
        $this->db->join('donation_type', 'donation_type.id=' . $tbl_name . ".type");
        $this->db->join('users', 'users.id=' . $tbl_name . ".uid");

        $rst = $this->db->get_where($tbl_name, $condition);

        return $rst ? $rst->result_array() : array();
    }

    public function getDonars($tbl_name, $condition = false, $select = false, $order_by = false, $start = false, $limit = false)
    {
        if ($select != "") {$this->db->select($select);}

        if (count($condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}
        if (count($order_by) > 0 && $order_by != "") {
            foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}
        }
        if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

        $this->db->join('user_request', 'user_request.id=' . $tbl_name . ".request_id");
        $this->db->join('users', 'users.id = user_request.uid');
        $this->db->group_by('user_request.uid');
        $rst = $this->db->get_where($tbl_name, $condition);

        return $rst ? $rst->result_array() : array();
    }

    public function getDescCard($tbl_name, $condition = false, $select = false, $order_by = false, $start = false, $limit = false)
    {
        if ($select != "") {$this->db->select($select);}

        if (count($condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}
        if (count($order_by) > 0 && $order_by != "") {
            foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}
        }
        if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}

        $this->db->join('donation_type', 'donation_type.id=' . $tbl_name . ".type");
        $this->db->join('users', 'users.id=' . $tbl_name . ".uid");
        $rst = $this->db->get_where($tbl_name, $condition);

        return $rst ? $rst->result_array() : array();
    }

    public function getReqList($tbl_name, $condition = false, $select = false, $order_by = false, $start = false, $limit = false)
    {
        if ($select != "") {$this->db->select($select);}

        if (count($condition) > 0 && $condition != "") {$condition = $condition;} else { $condition = array();}
        if (count($order_by) > 0 && $order_by != "") {
            foreach ($order_by as $key => $val) {$this->db->order_by($key, $val);}
        }
        if ($limit != "" || $start != "") {$this->db->limit($limit, $start);}
        $this->db->join('donation', 'donation.id=' . $tbl_name . ".donationid");
        $this->db->join('users', 'users.id=' . $tbl_name . ".uid");
        $rst = $this->db->get_where($tbl_name, $condition);

        return $rst ? $rst->result_array() : array();
    }
}
