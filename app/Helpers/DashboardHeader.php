<?php
if( !function_exists( 'DashboardHeader' ) ) {
    function DashboardHeader( $values = 0 ) {
        $html = '<div class="content-header d-none">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row mb-2">';

        if( $values && is_array( $values ) ) {
            $html .= '<div class="col-sm-6"><h1 class="m-0">';
            if( isset($values['title']) ) {
                $html .= $values['title'];
            } else {
                $html .= 'Dashboard';
            }

            $html .= '</h1></div>';

            if( isset($values['links']) ) {
                $html .= '<div class="col-sm-6">';
                $html .= '<ol class="breadcrumb float-sm-right">';
                $count = 1;
                foreach( $values['links'] as $key => $value ) {
                    $html .= '<li class="breadcrumb-item ';
                    $html .= $count == count($values['links']) ? 'active">': '">';
                    $html .= $count == count($values['links']) ? $key : '<a href="'.$value.'">'.$key.'</a>';
                    $html .= '</li>';
                    $count++;
                }
                $html .= '</ol>';
                $html .= '</div>';
            }
        }
        $html .= '</div></div></div>';
        echo $html;
    }
}