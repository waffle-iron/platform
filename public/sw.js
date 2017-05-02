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
        '/js/common.js',
        '/js/common.js',
        '/js/common.js',
        '/js/common.js',
        '/logo.svg',
        '/heart.svg',
      ]).then(() => self.skipWaiting());
    })
  );
});

// when the browser fetches a url, either response with
// the cached object or go ahead and fetch the actual url
self.addEventListener('fetch', event => {
  event.respondWith(
    // ensure we check the *right* cache to match against
    caches.open(cacheName).then(cache => {
      return cache.match(event.request).then(res => {
        return res || fetch(event.request)
      });
    })
  );
});