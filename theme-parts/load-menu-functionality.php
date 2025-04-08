<?php
$brand_logo = get_field('menu_icon', 'option');

if ($brand_logo) {
    $brand_logo_url = esc_url($brand_logo['url']);
    $brand_logo_alt = esc_attr($brand_logo['alt']);
} else {
    // Handle the case where the brand logo is not found
    $brand_logo_url = '';
    $brand_logo_alt = '';
}
?>

<script type="module">
    document.addEventListener('DOMContentLoaded', () => {
        const menuLogoItem = document.querySelector('.menu-logo-item a');
        if (menuLogoItem) {
            let tempContent = menuLogoItem.innerHTML;
            menuLogoItem.innerHTML = '';
            const image = document.createElement('img');
            image.src = '<?php echo $brand_logo_url; ?>';
            image.alt = '<?php echo $brand_logo_alt; ?>';
            image.classList.add('md:w-16', 'lg:w-20', 'xl:w-28');
            image.setAttribute('x-cloak', ''); // Set the x-cloak attribute
            image.setAttribute('aria-label', tempContent); // Set the aria-label attribute
            menuLogoItem.prepend(image);
        }

    // Check if the current URL is /tours
    if (window.location.pathname === '/tours/' || window.location.pathname === '/tours') {
        
        // Target the desktop menu
        const desktopMenu = document.querySelector('.desktop-menu');

        // Iterate over the menu items
        desktopMenu.querySelectorAll('li').forEach(li => {
            // Get the anchor element inside the li
            const anchor = li.querySelector('a');

            // Check if the anchor has a data-title and its value is 'tours'
            if (anchor.dataset.title === 'tours') {
                // Add the 'active' class to the li
                li.classList.add('active');
            }
        });
    }

    });
</script>