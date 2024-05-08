function uploadVideo() {
    var fileInput = document.getElementById('videoFile');
    var file = fileInput.files[0];
    if (file) {
        var formData = new FormData();
        formData.append('videoFile', file);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Upload successful
                    document.getElementById('message').innerHTML = 'Video uploaded successfully!';
                } else {
                    // Upload failed
                    document.getElementById('message').innerHTML = 'Failed to upload video';
                }
            }
        };
        xhr.open('POST', 'upload.php', true);
        xhr.send(formData);
    }
}
