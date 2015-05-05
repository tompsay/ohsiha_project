<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
        }

        public function index()
        {
				$this->load->helper('url');
		
                $data['news'] = $this->news_model->get_news();
				$data['title'] = 'News archive';

				$this->load->view('templates/header', $data);
				$this->load->view('news/index', $data);
				$this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);
				
				if (empty($data['news_item']))
				{
						show_404();
				}

				$data['title'] = $data['news_item']['title'];

				$this->load->view('templates/header', $data);
				$this->load->view('news/view', $data);
				$this->load->view('templates/footer');
		}
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Create a news item';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'text', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/create');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->news_model->set_news();
				$this->load->view('templates/header', $data);
				$this->load->view('news/success');
				$this->load->view('templates/footer');
			}
		}
		
		public function delete($id = NULL)
		{
				$this->load->helper('url');
		
				$this->news_model->delete_news($id);
				redirect('news/', 'refresh');
		}
		
		public function edit($id = NULL)
		{
			//echo 'id to be edited "' . $id . '"';
			//var_dump($id);
		
			// Helpers, libs
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');

			// Data given as parameter
			$data['title'] = 'Edit this news item';
			$editable_news = $this->news_model->get_edit($id);
			$data['news_title'] = $editable_news['title'];
			$data['news_text'] = $editable_news['text'];
			$data['id'] = $id;
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'text', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/edit', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$this->news_model->edit_news($id);
				$this->load->view('templates/header', $data);
				$this->load->view('news/success');
				$this->load->view('templates/footer');
			}
		}
		
		public function show_in_json($slug = NULL)
		{
			$data['news_item'] = $this->news_model->get_news($slug);
				
			if (empty($data['news_item']))
			{
				show_404();
			}

			$data['title'] = $data['news_item']['title'];
		
			$this->load->view('templates/header', $data);
			$this->load->view('news/json_view', $data);
			$this->load->view('templates/footer');
		}
		
		public function get_times_news()
		{
		
			echo file_get_contents('http://api.nytimes.com/svc/mostpopular/v2/mostviewed/all-sections/1.json?api-key=cb5c634bda4ef7d5d97fbd397289f88b:3A9:3A72015177');
				
			$this->load->view('templates/header', $data);
			$this->load->view('news/index', $data);
			$this->load->view('templates/footer');
		}
}