var allowedTags = ["code", "span", "div", "label", "a", "br", "p", "b", "i", "del", "strike", "u",
    "img", "video", "audio", "iframe", "object", "embed", "param", "blockquote",
    "mark", "cite", "small", "ul", "ol", "li", "hr", "dl", "dt", "dd", "sup", "sub",
    "big", "pre", "code", "figure", "figcaption", "strong", "em", "table", "tr", "td",
    "th", "tbody", "thead", "tfoot", "h1", "h2", "h3", "h4", "h5", "h6", "center"];

function exampleClickToEditPage()
{
    $('.content').redactor({
        imageUpload:'/shop/admin/product/imageUpload/attr',
        imageGetJson:'/shop/admin/product/imageList/attr',
        imageUploadErrorCallback:function(obj,json) { alert(json.error); },
        focus: true,
        convertDivs: false,
        allowedTags: allowedTags,
        lang: 'ru'});
}

function exampleClickToSavePage()
{
    // save content if you need
    var newsid = $('.content').attr('id').substr(7);

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {
            'id': newsid,
            'html': $('.content').redactor('get')
        },
        url: '/admin/news/savecontent'
    });

    // destroy editor
    $('.content').redactor('destroy');
}

function exampleClickToEditNews()
{
    $('.introtext').redactor({
        imageUpload:'/admin/news/imageUpload/attr',
        imageGetJson:'/admin/news/imageList/attr',
        imageUploadErrorCallback:function(obj,json) { alert(json.error); },
        focus: true,
        convertDivs: false,
        allowedTags: allowedTags,
        lang: 'ru'});

    $('.fulltext').redactor({
        imageUpload:'/admin/page/imageUpload/attr',
        imageGetJson:'/admin/page/imageList/attr',
        imageUploadErrorCallback:function(obj,json) { alert(json.error); },
        focus: true,
        convertDivs: false,
        allowedTags: allowedTags,
        lang: 'ru'});
}

function exampleClickToSaveNews()
    {
        // save content if you need
        var intro = $('.introtext').redactor('get');
        var full = $('.fulltext').redactor('get');
        var newsid = $('.introtext').attr('id').substr(9);


        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
                'id': newsid,
                'intro': intro,
                'full': full
            },
            url: '/admin/news/savenews'
        });

        // destroy editor
        $('.introtext').redactor('destroy');
        $('.fulltext').redactor('destroy');
    }


function clickToEditProduct()
    {
        $('.characters').redactor({
            imageUpload:'/shop/admin/product/imageUpload/attr',
            imageGetJson:'/shop/admin/product/imageList/attr',
            imageUploadErrorCallback:function(obj,json) { alert(json.error); },
            focus: true,
            convertDivs: false,
            allowedTags: allowedTags,
            lang: 'ru'});
    }

function clickToSaveProduct()
{
    // save content if you need
    var characters = $('.characters').redactor('get');;
    var id = $('.characters').attr('id').substr(2);


    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {
            'id': id,
            'characters': characters
        },
        url: '/shop/admin/product/savecharacters'
    });

    // destroy editor
    $('.characters').redactor('destroy');
}