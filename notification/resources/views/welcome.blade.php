<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCM</title>
</head>

<body>
    <h1>Firebase Push Notification</h1>



    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-app.js";
        import {
            getMessaging,
            getToken
        } from "https://www.gstatic.com/firebasejs/10.11.1/firebase-messaging.js";


        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyChzN5b25B8nygTFantTzOEKs21KL5uAl0",
            authDomain: "push-notification-ef504.firebaseapp.com",
            projectId: "push-notification-ef504",
            storageBucket: "push-notification-ef504.appspot.com",
            messagingSenderId: "975051060527",
            appId: "1:975051060527:web:df5fb610207bdfd7eb5dda"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const messaging = getMessaging(app);
        navigator.serviceWorker.register("sw.js").then(registration => {

            getToken(messaging, {
                serviceWorkerRegistration: registration,
                vapidKey: 'BNh_fHqpmLM8xNFP5W1rPRvmiy-7tWdjbPOlPb0PXenyCeJEZvh5qZMVNSzw-HhFtQ0fqqphp5ERFsRh__e-rLs'
            }).then((currentToken) => {
                if (currentToken) {
                    // Send the token to your server and update the UI if necessary
                    // ...
                    console.log("Token is: ", currentToken)
                } else {
                    // Show permission request UI
                    console.log('No registration token available. Request permission to generate one.');
                    // ...
                }
            }).catch((err) => {
                console.log('An error occurred while retrieving token. ', err);
                // ...
            });
            console.log(app);
        });
    </script>
</body>

</html>
