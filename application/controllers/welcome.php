<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	 {
	   parent::__construct();
     $this->load->model('user','',TRUE);
	   $this->load->model('baby','',TRUE);
     $this->load->model('feed','',TRUE);
     $this->load->model('milestone','',TRUE);
     $this->load->model('device','',TRUE);
	   $this->load->model('message','',TRUE);
	   if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url());
		}
	 }

	public function index()
    {
        $data = array();
        $data['total_parents'] = $this->user->get_total_users();
        $data['total_babies'] = $this->baby->get_total_babies();
        $data['latest_five_parents'] = $this->user->get_latest_five_parents();
        $data['latest_five_babies'] = $this->baby->get_latest_five_babies();

		    $content = $this->load->view('content.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
	}

    public function parents()
    {
        $data = array();
        $this->load->library("pagination");
        $total_rows = $this->user->get_total_users();

        $pagination_config = get_pagination_config('parents', $total_rows, $this->config->item('pagination_limit'), 3);

        $this->pagination->initialize($pagination_config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $users = $this->user->get_users($page);
        
        $data['users'] = $users;
        $content = $this->load->view('users.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    public function parent_detail($user_id)
    {
        $data = array();
        $data['detail'] = $this->user->get_user_detail($user_id);
        $content = $this->load->view('user_detail.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    public function feed_detail($feed_id)
    {
        $data = array();
        $data['detail'] = $this->feed->get_feed_detail($feed_id);
        $content = $this->load->view('feed_detail.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));

    }

    public function feeds()
    {
        $data = array();
        $this->load->library("pagination");
        $total_rows = $this->feed->get_total_feeds();

        $pagination_config = get_pagination_config('feeds', $total_rows, $this->config->item('pagination_limit'), 3);

        $this->pagination->initialize($pagination_config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $feeds = $this->feed->get_feeds($page);
        $data['feeds'] = $feeds;
        $content = $this->load->view('feed.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    public function babies()
    {
        $data = array();
        $this->load->library("pagination");
        $total_rows = $this->baby->get_total_babies();

        $pagination_config = get_pagination_config('babies', $total_rows, $this->config->item('pagination_limit'), 3);

        $this->pagination->initialize($pagination_config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $babies = $this->baby->get_babies($page);
        
        $data['babies'] = $babies;
        $content = $this->load->view('babies.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    public function baby_detail($baby_id)
    {
        $data = array();
        $data['detail'] = $this->baby->get_baby_detail($baby_id);
        $content = $this->load->view('baby_detail.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

	public function login()
	{
		$this->load->view("login");
	}

  public function logout()
  {
      $this->session->sess_destroy();
      redirect(base_url());
  }

  public function messages()
  {
      $data = array();
        $this->load->library("pagination");
        $total_rows = $this->message->get_total_messages();

        $pagination_config = get_pagination_config('messages', $total_rows, $this->config->item('pagination_limit'), 3);

        $this->pagination->initialize($pagination_config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

      $messages = $this->message->get_messages($page);
      
      $data['messages'] = $messages;
      $content = $this->load->view('message.php', $data ,true);
      $this->load->view('welcome_message', array('content' => $content));
  }

  public function send_message()
  {
        set_time_limit(0);
        $data = array();

        $message = "";
        $this->load->library('form_validation');

        $this->form_validation->set_rules('message_en', 'message', 'trim|required');
        $this->form_validation->set_rules('message_ar', 'message', 'trim|required');
        
        $data['error'] = "";
        if ($this->form_validation->run())
        {
           // Form was submitted and there were no errors
           $message_en = $this->input->post('message_en');
           $message_ar = $this->input->post('message_ar');
           

           $uniqid = $this->input->post('uniqid');
           //$service_id = (int) $this->input->post('service_id');

           $params       = array('date'=>date("Y-m-d"),'message'=>$message_en, 'message_ar'=>$message_ar);

          $message_id = $this->message->create_message($params);

          $devices = $this->device->get_devices();
          foreach($devices as $device)
          {
            if($device['type'] == 0)
            {
              $message = ($device["lang"] == 0) ? $message_en : $message_ar;
              send_notification_iphone($device['uid'], $message);
              
            } 
            else
            {
              $message = ($device["lang"] == 0) ? $message_en : $message_ar;
              send_notification_android($device['uid'], $message);
            } 
          }  

          redirect(base_url().'index.php/welcome/messages');




        }
        else
        {
            $is_submit = ($this->input->post('is_submit')) ? $this->input->post('is_submit') : 0;
            $uniqid = ($this->input->post('uniqid')) ? $this->input->post('uniqid') : uniqid();
        }



        $data['uniqid'] = $uniqid;
        $content = $this->load->view('create_message.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    
    // $message = "how are you";
    // $id = "APA91bFuM4vc4PfgYsffQRiHPfaBC5CqF7GPlm-1i8LYx8Fl-A3CDAyqkOtmiSMpESQDQ5qBqrxJiHxLehbS7IgMmtxVEZCaKaHUCOxMFCIHQJDuxChIbCJLCkJZOOA14cUgIaGE-q9j";
    // send_notification_android(array($id), array("message"=>$message));
    
    
  }

  function test()
  {
    $message = "how are you";
    $id = "APA91bFuM4vc4PfgYsffQRiHPfaBC5CqF7GPlm-1i8LYx8Fl-A3CDAyqkOtmiSMpESQDQ5qBqrxJiHxLehbS7IgMmtxVEZCaKaHUCOxMFCIHQJDuxChIbCJLCkJZOOA14cUgIaGE-q9j";
    send_notification_iphone(array($id), array("message"=>$message));
  }


    function edit_feed($feed_id)
    {
        $error = "";
        $message = "";
        //$admin = $this->user->get_admin();

        if($feed_id == "")
            redirect(base_url());
        else
            $feed_id = intval($feed_id);

        //debug($_REQUEST,1);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('from', 'from', 'trim|required');
        $this->form_validation->set_rules('to', 'to', 'trim|required');
        $this->form_validation->set_rules('feed', 'Feed', 'trim|required');
        $this->form_validation->set_rules('intro', 'Intro', 'trim|required');
        $this->form_validation->set_rules('feed_ar', 'Feed Arabic', 'trim|required');
        $this->form_validation->set_rules('intro_ar', 'Intro Arabic', 'trim|required');
        $this->form_validation->set_rules('milestone_id', 'Milestone', 'trim|required');

        if ($this->form_validation->run())
        {
           // Form was submitted and there were no errors
           $from        = $this->input->post('from');
           $to     = $this->input->post('to');
           $feed  = $this->input->post('feed', true);
           $intro    = $this->input->post('intro', true);
           $feed_ar    = $this->input->post('feed_ar', true);
           $intro_ar = $this->input->post('intro_ar', true);
           $milestone_id = $this->input->post('milestone_id');


           $uniqid = $this->input->post('uniqid');
           //$service_id = (int) $this->input->post('service_id');

           $params       = array('from'=>$from,
           'to'     =>$to,
           'feed'  =>$feed,
           'intro' =>$intro,
           'feed_ar'    =>$feed_ar,
           'intro_ar'    =>$intro_ar,
           'milestone_id'     =>$milestone_id

           );



           if($error == "")
           {
              $result = $this->feed->edit_feed($feed_id,$params);
              redirect(base_url().'index.php/welcome/feed_detail/'.$feed_id);
           }

        }
        else
        {
            $is_submit = ($this->input->post('is_submit')) ? $this->input->post('is_submit') : 0;
            $uniqid = ($this->input->post('uniqid')) ? $this->input->post('uniqid') : uniqid();
        }


        $data = array();


        $data['error'] = $error;
        $data['uniqid'] = $uniqid;
        $data['detail'] = $this->feed->get_feed_detail($feed_id);
        $data['milestones'] = $this->milestone->get_milestones();
        $content = $this->load->view('edit_feed.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    function create_feed()
    {
        $data = array();

        $message = "";
        //$admin = $this->user->get_admin();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('from', 'from', 'trim|required');
        $this->form_validation->set_rules('to', 'to', 'trim|required');
        $this->form_validation->set_rules('feed', 'Feed', 'trim|required');
        $this->form_validation->set_rules('intro', 'Intro', 'trim|required');
        $this->form_validation->set_rules('feed_ar', 'Feed Arabic', 'trim|required');
        $this->form_validation->set_rules('intro_ar', 'Intro Arabic', 'trim|required');
        $this->form_validation->set_rules('milestone_id', 'Milestone', 'trim|required');

        $data['error'] = "";
        if ($this->form_validation->run())
        {
           // Form was submitted and there were no errors
           $from        = $this->input->post('from');
           $to     = $this->input->post('to');
           $feed  = $this->input->post('feed', true);
           $intro    = $this->input->post('intro', true);
           $feed_ar    = $this->input->post('feed_ar', true);
           $intro_ar = $this->input->post('intro_ar', true);
           $milestone_id = $this->input->post('milestone_id');


           $uniqid = $this->input->post('uniqid');
           //$service_id = (int) $this->input->post('service_id');

           $params       = array('from'=>$from,
           'to'     =>$to,
           'feed'  =>$feed,
           'intro' =>$intro,
           'feed_ar'    =>$feed_ar,
           'intro_ar'    =>$intro_ar,
           'milestone_id'     =>$milestone_id

           );

          $feed_id = $this->feed->create_feed($params);

          redirect(base_url().'index.php/welcome/feed_detail/'.$feed_id);




        }
        else
        {
            $is_submit = ($this->input->post('is_submit')) ? $this->input->post('is_submit') : 0;
            $uniqid = ($this->input->post('uniqid')) ? $this->input->post('uniqid') : uniqid();
        }



        $data['uniqid'] = $uniqid;
        $data['milestones'] = $this->milestone->get_milestones();
        $content = $this->load->view('create_feed.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    function deactivate_feed($feed_id)
    {
        $this->feed->deactivate_feed($feed_id);
        redirect(base_url().'/index.php/welcome/feed_detail/'.$feed_id);
    }

    function activate_feed($feed_id)
    {
        $this->feed->activate_feed($feed_id);
        redirect(base_url().'/index.php/welcome/feed_detail/'.$feed_id);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */