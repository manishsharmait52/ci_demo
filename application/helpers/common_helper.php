<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if( !function_exists('pr'))
    {
        function pr($array, $exit = false)
        {
            echo '<pre>'; print_r($array); echo '</pre>';
            if($exit){ exit; }
        }
    }


    if( !function_exists('check_login'))
    {
        function check_login()
        {   
            $ci =& get_instance();
            if (!isset($ci->session->userdata['logged_in'])) {
                header("location: ".base_url()."userauthentication/");
                return;
            }
        }    
    }


    if (!function_exists('sendEmail'))
    {  
        /*Function:
        * Name: sendEmail()
        * Parameters: 1) array of receiver user 2) subject of email, 3) Message of email
        * Response: - return true on sucess OR false on failed
        * Description: return true on sucess OR false on failed
        */    
        function sendEmail($to_user = NULL, $to_subject = NULL, $to_message = NULL, $attachment = NULL, $from = NULL, $newFileName = NULL, $forgot_link = NULL)
        {
            $CI =& get_instance();
            $CI->load->library('email');
            $CI->email->clear(TRUE);             
            $CI->email->from($from);
            $CI->email->to( $to_user ); //array of receiver user
            $CI->email->subject( $to_subject );
            
            if($attachment != NULL){
                if($newFileName != NULL){
                    $CI->email->attach($attachment, 'attachment', $newFileName);    
                }else{
                    $CI->email->attach($attachment);    
                }
            }

            if($forgot_link != NULL){
                $message = ForgotLinkSet($forgot_link);
            }else{
                $message = '<tr><td class="innerpadding" style="padding-bottom:0;">'.$to_message.'</td></tr>';
            }

            
            $value  = $message;

            $CI->email->message( $value ); 
            $CI->email->set_header('Date', date('m-d-y'));
            if($CI->email->send()){ 
                return true; 
            }else{ 
                echo $CI->email->print_debugger();
                return false; 
            }  
        }
    }
?>