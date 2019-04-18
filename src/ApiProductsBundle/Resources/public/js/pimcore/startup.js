pimcore.registerNS("pimcore.plugin.SynoaApiTagsBundle");

pimcore.plugin.SynoaApiTagsBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.SynoaApiTagsBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("SynoaApiTagsBundle ready!");
    }
});

var SynoaApiTagsBundlePlugin = new pimcore.plugin.SynoaApiTagsBundle();
