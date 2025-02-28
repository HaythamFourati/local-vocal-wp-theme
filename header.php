<!DOCTYPE html>
<html <?php language_attributes(); ?>
data-wf-domain="localvocalmarketing.com"
  data-wf-page="66b0af4743ca3e675e5927f7"
  data-wf-site="6667e64973c050569f2ec968"  
>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link
      href="https://fonts.gstatic.com"
      rel="preconnect"
      crossorigin="anonymous"
    />
    <link 
      href="<?php echo get_template_directory_uri(); ?>/src/mobilemenu.css" 
      rel="stylesheet" 
    />
    <?php wp_head(); ?>

    <script
      src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"
      type="text/javascript"
    ></script>
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: [
            "Manrope:200,300,regular,500,600,700,800",
            "Urbanist:200,300,regular,500,600,700",
            "Playfair Display:regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic",
          ],
        },
      });
    </script>
    <script type="text/javascript">
      !(function (o, c) {
        var n = c.documentElement,
          t = " w-mod-";
        (n.className += t + "js"),
          ("ontouchstart" in o ||
            (o.DocumentTouch && c instanceof DocumentTouch)) &&
            (n.className += t + "touch");
      })(window, document);
    </script>
    <link
      href="https://cdn.prod.website-files.com/6667e64973c050569f2ec968/66d81b35d90b12bb59f22758_Small.svg"
      rel="shortcut icon"
      type="image/x-icon"
    />
    <link
      href="https://cdn.prod.website-files.com/6667e64973c050569f2ec968/66d81b398d58d44672705a70_Large.svg"
      rel="apple-touch-icon"
    />
    
  </head>
  <header class="header-custom">
    <div class="header-custom_nav container mx-auto flex items-center justify-between py-3 px-3">
      <!-- Logo -->
      <a href="<?php echo home_url(); ?>" class="text-3xl text-playfair font-semibold text-black logo">
        <img src="https://localvocalmarketing.com/wp-content/uploads/2025/02/LVM-indigo-color.png" alt="LVM Logo">
      </a>

      <!-- Navigation Links -->
      <nav>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'flex space-x-6',
          'items_wrap' => '<ul class="%2$s">%3$s</ul>',
          'link_before' => '<span class="text-gray-900 hover:text-blue-600 transition-colors">',
          'link_after' => '</span>',
        ));
        ?>
      </nav>

      <!-- CTA Button -->
      <button href="/contact" class="hidden md:block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Get Started</button>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-button" class="md:hidden text-gray-700 z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
  </header>

  <!-- Mobile Menu Overlay - OUTSIDE the header for proper z-index stacking -->
  <div id="mobile-menu" class="md:hidden">
    <div>
      <div class="flex flex-col h-full">
        <div class="p-4 flex justify-end">
          <button id="mobile-menu-close" class="text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <nav class="flex-1 px-4 py-2">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'space-y-4',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => '<span class="block text-gray-900 hover:text-blue-600 py-2 transition-colors">',
            'link_after' => '</span>',
          ));
          ?>
          <div class="mt-6">
            <button href="/contact" class="block w-full bg-blue-600 text-white text-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">Get Started</button>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <body <?php body_class(); ?>>