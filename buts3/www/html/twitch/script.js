const OBSWebSocket = require('obs-websocket-js');
const obs = new OBSWebSocket();

// Connect to OBS WebSocket
obs.connect({ address: 'localhost:4444', password: 'your_password' })
    .then(() => {
        console.log('Connected to OBS Studio');
    })
    .catch(err => {
        console.error('Error connecting to OBS Studio:', err);
    });

function executeAction(action) {
    // Send a request to OBS Studio to perform the action
    switch (action) {
        case 'button1':
            // Example: Toggle the visibility of a specific scene
            obs.send('ToggleSceneItem', { 'scene-name': 'YourSceneName', item: 'YourSceneItemName' })
                .then(data => {
                    console.log('Toggle Scene Item response:', data);
                })
                .catch(err => {
                    console.error('Error toggling scene item:', err);
                });
            break;
        case 'button2':
            // Example: Start recording
            obs.send('StartRecording')
                .then(data => {
                    console.log('Start Recording response:', data);
                })
                .catch(err => {
                    console.error('Error starting recording:', err);
                });
            break;
        case 'button3':
            // Example: Stop recording
            obs.send('StopRecording')
                .then(data => {
                    console.log('Stop Recording response:', data);
                })
                .catch(err => {
                    console.error('Error stopping recording:', err);
                });
            break;
        default:
            console.log('Action not recognized');
    }
}
