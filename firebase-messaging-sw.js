importScripts("https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.0.0/firebase-messaging.js");

// init firebase messaging for service worker
firebase.initializeApp({
    apiKey: "AIzaSyCuOZyKlnsM-wmU-XsfONeyEAT_bjo5Yy8",
    authDomain: "pwa-blogs.firebaseapp.com",
    databaseURL: "https://pwa-blogs.firebaseio.com",
    projectId: "pwa-blogs",
    storageBucket: "pwa-blogs.appspot.com",
    messagingSenderId: "251531481267",
    appId: "1:251531481267:web:923cbda298bb4a101d20c6"
});

const fcm = firebase.messaging();

// listen notification message from fcm on background
fcm.onBackgroundMessage(payload => {
    console.log('Handle background notification.');

    const notification = payload.data;
    const notificationTitle = notification.title;
    const notificationOptions = {
        body: notification.body,
        icon: notification.icon,
        badge: notification.badge
    };

    // show native notification with service worker
    self.registration.showNotification(
        notificationTitle,
        notificationOptions
    ).then(() => {
        return console.log('Notification is showing');
    });
});

// handle click notification
self.addEventListener('notificationclick', (e) => {
    e.notification.close();
    clients.openWindow("http://localhost:5000/pwa-blog");
});