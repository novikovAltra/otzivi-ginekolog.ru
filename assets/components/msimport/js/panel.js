ImportMgr.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false,
        baseCls: 'modx-formpanel',
        id:"importMgr-Panel",
        items: [{
		html: '<h2>Импорт</h2>',
		border: false,
		cls: 'modx-page-header'
	    },
	    {
		xtype: 'modx-tabs',
		bodyStyle: 'padding: 10px',
		defaults: { border: false, autoHeight: true },
		border: true,
		stateful: true,
		stateId: 'weather-tabpanel',
		stateEvents: ['tabchange'],
		getState : function() {
		    return { activeTab:this.items.indexOf(this.getActiveTab()) };
		},
		items: [
		    {
			title: 'Импорт',
			defaults: { autoHeight: true },
			items: [{
			    xtype: 'modx-formpanel',
			    id: 'ImportMgr-uploadForm',
			    url: ImportMgr.config.connector_url,
			    action: 'mgr/importMgr.fileUpload',
			    fileUpload: true,
			    frame: true,
			    items:[
				{
				    html: '<p>Выберите файл для импорта</p><br />',
				    border: false
				},

				{
				    xtype: 'fileuploadfield',
				    emptyText: '',
				    fieldLabel: 'Выберите файл для импорта',
				    name: 'userfile',
				    buttonText: 'Выбрать файл',
				    buttonCfg: {
					iconCls: 'upload-icon'
				    }
				},
				{
				    xtype: 'button',
				    id: 'ImportMgr-uploadButton',
				    text: 'Загрузить',
				    listeners: {
					'click': {fn: this.fileUpload}
				    }
				}
			    ],
			    listeners: {
				'submit': {fn: this.ololo}
			    }
			}],
			bbar: [
			]
		    },
		    /*{
			title: 'История импорта',
			defaults: { autoHeight: true },
			items: [
			    {
				html: '<p>Здесь можно забабахать описание раздела.</p><br />',
				border: false
			    }
			]
		    }*/
		]
	    }
        ]
    });
    ImportMgr.panel.Home.superclass.constructor.call(this,config);
};
/*	Регистрируем панель, чтобы ее мог потом вызвать предыдущий скрипт	*/





var test;
Ext.extend(ImportMgr.panel.Home, MODx.Panel,{
        fileUpload: function() {
            Ext.Msg.wait('Файл загружается', 'Подождите');
            test= this.ownerCt.getForm().submit({
                url: ImportMgr.config.connector_url,
                params: {
                    action: 'mgr/importMgr.fileUpload'
                },
                success: function(fp, o){
                    Ext.Msg.hide();
                    MODx.msg.alert('Success', 'Processed file');

                    var data=Ext.decode(o.result.message);
                    MODx.importMgrData={
                        filename: data.name,
                        total: 1,
                        position:1,
			page: 0
                    };
                    fileCheck();
                },
                failure: function(fp,o){
                    Ext.Msg.hide();
                    test=o;
                    MODx.msg.alert('Файл не загружен', o.result.message);
                }
            });
        }
    }
);


function fileCheck(){

    if(MODx.importMgrData.total<=0){
        MODx.msg.alert('Файл не загружен', "Пустой или поврежденный файл");
    }
    Ext.Msg.wait('Проверка формата файла... ', 'Подождите');

    MODx.Ajax.request({
        url: ImportMgr.config.connector_url,
        params: {
            action: 'mgr/importMgr.fileCheck',
            filename: MODx.importMgrData.filename
        },
        listeners: {
            success: { fn: function(r) {
                test= r.message;
                Ext.Msg.hide();
                var data=Ext.decode(r.message);
		if(data.error){
		    MODx.msg.alert('Ошибка', data.error);
		}
		else{
		    MODx.importMgrData.total= data.count;
		    MODx.importMgrData.add=0;
		    MODx.importMgrData.change=0;
		    MODx.importMgrData.page=0;
		    fileProcess();
		}
            }, scope:this },
            failure: { fn: function(r){
                Ext.Msg.hide();
                MODx.msg.alert('Файл не прошел проверку', r.message);
            },scope:this}
        }
    });
}

function fileProcess(){
    MODx.importMgrData;
    Ext.Msg.wait('Файл обрабатывается... Лист '+(+MODx.importMgrData.page + 1)+' из '+MODx.importMgrData.total + ' Обработано строк '+MODx.importMgrData.position, 'Подождите');
    MODx.Ajax.request({
        url: ImportMgr.config.connector_url,
        params: {
            action: 'mgr/importMgr.fileProcess',
            filename: MODx.importMgrData.filename,
            position: MODx.importMgrData.position,
            page: MODx.importMgrData.page,
            total: MODx.importMgrData.total
        },
        listeners: {
            'success': { fn: function(r) {
                MODx.importMgrData.position = 1;
                var data=Ext.decode(r.message);
		if(data.error){
		    Ext.Msg.hide();
		    MODx.msg.alert('Ошибка', data.error);
		}
		else{
		    MODx.importMgrData.position=parseInt(data.position) + 1;
		    MODx.importMgrData.add+=data.add;
		    MODx.importMgrData.change+=data.change;
		    MODx.importMgrData.page=data.page;
		    console.log(r.message);

		    if(MODx.importMgrData.page<MODx.importMgrData.total && !data.endImport)
			fileProcess();
		    else{
			Ext.Msg.hide();
			var message="";
			message+="Добавлено: "+MODx.importMgrData.add+"<br />";
			message+="Обновлено: "+MODx.importMgrData.change+"<br />";
			message+="Информацию об ошибках Вы можете посмотреть в журнале ошибок MODX<br />";
			//message+="Не изменено: "+MODx.importMgrData.pass+"";
			MODx.msg.alert('Импорт завершен', message);
		    }

		    test= r.message;
		}
            }, scope:this },
            failure: { fn: function(r){
		console.log('запрос к mgr/importMgr.fileProcess не прошел - '+r.message);
            },scope:this}
        }
    });
}

Ext.reg('ImportMgr-panel-home', ImportMgr.panel.Home);
