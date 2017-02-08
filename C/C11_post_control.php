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
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AAE-includes begin
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AAE-includes end

/* user defined constants */
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AAE-constants begin
// section 10-5-22-86-6cc1deab:1537fe4314d:-8000:0000000000001AAE-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class C11_post_control
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
     return TRUE;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     return TRUE;
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
     require_once(__ROOT_DATA__.'class.image.php');
     
     $image = new image();
     $image->set_id( $id );
     $image->load();
     if ($image->remove_all_files())
     { $image->delete(); }
    }
}?>