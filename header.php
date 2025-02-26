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
    <script type="text/javascript">
      window.__WEBFLOW_CURRENCY_SETTINGS = {
        currencyCode: "USD",
        symbol: "$",
        decimal: ".",
        fractionDigits: 2,
        group: ",",
        template:
          '{{wf {"path":"symbol","type":"PlainText"} }} {{wf {"path":"amount","type":"CommercePrice"} }} {{wf {"path":"currencyCode","type":"PlainText"} }}',
        hideDecimalForWholeNumbers: false,
      };
    </script>
  </head>
  <header class="header-custom">
    <div class="header-custom_nav container mx-auto flex items-center justify-between py-3 px-3">
      <!-- Logo -->
      <a href="<?php echo home_url(); ?>" class="text-3xl text-playfair font-semibold text-black logo">
        <?php bloginfo('name'); ?>
      </a>

      <!-- Navigation Links -->
      <nav >

        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'items_wrap' => '%3$s',
          'link_before' => '<span class="text-gray-900 hover:text-blue-600">',
          'link_after' => '</span>',
        ));
        ?>

      </nav>

      <!-- CTA Button -->
      <a href="#" class="hidden md:block bg-blue-600 text-black px-4 py-2 rounded-lg hover:bg-blue-700">Get Started</a>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-button" class="md:hidden text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
  </header>
  

  <body <?php body_class(); ?>>
    