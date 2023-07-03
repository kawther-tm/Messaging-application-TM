function startRecording() {
  navigator.mediaDevices.getUserMedia({ audio: true })
      .then(function (stream) {
          const mediaRecorder = new MediaRecorder(stream);
          const chunks = [];

          mediaRecorder.addEventListener('dataavailable', function (event) {
              chunks.push(event.data);
          });

          mediaRecorder.addEventListener('stop', function () {
              const audioBlob = new Blob(chunks);
              const audioUrl = URL.createObjectURL(audioBlob);

              const xhr = new XMLHttpRequest();
              xhr.open('POST', '/record-voice-message');
              xhr.setRequestHeader('Content-Type', 'application/json');

              xhr.onreadystatechange = function () {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                      console.log(xhr.response);
                  }
              };

              xhr.send(JSON.stringify({ audioData: audioUrl }));
          });

          mediaRecorder.start();

          setTimeout(function () {
              mediaRecorder.stop();
          }, 5000);
      })
      .catch(function (error) {
          console.error(error);
      });
}
