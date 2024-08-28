document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.status-toggle').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const loader = document.getElementById('loader');
            loader.style.display = 'flex'; // Show loader

            const eventId = this.getAttribute('data-id');
            const status = this.checked ? 'published' : 'unpublished'; // Toggle status

            fetch(`/events/${eventId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ status })
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.redirect; // Redirect to the appropriate page
                } else {
                    alert('Status updated successfully!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the status. Please try again.');
            })
            .finally(() => {
                loader.style.display = 'none'; // Hide loader
            });            
        });
    });
});
