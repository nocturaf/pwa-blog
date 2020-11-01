const firebaseConfig = {
    apiKey: "AIzaSyCuOZyKlnsM-wmU-XsfONeyEAT_bjo5Yy8",
    authDomain: "pwa-blogs.firebaseapp.com",
    databaseURL: "https://pwa-blogs.firebaseio.com",
    projectId: "pwa-blogs",
    storageBucket: "pwa-blogs.appspot.com",
    messagingSenderId: "251531481267",
    appId: "1:251531481267:web:923cbda298bb4a101d20c6"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Initialize firebase cloud messaging
const fcm = firebase.messaging();

// request notification permission
if(Notification.permission !== 'granted') {
    fcm.requestPermission()
        .then(() => {
            console.log("Notification Allowed");
            // get token on notification permission allowed
            return fcm.getToken();
        })
        .then(token => {
            // save new token to server
            saveToken(token);
        })
        .catch(err => {
            console.log("No permission allowed : "+err);
        });
}

// listen to on token refresh
fcm.onTokenRefresh(() => {
    // get new valid token
    fcm.getToken()
        .then(token => {
            console.log('On refresh token : ' + token);
            // save new token to server
            saveToken(token);
        })
});

// listen to firebase message received on foreground
fcm.onMessage(payload => {
    console.log('notification received on foreground.');
    // do nothing at the moment
});

function saveToken(token)  {
    const targetUrl = 'http://localhost/pwa-blog/index.php/notification/saveNewToken';
    $.ajax({
        'type': 'POST',
        'ContentType': 'application/json',
        'cache': false,
        'data': {
            "token": token
        },
        'url': targetUrl,
        'dataType': 'json',
    }).done(function(response){
        console.log(response);
    })
}

