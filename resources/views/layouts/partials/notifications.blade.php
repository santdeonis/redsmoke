<script src="{{ asset('vendor/js/notify/notify.min.js') }}"></script>
<script>
    const notifySettings = {
        autoHide: true,
        autoHideDelay: 3000,
        animation: true,
        style: 'custom-notification',
        showAnimation: 'fadeIn',
        showDuration: 400,
        hideAnimation: 'fadeOut',
        hideDuration: 200,
    };

    $.notify.addStyle('custom-notification', {
        html:
            "<div class='custom-notification'>" +
            "<div class='custom-notification__inner'>" +
            "<div class='custom-notification__message' data-notify-html='message'/>" +
            "</div>" +
            "</div>"
    })

    function notifyWithMessage(message, className) {
        $.notify({
            message: message,
        }, {
            ...{
                className: className,
            },
            ...notifySettings
        });
    }

    function notify() {
        @if(session()->has('success'))
        notifyWithMessage('{{ session()->get('success') }}', 'alert alert alert-info');
        @endif

        @if(session()->has('error'))
        notifyWithMessage('{{ session()->get('error') }}', 'alert alert alert-danger');
        @endif
    }

    document.addEventListener("DOMContentLoaded", notify);
</script>
