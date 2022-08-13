var MauticVars = {};
var mQuery = jQuery.noConflict(true);
window.jQuery = mQuery;
if (!String.prototype.startsWith) {
    String.prototype.startsWith = function (searchString, position) {
        position = position || 0;
        return this.substr(position, searchString.length) === searchString;
    };
}
MauticVars.activeRequests = 0;
mQuery.ajaxSetup({
    beforeSend: function (request, settings) {
        if (settings.showLoadingBar) {
            mQuery('.loading-bar').addClass('active');
            MauticVars.activeRequests++;
        }
        if (typeof IdleTimer != 'undefined') {
            var userLastActive = IdleTimer.getLastActive();
            var queryGlue = (settings.url.indexOf("?") == -1) ? '?' : '&';
            settings.url = settings.url + queryGlue + 'mauticUserLastActive=' + userLastActive;
        }
        if (mQuery('#mauticLastNotificationId').length) {
            var queryGlue = (settings.url.indexOf("?") == -1) ? '?' : '&';
            settings.url = settings.url + queryGlue + 'mauticLastNotificationId=' + mQuery('#mauticLastNotificationId').val();
        }
        if (settings.type == 'POST') {
            request.setRequestHeader('X-CSRF-Token', mauticAjaxCsrf);
        }
        return true;
    }, cache: false
});
mQuery(document).ajaxComplete(function (event, xhr, settings) {
    xhr.always(function (response) {
        if (response.flashes) Mautic.setFlashes(response.flashes);
    });
});
mQuery(document).ajaxStop(function (event) {
    MauticVars.activeRequests = 0;
});
mQuery(document).ready(function () {
    if (typeof mauticContent !== 'undefined') {
        mQuery("html").Core({console: false});
    }
    if (typeof IdleTimer != 'undefined') {
        IdleTimer.init({
            idleTimeout: 60000,
            awayTimeout: 900000,
            statusChangeUrl: mauticAjaxUrl + '?action=updateUserStatus'
        });
    }
    mQuery(document).on('keydown', function (e) {
        if (e.which === 8 && !mQuery(e.target).is("input:not([readonly]):not([type=radio]):not([type=checkbox]), textarea, [contentEditable], [contentEditable=true]")) {
            e.preventDefault();
        }
    });
});
MauticVars.manualStateChange = true;
if (typeof History != 'undefined') {
    History.Adapter.bind(window, 'statechange', function () {
        if (MauticVars.manualStateChange == true) {
            window.location.reload();
        }
        MauticVars.manualStateChange = true;
    });
}
MauticVars.iconClasses = {};
MauticVars.routeInProgress = '';
MauticVars.moderatedIntervals = {};