/*	Создаем и регистрируем объект Weather	*/
var ImportMgr = function(config) {
    config = config || {};
    ImportMgr.superclass.constructor.call(this, config);
};

Ext.extend(ImportMgr, Ext.Component,{
    page:{}, window:{}, grid:{}, tree:{}, panel:{}, combo:{}, config:{}
});

Ext.reg('ImportMgr', ImportMgr);

/*	Запускем	*/
ImportMgr = new ImportMgr();
