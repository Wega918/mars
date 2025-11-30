importScripts('https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.23.0/firebase-messaging-compat.js');

firebase.initializeApp({
    apiKey: "AIzaSyDAXB4rCViy1aHVGynMKMUQ09IQHTmpeX4",
    authDomain: "vipmars-429f6.firebaseapp.com",
    projectId: "vipmars-429f6",
    storageBucket: "vipmars-429f6.appspot.com",
    messagingSenderId: "887707166304",
    appId: "1:887707166304:web:c0748cf9555a06e79ec505"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload){
    console.log('[SW] Получено push-сообщение:', payload);
    const notification = payload.notification || {};
    self.registration.showNotification(notification.title, {
        body: notification.body || '',
        icon: notification.icon || '/img/battle.png',
        data: { url: payload.fcmOptions?.link || '/battle.php' },
        vibrate: [200,100,200]
    });
});

self.addEventListener('notificationclick', function(event){
    event.notification.close();
    const url = event.notification.data?.url || '/battle.php';
    event.waitUntil(
        clients.matchAll({type:'window', includeUncontrolled:true}).then(windowClients=>{
            for(let client of windowClients){
                if(client.url.includes(url)) return client.focus();
            }
            return clients.openWindow(url);
        })
    );
});
