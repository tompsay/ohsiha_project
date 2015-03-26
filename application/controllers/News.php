<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
        }

        public function index()
        {
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
		
		public function edit($id = NULL) //parameter???
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Edit this news item';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'text', 'required');
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/edit'); //parameter???
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
}