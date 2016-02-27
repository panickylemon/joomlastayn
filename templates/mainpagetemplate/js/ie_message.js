jQuery(function($){
    $.reject({
        reject: {
            msie5: true,
            msie6: true,
            msie7: true,
            msie8: true
        },
        display: ['opera', 'firefox', 'chrome'],
        header: 'Используемый браузер устарел',
        paragraph1: 'Internet Explorer версий 5, 6, 7, 8 больше не поддерживается.',
        paragraph2: 'Пожалуйста, установите любой из этих браузеров, кликнув на картинку:',
        closeLink: 'Закрыть',
        closeMessage: 'Нормальная работа сайта в устаревших браузерах не гарантируется.',
        closeESC: true,
        imagePath: '/joomlastayn/templates/mytemplate/images/img_ie/'
    });


});
