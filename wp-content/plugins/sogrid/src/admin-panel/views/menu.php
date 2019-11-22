<?php 

$items = array(

    array(
        'tab' => 'general', 
        'name' => __('Getting Started', 'sogrid'),
        'url' => SOGRID_PANEL_URL . '&tab=general'
    ),

    array(
        'tab' => 'plugins', 
        'name' => __('Plugins', 'sogrid'),
        'url' => 'https://delabon.com/store'
    ),

    array(
        'tab' => 'changelog', 
        'name' => __('Change Log', 'sogrid'),
        'url' => SOGRID_PANEL_URL . '&tab=changelog'
    ),
    
);

?>

<ul class="sog_panel_menu">
    <?php 
        foreach ( $items as $item ) {

            $tab = isset($_GET['tab']) ? $_GET['tab'] : 'general';
            $class = '';

            if( $tab === $item['tab']){
                $class = '__active';
            }
        ?>
            <li class="<?php echo $class; ?>">
                <a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a>
            </li>
        <?php 
        }
    ?>
</ul>
