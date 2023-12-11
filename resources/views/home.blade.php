<!-- resources/views/home.blade.php -->

    <div>
        <h1>Welcome to the Home Page</h1>
        <button id="softDeleteButton">Soft Delete Numbers</button>
    </div>

    <script>
        document.getElementById('softDeleteButton').addEventListener('click', function() {
            // The HTTP request code goes here
            const name = 'Evans';
            const password = 'pass2admin';
            const apiUrl = 'http://localhost:8000/delete_numbers';

            const phoneNumbers = ['0599468041', '0560762548'];

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Basic ' + btoa(name + ':' + password),
                },
                body: JSON.stringify({ phone_numbers: phoneNumbers }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                // You can handle the response data here
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

