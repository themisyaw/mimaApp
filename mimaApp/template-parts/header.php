
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     
    <?php wp_head(); ?>
    
</head>
<body class="lightyellow" <?php body_class(); ?>>
    <!-- Offcanvas Navbar -->
    <nav class="navbar navbar-dark xhaki">
        <div class="container-fluid">
            <a class="navbar-brand col-3" href="<?php echo home_url(); ?>"><img  class="img-fluid" src="https://cdn.prod.website-files.com/61bcb6e4f68b4d746ffd5990/61bcb6e4f68b4dae50fd59ad_Mima_Primary_Logo_Light_Sand-p-500.png" alt=""></a>
            <button class="navbar-toggler orange border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php
                    if (has_nav_menu('header-menu')) :
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'container' => false,
                            'menu_class' => 'navbar-nav justify-content-end flex-grow-1 p-3 navMenuUl',
                            'fallback_cb' => false,
                            'depth' => 2,
                            'walker' => new class extends Walker_Nav_Menu {
                                function start_lvl(&$output, $depth = 0, $args = array()) {
                                    $output .= '<ul class="dropdown-menu dropdown-menu-dark">';
                                }
                                function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
                                    $classes = empty($item->classes) ? [] : (array) $item->classes;
                                    $li_class = in_array('menu-item-has-children', $classes) ? 'nav-item dropdown' : 'nav-item';
                                    $output .= '<li class="' . esc_attr($li_class) . '">';
                                    $link_class = in_array('menu-item-has-children', $classes) ? 'nav-link dropdown-toggle' : 'nav-link';
                                    $output .= '<a class="' . $link_class . '" href="' . esc_url($item->url) . '"';
                                    if (in_array('menu-item-has-children', $classes)) {
                                        $output .= ' role="button" data-bs-toggle="dropdown" aria-expanded="false"';
                                    }
                                    $output .= '>' . esc_html($item->title) . '</a>';
                                }
                                function end_el(&$output, $item, $depth = 0, $args = array()) {
                                    $output .= '</li>';
                                }
                                function end_lvl(&$output, $depth = 0, $args = array()) {
                                    $output .= '</ul>';
                                }
                            }
                        ));
                    else : ?>
                        <ul class="navbar-nav navMenuUl">
                            <li class="nav-item"><a class="nav-link" href="<?php echo home_url(); ?>">Home</a></li>
                        </ul>
                    <?php endif; ?>

                
                </div>
            </div>
        </div>
    </nav>
