/**
 * Detects the user's device (Apple or non-Apple) and updates the map link to
 * use the appropriate mapping service (Apple Maps for Apple devices, Google Maps otherwise).
 *
 * The function is triggered after the DOM has fully loaded. It checks for elements
 * with the class "map-link" and retrieves the Apple Maps URL from a data attribute (`data-amap-link`) in the HTML.
 * If the user is on an Apple device, the link is updated to point to Apple Maps;
 * otherwise, it defaults to Google Maps, which is already set in the `href` attribute.
 *
 * @function
 * @example
 * // HTML Structure Example:
 * // <a class="map-link"
 * //    href="https://maps.google.com/?q=location"
 * //    data-amap-link="https://maps.apple.com/?q=location">
 * //    Launch Maps
 * // </a>
 *
 * @returns {void}
 */

/**
 * Detects if the user is using an Apple device (iOS, iPadOS, macOS).
 *
 * @return {boolean} True if the device is an Apple device, false otherwise.
 */
function isAppleDevice() {
  return (
    /iPhone|iPad|iPod|Macintosh/.test(navigator.userAgent) ||
    /MacIntel|MacPPC|Mac68K|Mac/.test(navigator.platform)
  );
}

document.addEventListener("DOMContentLoaded", function () {
  // Get all elements with the class "map-link"
  const mapLinkElements = document.querySelectorAll(".map-link");

  // Iterate through each map link element
  mapLinkElements.forEach(function (mapLinkElement) {
    // Get the Apple Maps URL from the data attribute
    const appleMapsLink = mapLinkElement.getAttribute("data-amap-link");

    // If the user is on an Apple device, update the link to use Apple Maps
    if (isAppleDevice()) {
      mapLinkElement.href = appleMapsLink;
    }
    // If not, the href remains as Google Maps (default)
  });
});
