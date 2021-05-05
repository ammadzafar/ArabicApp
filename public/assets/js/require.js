// in app.js
// configure peaks path
requirejs.config({
    paths: {
        peaks: 'bower_components/peaks.js/src/main',
        EventEmitter: 'bower_components/eventemitter2/lib/eventemitter2',
        Konva: 'bower_components/konvajs/konva',
        'waveform-data': 'bower_components/waveform-data/dist/waveform-data.min'
    }
});

// require it
require(['peaks'], function(Peaks) {
    const options = {
        containers: {
            overview: document.getElementById('overview-container'),
            zoomview: document.getElementById('zoomview-container')
        },
        mediaElement: document.querySelector('audio'),
        dataUri: 'test_data/sample.json'
    };

    Peaks.init(options, function(err, peaks) {
        // Do something when the waveform is displayed and ready.
    });
});
