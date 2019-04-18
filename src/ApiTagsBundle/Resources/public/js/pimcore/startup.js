pimcore.registerNS("pimcore.plugin.ApiTagsBundle");

pimcore.plugin.ApiTagsBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.ApiTagsBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("ApiTagsBundle ready!");
    }
});

var ApiTagsBundlePlugin = new pimcore.plugin.ApiTagsBundle();
