/*	for widget chooser */
Array.prototype.max = function() {
	var max = this[0];
	var len = this.length;
	for (var i = 1; i < len; i++) if (this[i] > max) max = this[i];
	return max;
}
Array.prototype.min = function() {
	var min = this[0];
	var len = this.length;
	for (var i = 1; i < len; i++) if (this[i] < min) min = this[i];
	return min;
}
function calcMaxHeight() {
	$jui('#left-content').css('height', 'auto');
	$jui('#center-content').css('height', 'auto');
	$jui('#right-content').css('height', 'auto');
	checkMaxHeight();
}
function checkMaxHeight() {
	var lh = parseInt($jui('#left-content').height());
	var ch = parseInt($jui('#center-content').height());
	var rh = parseInt($jui('#right-content').height());
	var heightArray = [lh,ch,rh];
	//console.log("Array : " + heightArray);
	var maxHeight = heightArray.max() + 20;
	//console.log("Max : " + maxHeight);
	$jui('#left-content').css('height', maxHeight);
	$jui('#center-content').css('height', maxHeight);
	$jui('#right-content').css('height', maxHeight);	
}

function checkWidget() {
	var centerCookie = $jui.cookie('cookie-center-content');
	var leftCookie = $jui.cookie('cookie-left-content');
	var rightCookie = $jui.cookie('cookie-right-content');
	
	if (centerCookie == null || leftCookie == null || rightCookie == null) {
		reloadAllOrder();
	}
	
	checkCookieInput(centerCookie);
	checkCookieInput(leftCookie);
	checkCookieInput(rightCookie);
}

function checkCookieInput(cookie) {
	if (cookie == null) { return; }
    var IDs = cookie.split(",");
    for (var i = 0, n = IDs.length; i < n; i++ ) {
        var toks = IDs[i].split(":");
        if ( toks.length != 2 ) {
            continue;
        }
        var portletID = toks[0];
        var visible = toks[1]
        var portlet = $jui(".widget-list").find('.' + portletID).attr('checked','checked');
        if (visible === 'false') {
        	$jui(".widget-list").find('.' + portletID).removeAttr('checked','checked');
        }
    }
}
function hideCookieBar(state) {
	state = $jui(state).attr('rel');
	if (state==0) {
		$jui('#widget-wrapper-list').slideUp(function() {
			$('input#hideCookieBar').attr({
				'rel':'1',
				'value':'แสดง'
			});
		});
	} else if (state==1) {
		$jui('#widget-wrapper-list').slideDown(function() {
			$jui('#widget-wrapper-list').css('display','block');
			$('input#hideCookieBar').attr({
				'rel':'0',
				'value':'ซ่อน'
			});
		});
	}
	/*
	$jui('#widget-wrapper-list').slideToggle(function() {
		if ($jui('#widget-wrapper-list').is(':visible') == true) {
			
		} else {
			$('input#hideCookieBar').attr('value','แสดง');
		}	
	});
	*/
}
function checkCookieBar() {
	$("#widget-chooser input[type='checkbox']").each(function(index, value) {
		var colid = $(value).attr('class');
		var state = $(value).attr('checked');
		if (state == false) {
			$jui("#" + colid).hide();
		} else {
			$jui("#" + colid).show();
		}
	});
	sideSaveOrder();
	centerSaveOrder();
}

// function that writes the list order to a cookie
function sideSaveOrder() {
    $jui(".sidewidget").each(function(index, value){
        var colid = value.id;
        var cookieName = "cookie-" + colid;
        // Get the order for this column.
        var order = $jui('#' + colid).sortable("toArray");
        // For each portlet in the column
        for ( var i = 0, n = order.length; i < n; i++ ) {
            // Determine if it is 'opened' or 'closed'
            var v = $jui('#' + order[i] ).find('.content').is(':visible');
            // Modify the array we're saving to indicate what's open and
            //  what's not.
            order[i] = order[i] + ":" + v;
        }
        $jui.cookie(cookieName, order, { path: "/", expiry: new Date(2015, 1, 1)});
    });
}

// function that restores the list order from a cookie
function sideRestoreOrder() {
    $jui(".sidewidget").each(function(index, value) {
        var colid = value.id;
        var cookieName = "cookie-" + colid
        var cookie = $jui.cookie(cookieName);
        if ( cookie == null ) { return; }
        var IDs = cookie.split(",");
        for (var i = 0, n = IDs.length; i < n; i++ ) {
            var toks = IDs[i].split(":");
            if ( toks.length != 2 ) {
                continue;
            }
            var portletID = toks[0];
            var visible = toks[1]
            var portlet = $jui(".all-widget").find('#' + portletID).appendTo($jui('#' + colid));
            if (visible === 'false') {
            	$jui('#' + portletID).hide();
            } else {
            	$jui('#' + portletID).show();
            }
        }
    });
}


//function that writes the list order to a cookie
function centerSaveOrder() {
    $jui(".centerwidget").each(function(index, value){
        var colid = value.id;
        var cookieName = "cookie-" + colid;
        // Get the order for this column.
        var order = $jui('#' + colid).sortable("toArray");
        // For each portlet in the column
        for ( var i = 0, n = order.length; i < n; i++ ) {
            // Determine if it is 'opened' or 'closed'
            var v = $jui('#' + order[i] ).find('.content').is(':visible');
            // Modify the array we're saving to indicate what's open and
            //  what's not.
            order[i] = order[i] + ":" + v;
        }
        $jui.cookie(cookieName, order, { path: "/", expiry: new Date(2015, 1, 1)});
    });
}

// function that restores the list order from a cookie
function centerRestoreOrder() {
    $jui(".centerwidget").each(function(index, value) {
        var colid = value.id;
        var cookieName = "cookie-" + colid
        var cookie = $jui.cookie(cookieName);
        if ( cookie == null ) { return; }
        var IDs = cookie.split(",");
        for (var i = 0, n = IDs.length; i < n; i++ ) {
            var toks = IDs[i].split(":");
            if ( toks.length != 2 ) {
                continue;
            }
            var portletID = toks[0];
            var visible = toks[1]
            var portlet = $jui(".all-widget").find('#' + portletID).appendTo($jui('#' + colid));
            if (visible === 'false') {
            	$jui('#' + portletID).hide();
            } else {
            	$jui('#' + portletID).show();
            }
        }
    });
}

function selectParent(element) {
	var closeElement = $(element).parent().parent().parent();
	$(closeElement).css('display','none');
	sideSaveOrder();
	centerSaveOrder();
	checkWidget();
}

function saveOrderAll() {
	centerSaveOrder();
	sideSaveOrder();
	calcMaxHeight();
}

function reloadAllOrder() {
	resetOrder();
	centerRestoreOrder();
	sideRestoreOrder();
	checkWidget();
	calcMaxHeight();
}

function resetOrder() {
	$jui.cookie('cookie-center-content', 'block-views-front_promotion_block-block_1:true,block-quicktabs-4:true,block-quicktabs-3:true,block-views-front_gallery_block-block_1:true,block-views-front_gallery_block-block_2:true', { path: "/", expiry: new Date(2015, 1, 1)});
	$jui.cookie('cookie-left-content', 'block-block-4:true,block-block-5:true,block-block-14:true,block-webformblock-5610:true', { path: "/", expiry: new Date(2015, 1, 1)});
	$jui.cookie('cookie-right-content', 'block-block-15:true,block-poll-0:true,block-searchcloud-0:true,block-block-19:true', { path: "/", expiry: new Date(2015, 1, 1)});
}

// init
$jui(function() {
	$jui("#right-content .block, #center-content .block, #left-content .block").each(function(i) {
		if($(this).attr('id')!='block-block-4') {
			$(this).find('div.content:eq(0)').css('position','relative');
			$(this).find('div.content:eq(0)').prepend('<div class="ui-widget-close"><a href="#' + $(this).attr('id') + '" class="close-btn" onclick="selectParent(this); return false;">x</a></div>');
		}
	});

	// For left and right content
    $jui(".sidewidget").sortable({
        connectWith: ['.sidewidget', '.centerwidget'],
		cursor: 'pointer',
        opacity: 0.5,
        stop: function() { saveOrderAll(); },
        cancel: '#block-block-4'
    });
	$jui("#right-content .block").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
	$jui("#left-content .block").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
	sideRestoreOrder();
	
	// For center content
    $jui(".centerwidget").sortable({
        connectWith: ['.sidewidget', '.centerwidget'],
        opacity: 0.5,
		cursor: 'pointer',
        stop: function() { saveOrderAll(); }
    });
	$jui("#center-content .block").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
	centerRestoreOrder();
	checkWidget();
	checkMaxHeight();	
});// JavaScript Document