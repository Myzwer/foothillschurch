/**
 * Detects the user's device (iOS or non-iOS) and updates the map link to
 * use the appropriate mapping service (Apple Maps for iOS, Google Maps otherwise).
 *
 * The function is triggered after the DOM has fully loaded. It checks for the presence of
 * an element with the ID "map-link" and retrieves the Google Maps and Apple Maps URLs
 * from data attributes (`data-gmap-link` and `data-amap-link`) in the HTML.
 * If the user is on an iOS device, the link is updated to point to Apple Maps;
 * otherwise, it remains as the Google Maps link.
 *
 * @function
 * @example
 * // HTML Structure Example:
 * // <a id="map-link"
 * //    href="https://maps.google.com/?q=location"
 * //    data-gmap-link="https://maps.google.com/?q=location"
 * //    data-amap-link="https://maps.apple.com/?q=location">
 * //    Launch Maps
 * // </a>
 *
 * @returns {void}
 */
document.addEventListener("DOMContentLoaded", function () {
  // Check if the map link element exists on the page
  const mapLinkElement = document.getElementById("map-link");

  if (mapLinkElement) {
    // Get the URLs from the data attributes
    const googleMapsLink = mapLinkElement.getAttribute("data-gmap-link");
    const appleMapsLink = mapLinkElement.getAttribute("data-amap-link");

    /**
     * Detects if the user is using an iOS device based on the user agent string.
     *
     * @return {boolean} True if the device is an iOS device, false otherwise.
     */
    function isIOS() {
      return /iPhone|iPad|iPod|Macintosh/.test(navigator.userAgent);
    }

    // If the user is on iOS, update the link to use Apple Maps
    if (isIOS()) {
      mapLinkElement.href = appleMapsLink;
    } else {
      // Ensure the Google Maps link is set
      mapLinkElement.href = googleMapsLink;
    }
  }
});
