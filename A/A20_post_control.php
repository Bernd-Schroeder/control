<?php

error_reporting(E_ALL);

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_control
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('../basic/class.basic_control.php');

/* user defined includes */
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:00000000000041E9-includes begin
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:00000000000041E9-includes end

/* user defined constants */
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:00000000000041E9-constants begin
// section 10-5-26--54--5a4e524d:1536ccf042c:-8000:00000000000041E9-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class A20_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute one_profile
     *
     * @access public
     * @var Integer
     */
    public $one_profile = null;

    /**
     * Short description of attribute two_profile
     *
     * @access public
     * @var Integer
     */
    public $two_profile = null;

    /**
     * Short description of attribute language
     *
     * @access public
     * @var String
     */
    public $language = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = FALSE;
     
     if( $this->is_accepted() )
     {
     // set the correct language
     if (isset($_GET["language"]))
     { $this->language = $_GET["language"]; }
     else
     { $this->language = 'en'; }
     
     if( $this->one_profile() )
     {
     // if only one profile is selected
     $completed = TRUE;
     $this->one_profile = TRUE;
     }
     elseif( $this->two_profile() )
     {
     // if two profiles are selected
     $completed = TRUE;
     if( $_POST["rec_mail"] == $_POST["adm_mail"] )
     { $this->one_profile = TRUE; }
     else
     { $this->two_profile = TRUE; }
     }
     else
     { ; } // Eingaben fehlen
     }
     else
     { ; } // AGB oder Nutzungsbedingungen nicht akzeptiert
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_accepted()
    {
     $accepted = FALSE;
     $sum = (int)0;
     
     if( isset( $_POST["accept"] ) )
     {
     foreach( $_POST['accept'] as $accept_id )
     { $sum += $accept_id; }
     
     if ( $sum == (int)3 )
     { $accepted = TRUE; } 
     
     }
     return $accepted;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function one_profile()
    {
     $completed = TRUE;
     if
     ( empty($_POST["school_name"] ) OR
     empty($_POST["rec_forname"]) OR
     empty($_POST["rec_surname"]) OR
     empty($_POST["rec_mail"]) OR
     is_null($_POST['rec_adm']))
     { $completed = FALSE; }
     //return $completed;
          return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function two_profile()
    {
     $completed = TRUE;
     if
     ( empty($_POST["school_name"] ) OR
     empty($_POST["rec_forname"]) OR
     empty($_POST["rec_surname"]) OR
     empty($_POST["rec_mail"]) OR
     empty($_POST["adm_forname"]) OR
     empty($_POST["adm_surname"]) OR
     empty($_POST["adm_mail"]) )
     { $completed = FALSE; }
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.'email/class.school_reg_headmaster_mail.php');
     
//     if ( $this->one_profile )
     if ( TRUE )
     // one profile
     {
/*     echo "</br>" . "</br>";
     echo "Schulname: " . $_POST["school_name"] . "</br>";
     echo "Schulgroesse: " . $_POST["schoolsize"] . "</br>";
     echo "school_street_name: " . $_POST["school_street_name"] . "</br>";
     echo "school_house_number: " . $_POST["school_house_number"] . "</br>";
     echo "school_plz: " . $_POST["school_plz"] . "</br>";
     echo "school_city: " . $_POST["school_city"] . "</br>";
     echo "country_id: " . $_POST["country_id"] . "</br>";
     echo "</br>" . "</br>";
     echo "rec_salution: " . $_POST["rec_salution"] . "</br>";
     echo "rec_forname: " . $_POST["rec_forname"] . "</br>";
     echo "rec_surname: " . $_POST["rec_surname"] . "</br>";
     echo "rec_mail: " . $_POST["rec_mail"] . "</br>";
     echo "rec_phone: " . $_POST["rec_phone"] . "</br>";
*/     
     //$receiver_id = $this->new_member->get_id();
     
     $file = $this->generate_headmaster_document();
     
     $receiver_id = (int)22;     
     $mail = new school_reg_headmaster_mail();
     $mail->set_author( null );
     $mail->set_receiver_id( $receiver_id );
     // $mail->set_password( $this->new_password );
     $mail->set_password( "Bernd" );  
     $mail->add_attachment( $file );
     $mail->sent_mail();
     }
     elseif ( $this->two_profile )
     // two profile
     {
     echo "</br>" . "</br>";
     echo "Schulname: " . $_POST["school_name"] . "</br>";
     echo "Schulgroesse: " . $_POST["schoolsize"] . "</br>";
     echo "school_street_name: " . $_POST["school_street_name"] . "</br>";
     echo "school_house_number: " . $_POST["school_house_number"] . "</br>";
     echo "school_plz: " . $_POST["school_plz"] . "</br>";
     echo "school_city: " . $_POST["school_city"] . "</br>";
     echo "country_id: " . $_POST["country_id"] . "</br>";
     echo "</br>" . "</br>";
     echo "rec_salution: " . $_POST["rec_salution"] . "</br>";
     echo "rec_forname: " . $_POST["rec_forname"] . "</br>";
     echo "rec_surname: " . $_POST["rec_surname"] . "</br>";
     echo "rec_mail: " . $_POST["rec_mail"] . "</br>";
     echo "rec_phone: " . $_POST["rec_phone"] . "</br>";
     echo "</br>" . "</br>";
     echo "adm_salution: " . $_POST["adm_salution"] . "</br>";
     echo "adm_forname: " . $_POST["adm_forname"] . "</br>";
     echo "adm_surname: " . $_POST["adm_surname"] . "</br>";
     echo "adm_mail: " . $_POST["adm_mail"] . "</br>";
     echo "adm_phone: " . $_POST["adm_phone"] . "</br>";
     }
     else
     // something wrong
     {
     echo "</br>" . "</br>";
     echo "something is wrong" . "</br>";
     }
     return TRUE;
    }
    
    public function generate_headmaster_document()           
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.document.php');
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.
     'file/class.headmaster_mail_pdf.php');
     
     $owner_group = "m";
     $owner_id    = $_SESSION['watch_id'];
     $uploader_id = (int)160;
     $file_name   = 'Alice im Wunderland';
     $file_size   = (int)11111;
     $file_error  = NULL;
     $description = 'blablabla';
     $file_type   = 'pdf';

     $document = new document();
     $document->set_owner_group( $owner_group );
     $document->set_owner_id( $owner_id );
     $document->set_uploader_id( $uploader_id );
     $document->set_header( $file_name );
     $document->set_size( $file_size );
     $document->set_file_error( $file_error );
     $document->set_type( $file_type );
     $document->set_text( $description );
     
     $pdf = new headmaster_mail_pdf();
     $pdf->generate();
     $name = $document->save_document( $pdf );
     return $name;
    }
}?>