ImportMgr.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'ImportMgr-panel-home'
            ,renderTo: 'importMgr-main-div'
        }]
    });
    ImportMgr.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(ImportMgr.page.Home,MODx.Component);
Ext.reg('ImportMgr-page-home', ImportMgr.page.Home);


var panel;
Ext.onReady(function() {
    MODx.load({ xtype: 'ImportMgr-page-home'});
});