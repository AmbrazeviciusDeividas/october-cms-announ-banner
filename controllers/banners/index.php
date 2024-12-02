<div class="container" id="plugin-thank-you-message" style="display: none;">
    <div class="padded-section">
        <div class="alert alert-info">
            <h4>Thanks for using our plugin!</h4>
            <p>We truly appreciate you choosing our plugin. If you have any requests, offers, or issues, feel free to
                contact us at <a href="mailto:info@tallpro.com">info@tallpro.com</a>.</p>
            <p>Your feedback means the world to us and helps us improve. Don't hesitate to reach out or <a href="https://octobercms.com/plugin/deividas-announcementbar" target="_blank">give a feedback to us</a>!!</p>
            <button id="dismiss-message-button" class="btn btn-primary">Dismiss</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const messageContainer = document.getElementById('plugin-thank-you-message');
        const dismissButton = document.getElementById('dismiss-message-button');

        // Check if the message should be hidden
        if (!localStorage.getItem('plugin_message_dismissed2')) {
            messageContainer.style.display = 'block';
        }

        // Dismiss the message and store preference
        dismissButton.addEventListener('click', function () {
            messageContainer.style.display = 'none';
            localStorage.setItem('plugin_message_dismissed', 'true');
        });
    });
</script>

<?= $this->listRender() ?>
