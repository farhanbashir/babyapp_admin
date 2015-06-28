<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

	function __construct()
	 {
	   parent::__construct();
	   // this controller can only be called from the command line
       //if (!$this->input->is_cli_request()) show_error('Direct access is not allowed');
	 }

	public function sendNotification()
	{
		set_time_limit(0);

		$this->load->model('baby','',TRUE);
		$this->load->model('feed','',TRUE);
		$babies = $this->baby->get_babies();

		foreach($babies as $baby)
		{
			//calculate date
			$interval = date_diff(date_create(), date_create($baby['dob']));

			//if month change today
			if($interval->d == 0)
			{
				$total_months = ($interval->y *12) + $interval->m;
				
				//get feed
				$feed = $this->feed->get_feed_for_month($total_months);
				
				if(is_array($feed))
				{
					debug($feed['feed'],1);
					//send notification
					if($baby['type'] == 0)
		            {
		              send_notification_iphone($baby['uid'], $feed['feed']);
		              
		            } 
		            else
		            {
		              send_notification_android($baby['uid'], $feed['feed']);
		            }	
				}	
				
			}

		}


	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */