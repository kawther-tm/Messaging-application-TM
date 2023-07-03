<script>
// Check if the MediaRecorder API is supported by the browser
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia && window.MediaRecorder) {
    let mediaRecorder; // Variable to store the MediaRecorder instance
    let chunks = []; // Array to store the recorded audio data

    // Get the record button element
    const recordButton = document.getElementById('record-button');

    // Event listener for the record button
    recordButton.addEventListener('click', () => {
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            // If already recording, stop the recording
            mediaRecorder.stop();
            recordButton.classList.remove('recording');
        } else {
            // Start recording
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(stream => {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.start();
                    recordButton.classList.add('recording');
                })
                .catch(error => {
                    console.error('Error accessing microphone:', error);
                });
        }
    });

    // Event listener for the dataavailable event (when audio data is available)
    mediaRecorder.addEventListener('dataavailable', event => {
        chunks.push(event.data);
    });

    // Event listener for the stop event (when recording is stopped)
    mediaRecorder.addEventListener('stop', () => {
        const recordedBlob = new Blob(chunks, { type: mediaRecorder.mimeType });
        // Send the recordedBlob to the server or perform further processing
        // You can use AJAX or fetch API to send the recorded audio data
        // For example:
        const formData = new FormData();
        formData.append('voice_message', recordedBlob, 'voice_message.wav');
        formData.append('duration', Math.ceil(recordedBlob.size / (recordedBlob.duration / 1000)));

        fetch('/record-voice-message', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log('Voice message sent:', data);
                // Handle success response from the server
            })
            .catch(error => {
                console.error('Error sending voice message:', error);
                // Handle error response from the server
            });

        // Reset the chunks array for future recordings
        chunks = [];
    });
} else {
    console.error('MediaRecorder API is not supported');
}
// Check if the MediaRecorder API is supported by the browser
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia && window.MediaRecorder) {
    let mediaRecorder; // Variable to store the MediaRecorder instance
    let chunks = []; // Array to store the recorded audio data

    // Get the record button element
    const recordButton = document.getElementById('record-button');

    // Event listener for the record button
    recordButton.addEventListener('click', () => {
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            // If already recording, stop the recording
            mediaRecorder.stop();
            recordButton.classList.remove('recording');
        } else {
            // Start recording
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then(stream => {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.start();
                    recordButton.classList.add('recording');
                })
                .catch(error => {
                    console.error('Error accessing microphone:', error);
                });
        }
    });

    // Event listener for the dataavailable event (when audio data is available)
    mediaRecorder.addEventListener('dataavailable', event => {
        chunks.push(event.data);
    });

    // Event listener for the stop event (when recording is stopped)
    mediaRecorder.addEventListener('stop', () => {
        const recordedBlob = new Blob(chunks, { type: mediaRecorder.mimeType });
        
        // Store the recorded audio data in a JavaScript variable
        const audioData = new FormData();
        audioData.append('voice_message', recordedBlob, 'voice_message.wav');
        audioData.append('duration', Math.ceil(recordedBlob.size / (recordedBlob.duration / 1000)));

        // Clear the recorded chunks array for future recordings
        chunks = [];
    });
} else {    console.error('MediaRecorder API is not supported');
}

</script>