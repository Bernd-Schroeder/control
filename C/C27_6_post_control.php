<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.C27_6_post_control.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 08.11.2016, 22:35:17 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('C27_post_control.php');

/* user defined includes */
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA1-includes begin
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA1-includes end

/* user defined constants */
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA1-constants begin
// section 10-5-29-6--3681b32f:157d2f59108:-8000:0000000000001BA1-constants end

/**
 * Short description of class C27_6_post_control
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C27_6_post_control
    extends C27_post_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_requested_width()
    {
     return (int)3;
    }
    /**
     * Schule hat
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  csv_line
     */
    public function handle_csv_line($csv_line)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_list_csv.php');
     
     // Schule;Klasse1;email@Mitglied1
     // Suche die Gruppe mit dem Namen Klasse1, die eine Übergruppe mit dem
     
     // Suche das Mitglied mit der Email Adresse: email@Mitglied1
     // Verbinde das Mitglied mit der gefunden Gruppe mit dem Status (3)
     $team_id = NULL;
     $member_id = NULL;

     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.team_list_csv.php');

     // find the team ....
     $up_team_name = $csv_line->get_item( (int)0 );
     $team_name  = $csv_line->get_item( (int)1 );

     $team_list = new team_list_csv();
     $team_list->set_owner_id( $this->team->get_network_id() );
     $team_list->set_team_name( $up_team_name );
     $team = $team_list->get_sub_team($team_name);
     if ( $team != NULL )
     { $team_id = $team->get_id(); }

     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.service_new_member.php');

     // find the member ....
     $service = new service_new_member();
     $service->set_mail_address( $csv_line->get_item( (int)2 ) );
     if( $service->member_exist() )
     { $member_id = $service->get_new_id(); }

     // connect them as an admin request
     if(( $team_id > (int)0 ) AND ( $member_id > (int)0 ))
     {
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'basic/class.team_service_connection.php');
     require_once(__ROOT_CONTROL__.
     'email/class.team_invitation_mail.php');
     
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $team_id );
     $scon->ask_team_member_connection_csv();

     $mail = new team_invitation_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $member_id );
     $mail->set_author_team( $team_id );
     $mail->sent_mail();
     
     // wenn das team ein organisatorisches team 
     if( $team->get_type() == (int)2 )
     {
     $list = $team->get_subteam_list();
     $list_count = $list->get_item_count();

     for( $i=0; $i < $list_count; $i++ )
     {
     $sub_team = $list->get_item( $i );
     // wenn das Subteam ein pädagogische Team ist.
     if( $sub_team->get_type() == (int)3 )
     {
     $scon = new team_service_connection();
     $scon->set_member_id( $member_id );
     $scon->set_team_id( $sub_team->get_id() );
     $scon->ask_team_member_connection_csv();

     $mail = new team_invitation_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $member_id );
     $mail->set_author_team( $sub_team->get_id() );
     $mail->sent_mail();
     } // end subteam = 3  
     } // for all subteams
     } // if this team is an organisatoric team
     }
    }
}?>