+function ($) {
    "use strict";

    var GitReposManager = function () {

        this.updateRepo = function (recordId) {
            var newPopup = $('<a />');
            newPopup.popup({
                handler: 'onUpdateRepo',
                extraData: {
                    'id': recordId
                }
            });
        };

        this.createRepo = function () {
            var newPopup = $('<a />');
            newPopup.popup({ handler: 'onCreateRepo' });
        };

    }

    $.gitreposmanager = new GitReposManager();

}(window.jQuery);