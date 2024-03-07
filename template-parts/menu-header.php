<?php
/**
 *  Mega menu template
 */

$mega_menu_items = get_field('mega_menu_items', 'options');

if ( empty($mega_menu_items) ) return;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <?php foreach ( $mega_menu_items as $mega_menu_item ) : ?>
                    <?php if ( empty($mega_menu_item['add_submenu']) && empty($mega_menu_item['submenu_items']) ) : ?>

                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo esc_attr( $mega_menu_item['link'] ); ?>"><?php echo $mega_menu_item['title']; ?></a>
                    </li>

                    <?php else : ?>
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><?php echo $mega_menu_item['title']; ?></a>

                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="row g-3">
                                <?php
                                $submenu_columns_count = $mega_menu_item['submenu_columns_count'];
                                $submenu_items_count = count($mega_menu_item['submenu_items']);
                                $items_per_column = round($submenu_items_count/$submenu_columns_count );
                                switch ($mega_menu_item['submenu_columns_count']) {
                                    case 2:
                                        $subitem_col_classes = 'col-6';
                                        break;
                                    case 3:
                                        $subitem_col_classes = 'col-lg-4 col-12';
                                        break;
                                    case 4:
                                        $subitem_col_classes = 'col-lg-3 col-6';
                                        break;
                                    default:
                                        $subitem_col_classes = 'col-6';
                                }

                                $i = 1;
                                ?>
                                <?php foreach ( $mega_menu_item['submenu_items'] as $submenu_item) : ?>
                                    <?php if ( $i == 1) : ?>
                                        <div class="<?php echo $subitem_col_classes; ?>">

                                            <div class="col-megamenu">
                                                <div class="list-unstyled">
                                    <?php endif; ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <?php echo wp_get_attachment_image($submenu_item['image']); ?>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <a href="<?php echo esc_attr( $submenu_item['title'] ); ?>"><?php echo $submenu_item['title']; ?></a>
                                                        <p><?php echo $submenu_item['description']; ?></p>
                                                    </div>
                                                </div>
                                    <?php
                                    if ( $i == $items_per_column ) :
                                        $i = 1;
                                    ?>
                                                </div>
                                            </div>  <!-- col-megamenu.// -->
                                        </div>
                                    <?php
                                    else :
                                    $i++;
                                    endif;
                                    ?>
                                <?php endforeach;?>
                            </div>
                        </div>

                    </li>
                    <?php endif;?>
                <?php endforeach;?>
            </ul>
        </div> <!-- navbar-collapse.// -->
    </div> <!-- container-fluid.// -->
</nav>