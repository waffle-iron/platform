this.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('v1').then(function(cache) {
      return cache.addAll([
        '/css/styles.css',
        '/css/print-styles.css',
        '/css/export-styles.css',
        '/js/common.js',
        '/images/logo.svg',
        '/images/heart.svg',
        '/images/icon-192x192.png',
        '/images/icon-256x256.png',
        '/images/icon-384x384.png',
        '/images/icon-512x512.png',
        'https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.11.0/highlight.min.js',
        '/app.js',
      ]);
    })
  );
});

this.addEventListener('fetch', function(event) {
  var response;
  event.respondWith(caches.match(event.request).catch(function() {
    return fetch(event.request);
  }).then(function(r) {
    response = r;
    caches.open('v1').then(function(cache) {
      cache.put(event.request, response);
    });
    return response.clone();
  }).catch(function() {
    return caches.match('/images/myLittleVader.jpg');
  }));
});