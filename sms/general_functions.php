<?php

function encrypt( $val = '' )
{
    if( $val )
    {
        $val = 'sms-'.$val;
        for($i=0;$i<3;$i++)
        {
            $val = base64_encode( $val );
        }    
    }
    return $val;
}

function decrypt( $val = '' )
{
    if( $val )
    {
        for($i=0;$i<3;$i++)
        {
            $val = base64_decode( $val );
        } 
        
        $val = array_pop(explode('-',$val));
    }
    return $val;
}

function get_pagination( $total_data=0, $limit=5, $start_page=0, $link='' )
{

    $block          = ceil($total_data / $limit);
    $current_page   = (($start_page + $limit) / $limit);
    $page_number    = 0;

    $all_block = '<div class="pagination_div">';
    for($i=1;$i<=$block;$i++)
    {
        $page_number = ($i - 1) * $limit;

        if($current_page == $i)
        
            $anchor = $i;    
        else
            $anchor = '<a href="'.$link.'?start_page='.$page_number.'">'.$i.'</a>';

        $all_block .= '<span>'.$anchor.'</span>';
    }
    $all_block .= '</div>';

    return $all_block;
}

function set_msg( $msg = '', $msg_type = 'success' ) 
{    
    if( $msg )
    {
        $all_msg = (isset($_SESSION['msg'])?$_SESSION['msg']:array());

        if( $msg_type == 'success' )
        {
            $all_msg[] = "<div class='success_msg'>".$msg."</div>";
        }
        else
        {
            $all_msg[] = "<div class='error_msg'>".$msg."</div>";
        }

        $_SESSION['msg'] = $all_msg;
        unset( $all_msg );
    }    
}

function show_msg() 
{    
    if( isset($_SESSION['msg']) )
    {
        foreach( $_SESSION['msg'] As $msg )
        {
            echo $msg;
        }
        unset($_SESSION['msg']);
    }    
}


?>

