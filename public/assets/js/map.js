var map = L.map('map').setView([48.1113387, -1.6800198], 12);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([48.1315889, -1.7101105]).addTo(map)
    .bindPopup('Rennes, Ille-et-Villaine, France<br>Voici une plante trouvée');