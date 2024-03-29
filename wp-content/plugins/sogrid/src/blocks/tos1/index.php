<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Two Others Style 1 Block
 */
class Sogrid_tos1 extends Sogrid_Block{

    /**
     * Constructor
     */
    function __construct(){

        $this->name = 'tos1';
        $this->slug = 'sogrid/tos1';

        $this->attributes = array(
            'uid' => array(
                'type' => 'string',
                'default' => ''
            ),
            'isAuthorVisible' => array(
                'type' => 'boolean',
                'default' => true
            ),
            'isDateVisible' => array(
                'type' => 'boolean',
                'default' => true
            ),
            'areCategoriesVisible' => array(
                'type' => 'boolean',
                'default' => true
            ),
            'categoriesSelected' => array(
                'type' => 'array',
                'default' => array(),
                'items'   => [
                    'type' => 'object',
                ]
            ),
            'postsNumber' => array(
                'type' => 'number',
                'default' => 6
            ),
            'maxColumns' => array(
                'type' => 'number',
                'default' => 2
            ),
            'columns' => array(
                'type' => 'number',
                'default' => 2
            ),
            'tabletColumns' => array(
                'type' => 'number',
                'default' => 2
            ),
            'mobileColumns' => array(
                'type' => 'number',
                'default' => 1
            ),
            'fontSize' => array(
                'type' => 'number',
                'default' => 16
            ),
            'tabletFontSize' => array(
                'type' => 'number',
                'default' => 16
            ),
            'mobileFontSize' => array(
                'type' => 'number',
                'default' => 16
            ),
            'backgroundColor' => array(
                'type' => 'string',
                'default' => 'rgba(0,0,0,0)'
            ),
            'titleColor' => array(
                'type' => 'string',
                'default' => '#191919'
            ),
            'categoryColor' => array(
                'type' => 'string',
                'default' => '#e53935'
            ),
            'excerptColor' => array(
                'type' => 'string',
                'default' => '#555555'
            ),
            'readmoreColor' => array(
                'type' => 'string',
                'default' => '#ffffff'
            ),
            'readmoreBGColor' => array(
                'type' => 'string',
                'default' => '#d32f2f'
            ),
            'authorColor' => array(
                'type' => 'string',
                'default' => '#777777'
            ),
            'dateColor' => array(
                'type' => 'string',
                'default' => '#777777'
            ),
            'borderColor' => array(
                'type' => 'string',
                'default' => '#cccccc'
            ),
            'hasBorderedImage' => array(
                'type' => 'boolean',
                'default' => false,
            ),
            'marginTop' => array(
                'type' => 'number',
                'default' => 0
            ),
            'marginBottom' => array(
                'type' => 'number',
                'default' => 20
            ),
            'isExcerptVisible' => array(
                'type' => 'boolean',
                'default' => true,
            ),
            'isPaginationEnabled' => array(
                'type' => 'boolean',
                'default' => false,
            ),
            'paginationMaxPages' => array(
                'type' => 'number',
                'default' => 3,
            ),
            'paginationPos' => array(
                'type' => 'string',
                'default' => 'top',
            ),
            'paginationColor' => array(
                'type' => 'string',
                'default' => '#333333',
            ),
            'paginationBgColor' => array(
                'type' => 'string',
                'default' => '#e9e9e9',
            ),
            'paginationActiveColor' => array(
                'type' => 'string',
                'default' => '#ffffff',
            ),
            'paginationActiveBgColor' => array(
                'type' => 'string',
                'default' => '#d32f2f',
            ),
        );
        
        add_action( 'init', array( $this, 'init' ) );
        add_action( 'wp_ajax_sogrid_' . $this->name , array( $this, 'ajaxRender' ));
    }

    /**
     * Overriden
     * Render the posts
     *
     * @param array $recent_posts
     * @param array $attributes
     * @return string
     */
    function renderItems($recent_posts, $attributes){
        $output = '';
        $count = 0;
    
        foreach( $recent_posts as $post ){

            $thumbnail = '';
            $has_thumbnail = '';

            if( has_post_thumbnail( $post ) ){
                $thumbnail = Sogrid_Helpers::renderPostThumbnail( $post->ID, $attributes );
                $has_thumbnail = ' sogrid__entry--has-thumbnail';
            }

            if( $count === 0 ){
                $output .= '<div class="sogrid__two">';
            }
            elseif( $count === 2 ){
                $output .= '</div><div class="sogrid__others">';
            }

            $output .= '
                      
            <article class="sogrid__entry'.$has_thumbnail.'">
            
                '.$thumbnail.'

                <div class="sogrid__entry__content">

                    '.Sogrid_Helpers::renderPostCategories( get_the_category($post->ID), $attributes ).'

                    <h3 class="sogrid__entry__title">
                        <a href="'.esc_url( get_the_permalink($post->ID) ).'">'.esc_html( get_the_title($post->ID) ).'</a>
                    </h3>

                    '.Sogrid_Helpers::renderPostMeta( $post, $attributes ).'
                    
                    '.Sogrid_Helpers::renderPostExcerpt( $post, $attributes ).'

                    <a href="'.esc_url( get_the_permalink($post->ID) ).'" class="sogrid__entry__readmore">'.__('Read More','sogrid').'</a>
                </div>

            </article>';
    
            if( $count === count( $recent_posts ) - 1 ){
                $output .= '</div>';
            }

            $count += 1;
        }

        return $output;
    }

    /**
     * Render Style
     */
    protected function renderStyle( $attributes ){

        extract( $attributes );
    
        return "
            #{$uid}.sogrid--tos1{
                font-size: {$mobileFontSize}px;
                background-color: {$backgroundColor};
                margin-top: {$marginTop}px;
                margin-bottom: {$marginBottom}px;
            }

            #{$uid}.sogrid--tos1 .sogrid__others,
            #{$uid}.sogrid--tos1 .sogrid__others .sogrid__entry,        
            #{$uid}.sogrid--tos1 .sogrid__two{
                border-color: {$borderColor};
            }

            #{$uid}.sogrid--tos1 .sogrid__entry__title a{
                color: {$titleColor};
            }
    
            #{$uid}.sogrid--tos1 .sogrid__entry__meta{
                color: {$dateColor};
            }
    
            #{$uid}.sogrid--tos1 .sogrid__entry__meta .sogrid__entry__author{
                color: {$authorColor};
            }

            #{$uid}.sogrid--tos1 .sogrid__entry__categories a{
                color: {$categoryColor};
            }
    
            #{$uid}.sogrid--tos1 .sogrid__entry__excerpt{
                color: {$excerptColor};
            }
    
            #{$uid}.sogrid--tos1 .sogrid__entry__readmore{
                color: {$readmoreColor};
                background-color: {$readmoreBGColor};
            }   

            #{$uid}.sogrid--tos1 .sogrid__pagination{
                border-color: {$borderColor};
            }

            #{$uid}.sogrid--tos1 .sogrid__pagination span{
                color: {$paginationColor};
                background-color: {$paginationBgColor};
            }
    
            #{$uid}.sogrid--tos1 .sogrid__pagination span.__active{
                color: {$paginationActiveColor};
                background-color: {$paginationActiveBgColor};
            }

            @media all and (min-width: 768px) {
                #{$uid}.sogrid--tos1{
                    font-size: {$tabletFontSize}px;
                }
            }
    
            @media all and (min-width: 992px) {
                #{$uid}.sogrid--tos1{
                    font-size: {$fontSize}px;
                }
            }

        ";
    
    }

}

new Sogrid_tos1;
