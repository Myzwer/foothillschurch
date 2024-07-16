/*
 * Glide JS controls
 * This project uses Glide JS.
 * https://glidejs.com/docs/options/
 * Each time a slider is used, it must be initialized and set up here.
 */

// Import from Node_modules (only one time)
import Glide from "@glidejs/glide";

window.onload = function () {
    // Define the options for the Glide slider
    const glideOptions = {
        type: "carousel",
        gap: 30,
        perView: 1,
    };

    // Get the main glide container element, slide elements and container elements
    const glideContainer = document.querySelector('.glide');
    const glideSlides = document.querySelectorAll('.glide__slide');
    const glideBulletsContainer = document.querySelector('.glide__bullets');

    // Check if the glide container and slides are present
    if (glideContainer !== null && glideSlides.length > 0) {
        // Dynamically generate bullets based on the number of slides
        glideSlides.forEach((slide, index) => {
            const bullet = document.createElement('button');
            bullet.className = 'glide__bullet'; // Add the class for styling
            bullet.setAttribute('data-glide-dir', `=${index}`); // Set the direction attribute
            glideBulletsContainer.appendChild(bullet); // Append the bullet to the container
        });

        // Initialize and mount Glide.js
        const glide = new Glide(glideContainer, glideOptions);
        glide.mount(); // Mount the Glide instance to apply settings
    } else {
        console.log('Glide container not found or no slides'); // Let me know in the console that it failed
    }
};
