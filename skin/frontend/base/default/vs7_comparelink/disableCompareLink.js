(function ($, window, undefined) {
    $(document).ready(function () {
        $('.top-link-compare').on('click', function () {
            if ($(this).hasClass('no-click')) {
                return false;
            }
        })
    });
}(jQuery, window));