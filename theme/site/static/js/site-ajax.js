$(function(){
    if(!window.SITE_AJAX)
        return console.log('Site ajax `SITE_AJAX` not configured');

    let noop = function(){};

    $('.site-ajax').each(function(i,e){
        let $e = $(e);
        let target = window.SITE_AJAX.route.replace('#NAME#', $e.data('name'));
        let cb = $e.data('callback') || noop;
        let placement = $e.data('placement');

        if(typeof cb === 'string')
            cb = window[cb];
        
        $.get(target, function(res){
            if(!res)
                return cb();

            let el = $(res);

            switch(placement){
                case 'after':
                    $e.after(el);
                    break;
                case 'append':
                    $e.append(el);
                    break;
                case 'before':
                    $e.before(el);
                    break;
                case 'replace':
                    $e.replaceWith(el);
                    break;
                case 'truncate':
                    $e.html('');
                    $e.append(el);
                    break;
            }

            cb(el);
        })
    })
})