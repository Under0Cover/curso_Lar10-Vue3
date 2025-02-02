import './bootstrap';

import Alpine from 'alpinejs';
import $ from 'jquery';
window.$ = window.jQuery = $;

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('#phone').on('input', function(event) {
        let phone = event.target.value.replace(/\D/g, '');
        let formattedPhone = '';

        if (phone.length <= 10) {
            formattedPhone = phone.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
        } else if (phone.length > 10) {
            formattedPhone = phone.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        }

        event.target.value = formattedPhone;
    });
});