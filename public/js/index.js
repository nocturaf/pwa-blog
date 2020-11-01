// check if browser support service worker
if('serviceWorker' in navigator) {
    navigator.serviceWorker.register('firebase-messaging-sw.js', {scope: 'firebase-cloud-messaging-push-scope'})
        .then((reg) => {
            // browser support service worker
            console.log('fcm service worker is registered', reg)
        })
        .catch((err) => console.log('fcm service worker not registered', err));
}