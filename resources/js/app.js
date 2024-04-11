import './bootstrap';
import jQuery from 'jquery';

window.$ = jQuery;


$(document).ready(function () {
    $('#search').keyup(function () {
        let form = $(this).closest('form')

        ajaxPrepend(form, form.attr('method'), form.attr('action'), form.serialize(), '#search_autocomplete');
    });
});

function ajaxPrepend(form, method, action, data, block) {
    $.ajax({type: method, url: action, data: data})
        .done(function (xhr) {
            $(block).html(xhr);
        })
        .fail(function (xhr) {

        });
}
