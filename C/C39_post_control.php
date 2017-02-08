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
// section 10-30--8-119--7722389c:154143a06a9:-8000:0000000000001B5A-includes begin
// section 10-30--8-119--7722389c:154143a06a9:-8000:0000000000001B5A-includes end

/* user defined constants */
// section 10-30--8-119--7722389c:154143a06a9:-8000:0000000000001B5A-constants begin
// section 10-30--8-119--7722389c:154143a06a9:-8000:0000000000001B5A-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C39_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if (
     empty($_POST["start_week"]) OR
     empty($_POST["start_year"]) OR
     empty($_POST["end_week"]) OR
     empty($_POST["end_year"]) OR
     empty($_POST["day_number"]) OR
     empty($_POST["time_number"]) )
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
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.control_time_table_item.php');
     
     $control_item = new control_time_table_item();
     $control_item->set_team_id( $_SESSION['watched_id'] );
     $control_item->set_start_week( $_POST["start_week"] );
     $control_item->set_start_year( $_POST["start_year"] );
     $control_item->set_end_week( $_POST["end_week"] );
     $control_item->set_end_year( $_POST["end_year"] );
     $control_item->set_day_number( $_POST["day_number"] );
     $control_item->set_time_number( $_POST["time_number"] );
     $control_item->set_generated( (int)0 );
     $control_item->insert();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     */
    public function delete($id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.control_time_table_item.php');
     require_once(__ROOT_DATA__.'class.time_table_item_list.php');
     
     $new_time_list = new time_table_item_list();
     $new_time_list->set_owner_id( $id );
     $new_time_list->load();
     $new_time_list->delete_list();

     $control_item = new control_time_table_item();
     $control_item->set_id( $id );
     $control_item->delete();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id
     */
    public function added_func($id)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.control_time_table_item.php');
     
     $control_item = new control_time_table_item();
     $control_item->set_id( $id );
     $control_item->load();
     if( $this->generate_time_table( $control_item ) )
     {
     $control_item->set_generated( (int)1 );
     $control_item->update();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  control_item
     */
    public function generate_time_table($control_item)
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.time_table_item.php');
     
     $success = TRUE;
     date_default_timezone_set('Europe/Berlin');
     
     $start_datetime = new DateTime();
     $start_datetime->setISODate(
     $control_item->get_start_year(),
     $control_item->get_start_week(),
     $control_item->get_day_number() );
     
     $end_datetime = new DateTime();
     $end_datetime->setISODate(
     $control_item->get_end_year(),
     $control_item->get_end_week(),
     $control_item->get_day_number() );
     $end_datetime = $end_datetime->modify( '+7 day' );
     
     $interval = new DateInterval('P1W');
     $daterange = new DatePeriod($start_datetime, $interval ,$end_datetime);
     
     foreach($daterange as $date)
     {
     $table_item = new time_table_item();
     $table_item->set_control_time_table_item_id( $control_item->get_id() );
     $table_item->set_team_id( $control_item->get_team_id() );
     $table_item->set_room_id( $control_item->get_room_id() );
     $table_item->set_year( $date->format("Y")  );
     $table_item->set_month( $date->format("m")  );
     $table_item->set_day( $date->format("d")  );
     $table_item->set_item_date( $date->format('Y-m-d'));
     $table_item->set_time_number( $control_item->get_time_number() );
     $table_item->insert();
     }
     return $success;
    }
}?>