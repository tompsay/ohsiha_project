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
					$query = $this->db->get('news');
					return $query->result_array();
			}

			$query = $this->db->get_where('news', array('slug' => $slug));
			return $query->row_array();
		}
		
		public function get_edit($id)
		{
			$query = $this->db->get_where('news', array('id' => $id));
			return $query->row_array();
		}
		
		public function set_news()
		{
			$this->load->helper('url');

			$slug = url_title($this->input->post('title'), 'dash', TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
			);

			return $this->db->insert('news', $data);
		}
		
		public function set_news_from_array($news_array)
		{
			// array from New York Times API has 'title' and 'abstract'
			
			foreach ($news_array as $news) 
			{			
				$slug = url_title($news['title', 'dash', TRUE);
			
				$data = array(
					'title' => $news['title'],
					'slug' => $slug,
					'text' => $news['abstract']
				);
				
				$this->db->insert('news', $data);
			}
			return;
		}
		
		public function delete_news($id)
		{
			return $this->db->delete('news', array('id' => $id));
		}
		
		public function delete_all_news()
		{
			return $this->db->empty_table('news'); // Produces: DELETE FROM mytable
		}
		
		public function edit_news($id)
		{
			$this->load->helper('url');
			
			$slug = url_title($this->input->post('title'), 'dash', TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
			);

			// Update the db
			return $this->db->update('news', $data, array('id' => $id));
		}
}