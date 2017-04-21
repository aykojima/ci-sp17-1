<?php
class News_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
    
    public function get_news($slug = FALSE)
    {
            if ($slug === FALSE)
            {
                    $query = $this->db->get('sp17_news');
                    return $query->result_array();
            }

            $query = $this->db->get_where('sp17_news', array('slug' => $slug));
            return $query->row_array();
    }//end get_news class
    
    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('sp17_news', $data);
    }//edn set_news class
}//end News_model class