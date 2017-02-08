<?php

$files =
[
"class.C_basic_frame.php",
"C_post_control.php",
"C0_pre_control.php",
"C2_post_control.php",
"C3_post_control.php",
"C5_post_control.php",
"C7_post_control.php",
"C9_pre_control.php",
"C10_post_control.php",
"C11_post_control.php",
"C12_post_control.php",
"C13_post_control.php",
"C14_post_control.php",
"C15_post_control.php",
"C18_post_control.php",
"C26_pre_control.php",
"C27_pre_control.php",
"C27_post_control.php",
"C27_1_post_control.php",
"C27_2_post_control.php",
"C27_3_post_control.php",
"C27_4_post_control.php",
"C27_5_post_control.php",
"C27_6_post_control.php",
"C27_7_post_control.php",
"C28_post_control.php",
"C30_post_control.php",
"C31_post_control.php",
"C33_pre_control.php",
"C33_post_control.php",
"C33_1_post_control.php",
"C33_2_post_control.php",
"C33_3_post_control.php",
"C35_post_control.php",
"C36_post_control.php",
"C36_pre_control.php",
"C37_post_control.php",
"C37_pre_control.php",
"C38_post_control.php",
"C38_all_post_control.php",
"C38_selected_post_control.php",
"C39_post_control.php"
];

foreach ($files as  $name )
{
    echo $name . "<br />";
    write_file( $name );
}

function write_file( $name )
{
$myFile = $name;
$buffer;
$file_array = array();
$function_array = array();
$comment_array = array();
$string_line;
$pos;
$before_operaton = TRUE;
$first_run = FALSE;

$handle = fopen($myFile, 'r') or die("can't open file");

// read the complete file into a buffer named file_array
while (($buffer = fgets($handle, 4096)) !== false)
{
if ( strpos($buffer, '#') !== false )
    $first_run = TRUE;

$file_array[] = $buffer;
}
fclose($handle);

$handle = fopen($myFile, 'w') or die("can't open file");
foreach ($file_array as $string_line)
{
    if ( $first_run )
    {
        if ( $before_operaton )
        {
            fwrite($handle, $string_line );
            if ( strpos($string_line, 'OPERATIONS') !== false )
            {
                $before_operaton = FALSE;
            }
        }
        else
        {
            // handle after operation
            if ( strpos($string_line, '#') !== false )
            {
                $pos = strpos($string_line, '#');
                $function_array[] = substr( $string_line, $pos + 1 );
            }

            elseif ( strpos($string_line, '*') == 5 )
            {
                $comment_array[] = $string_line;
            }

            elseif ( strpos($string_line, 'function') !== false )
            {
                fwrite($handle, "" );
                foreach ($comment_array as $comment_line)
                {
                    fwrite($handle, $comment_line );
                }
                fwrite($handle, $string_line );
                fwrite($handle, "    {" . "\n" );
                foreach ($function_array as $string_line)
                {
                    fwrite($handle, "     " . $string_line );
                }
                fwrite($handle, "    }" . "\n" );

                unset( $comment_array );
                unset( $function_array );
            }
            else
            {
            echo "...."; // do nothing
            }
        }
    }
    else
    {
        fwrite($handle, $string_line );
    }
}
if ( $first_run )
{
fwrite($handle, "}" );
fwrite($handle, "?>" );
}

fclose($handle);
}

?>