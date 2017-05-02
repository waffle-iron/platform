const cacheName = 'v1::static';

self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(cacheName).then(cache => {
      return cache.addAll([
        '/',
        '/translations',
        '/css/styles.css',
        '/css/print-styles.css',
        '/libs/material-design-iconic-font/css/material-design-iconic-font.min.css',
        '/js/common.js',
        '/libs/highlightjs/highlight.min.js',
        '/libs/tinymce/tinymce.min.js',
        '/sw.js',
        '/logo.svg',
        '/heart.svg',
        '/images/icon-192x192.png',
        '/images/icon-256x256.png',
        '/images/icon-384x384.png',
        '/images/icon-512x512.png'
        
      ]).then(() => self.skipWaiting());
    })
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.open(cacheName).then(cache => {
      return cache.match(event.request).then(res => {
        return res || fetch(event.request)
      });
    })
  );
});