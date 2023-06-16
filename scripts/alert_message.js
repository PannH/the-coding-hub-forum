// Alerter l'utilisateur du message trouvé dans l'URL
const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');

if (message) {
   alert(message);
}