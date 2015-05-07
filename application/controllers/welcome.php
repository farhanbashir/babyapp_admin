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
	   $this->load->model('event','',TRUE);
	   if(!$this->session->userdata('logged_in'))
		{
			redirect(base_url());
		}
	 }

	public function index()
    {
        $data = array();
        $data['total_events'] = $this->event->get_total_events();
        $data['total_users'] = $this->user->get_total_users();
        $data['latest_five_events'] = $this->event->get_latest_five_events();
        $data['latest_five_users'] = $this->user->get_latest_five_users();

		$content = $this->load->view('content.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
	}

    public function user()
    {
        $users = $this->user->get_users();
        $data = array();
        $data['users'] = $users;
        $content = $this->load->view('users.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    public function user_detail($user_id)
    {
        $data = array();
        $data['detail'] = $this->user->get_user_detail($user_id);
        $content = $this->load->view('user_detail.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    public function event_detail($event_id)
    {
        $data = array();
        $data['detail'] = $this->event->get_event_detail($event_id);
        $content = $this->load->view('event_detail.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));

    }

    public function event_users($event_id)
    {
        $data = array();
        $data['event_users'] = $this->event->get_event_users($event_id);

        $content = $this->load->view('event_users.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    public function event()
    {
        $events = $this->event->get_events();
        $data = array();
        $data['events'] = $events;
        $content = $this->load->view('event.php', $data ,true);
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

    function deactivate_event($event_id)
    {
        $this->event->deactivate_event($event_id);
        redirect(base_url());
    }

    function activate_event($event_id)
    {
        $this->event->activate_event($event_id);
        redirect(base_url());
    }

    function deactivate_user($user_id)
    {
        $this->user->deactivate_user($user_id);
        redirect(base_url());
    }

    function activate_user($user_id)
    {
        $this->user->activate_user($user_id);
        redirect(base_url());
    }

    function edit_user($user_id)
    {
        $message = "";
        if($user_id == "")
            redirect(base_url());
        else
            $user_id = intval($user_id);

        //debug($_REQUEST,1);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('office_no', 'Office Phone', 'trim|required');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Company', 'trim|required');
        $this->form_validation->set_rules('is_active', 'Status', 'trim|required');

        if ($this->form_validation->run())
        {
           // Form was submitted and there were no errors
           $first_name   = $this->input->post('first_name');
           $last_name    = $this->input->post('last_name');
           $phone        = $this->input->post('phone');
           $office_no    = $this->input->post('office_no');
           $is_active    = $this->input->post('is_active');
           $designation  = $this->input->post('designation');
           $company_name = $this->input->post('company_name');


           $uniqid = $this->input->post('uniqid');
           //$user_id = (int) $this->input->post('user_id');

           $params        = array('first_name'=>$first_name,
           'last_name'    =>$last_name,
           'phone'        =>$phone,
           'office_no'    =>$office_no,
           'designation'  =>$designation,
           'company_name' =>$company_name,
           'is_active'    =>$is_active
           );


           $result = $this->user->edit_user($user_id,$params);



           redirect(base_url().'index.php/welcome/user_detail/'.$user_id);
        }
        else
        {
            $is_submit = ($this->input->post('is_submit')) ? $this->input->post('is_submit') : 0;
            $uniqid = ($this->input->post('uniqid')) ? $this->input->post('uniqid') : uniqid();
        }


        $data = array();



        $data['uniqid'] = $uniqid;
        $data['detail'] = $this->user->get_user_detail($user_id);
        $content = $this->load->view('edit_user.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    function edit_event($event_id)
    {
        $error = "";
        $upload_path = './assets/uploads/';
        $config['upload_path'] = $upload_path;//'./uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->load->library('upload',$config);
        $message = "";
        $admin = $this->user->get_admin();
        $this->load->library('form_validation');

        if($event_id == "")
            redirect(base_url());
        else
            $event_id = intval($event_id);

        //debug($_REQUEST,1);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('is_active', 'Status', 'trim|required');

        if ($this->form_validation->run())
        {
           // Form was submitted and there were no errors
           $name        = $this->input->post('name');
           $address     = $this->input->post('address');
           $start_date  = $this->input->post('start_date');
           $end_date    = $this->input->post('end_date');
           $is_active    = $this->input->post('is_active');
           $description = $this->input->post('description', true);
           $latitude = $this->input->post('latitude');
           $longitude = $this->input->post('longitude');


           $uniqid = $this->input->post('uniqid');
           $service_id = (int) $this->input->post('service_id');

           $params       = array('name'=>$name,
           'address'     =>$address,
           'start_date'  =>$start_date,
           'description' =>$description,
           'end_date'    =>$end_date,
           'is_active'    =>$is_active,
           'latitude'     =>$latitude,
           'longitude'     =>$longitude,
           );

          if(isset($_FILES['image'])) 
          {
              if ( ! $this->upload->do_upload('image'))
              {
                $error = $this->upload->display_errors();
              }
              else
              {
                $data = $this->upload->data();

                $image = 'assets/uploads/'.$data['raw_name'].$data['file_ext'];
                $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';

                
                $path = substr($_SERVER['REQUEST_URI'],0,stripos($_SERVER['REQUEST_URI'], "index.php"));
                $image = $protocol.$_SERVER['SERVER_NAME'].$path.$image;    
                $params['image'] = $image;
              }  
          }  
          

           if($error == "")
           {
              $result = $this->event->edit_event($event_id,$params);  
              redirect(base_url().'index.php/welcome/event_detail/'.$event_id);
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
        $data['detail'] = $this->event->get_event_detail($event_id);
        $content = $this->load->view('edit_event.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

    function address()
    {

  debug($_SERVER,1);
    }

    function create_event()
    {
        $data = array();

        //$upload_path = $_SERVER['DOCUMENT_ROOT'].'/wasl/images/';
        $upload_path = './assets/uploads/';
        $config['upload_path'] = $upload_path;//'./uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->load->library('upload',$config);
        $message = "";
        $admin = $this->user->get_admin();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('is_active', 'Status', 'trim|required');

        //$lat_long = get_lat_long($this->input->post('address'));
        $data['error'] = "";
        if ($this->form_validation->run())
        {
           // Form was submitted and there were no errors
           $name        = $this->input->post('name');
           $address     = $this->input->post('address');
           $start_date  = $this->input->post('start_date');
           $end_date    = $this->input->post('end_date');
           $is_active    = $this->input->post('is_active');
           $description = $this->input->post('description', true);
           $latitude = $this->input->post('latitude');
           $longitude = $this->input->post('longitude');
           //$latitude    = $lat_long['lat'];
           //$longitude    = $lat_long['lng'];
           $image = "";

           $uniqid = $this->input->post('uniqid');
           $service_id = (int) $this->input->post('service_id');

           if ( ! $this->upload->do_upload('image'))
            {
              $data['error'] = $this->upload->display_errors();
            }
            else
            {
              $data = $this->upload->data();

              $image = 'assets/uploads/'.$data['raw_name'].$data['file_ext'];
              $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';

              
              $path = substr($_SERVER['REQUEST_URI'],0,stripos($_SERVER['REQUEST_URI'], "index.php"));
              $image = $protocol.$_SERVER['SERVER_NAME'].$path.$image;    
              
            }

           $params       = array('name'=>$name,
           'address'     =>$address,
           'start_date'  =>$start_date,
           'description' =>$description,
           'end_date'    =>$end_date,
           'user_id'     =>$admin['id'],
           'latitude'     =>$latitude,
           'longitude'     =>$longitude,
           'created_date' => date('Y-m-d H:i:s'),
           'image' => $image,
           'is_active'    =>$is_active
           );

           if($image != "")
           {
              $event_id = $this->event->create_event($params);

              redirect(base_url().'index.php/welcome/event_detail/'.$event_id);  
           } 
           
        }
        else
        {
            $is_submit = ($this->input->post('is_submit')) ? $this->input->post('is_submit') : 0;
            $uniqid = ($this->input->post('uniqid')) ? $this->input->post('uniqid') : uniqid();
        }


        
        $data['uniqid'] = $uniqid;
        //$data['detail'] = $this->event->get_event_detail($event_id);
        $content = $this->load->view('create_event.php', $data ,true);
        $this->load->view('welcome_message', array('content' => $content));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */