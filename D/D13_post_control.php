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
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001ABC-includes begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001ABC-includes end

/* user defined constants */
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001ABC-constants begin
// section 10-5-22-86--511e28e0:1537e3dfb91:-8000:0000000000001ABC-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class D13_post_control
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
     require_once(__ROOT_DATA__.'class.document.php');
     
     $document = new document();
     $document->set_id( $id );
     $document->load();
     if ($document->remove_file())
     { $document->delete(); }
    }
}?>