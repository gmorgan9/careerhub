// JavaScript to load application details dynamically into the modal
const modalBodyContent = document.getElementById('modal-body-content');
const viewDetailLinks = document.querySelectorAll('[data-bs-toggle="modal"]');

viewDetailLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        const appId = this.getAttribute('data-app-id');
        // Fetch application details using AJAX or fetch API and update modal body content
        fetch(`<?php echo BASE_URL; ?>/api/get_application_details.php?app_id=${appId}`)
            .then(response => response.text())
            .then(data => {
                // Set the modal body content for the specific modal
                const modalBody = document.getElementById(`modal-body-content-${appId}`);
                modalBody.innerHTML = data;
                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById(`exampleModal${appId}`));
                modal.show();
            })
            .catch(error => {
                console.error('Error fetching application details:', error);
            });
    });
});