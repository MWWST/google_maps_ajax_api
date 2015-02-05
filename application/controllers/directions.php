<?php class Directions extends CI_Controller {


	public function get(){
	$results = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($this->input->post('origin'))."&destination=".urlencode($this->input->post('destination'))."&sensor=false&key=AIzaSyBAQZ7y0Y6K-ozv6uTMXqgfyCpMdVaYXYM");

		$this->output->set_content_type('application/json')->set_output($results);
		
	// $this->load->view('maps',$google =array('results',$results));	
		// echo $results;
	}
}

?>