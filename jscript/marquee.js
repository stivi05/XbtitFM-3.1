var oMarquees = [], oMrunning,
        oMInterv =        20,     //interval between increments
        oMStep =          1,      //number of pixels to move between increments
        oStopMAfter =     0,     //how many seconds should marquees run (0 for no limit)
        oResetMWhenStop = false,  //set to true to allow linewrapping when stopping
        oMDirection =     'left'; //'left' for LTR text, 'right' for RTL text
 
/***     Do not edit anything after here     ***/
function doMStop() {
        clearInterval(oMrunning);
        for( var i = 0; i < oMarquees.length; i++ ) {
                oDiv = oMarquees[i];
                if( oResetMWhenStop ) {
                        oDiv.mchild.style.cssText = oDiv.mchild.style.cssText.replace(/;white-space:nowrap;/g,'');
                        oDiv.mchild.style.whiteSpace = '';
                        oDiv.style.height = '';
                        oDiv.style.overflow = '';
                        oDiv.style.position = '';
                        oDiv.mchild.style.position = '';
                        oDiv.mchild.style.top = '';
                }
        }
        oMarquees = [];
}
function doDMarquee() {
        if( oMarquees.length || !document.getElementsByTagName ) { return; }
        var oDivs = document.getElementsByTagName('div');
        for( var i = 0, oDiv; i < oDivs.length; i++ ) {
                oDiv = oDivs[i];
                if( oDiv.className && oDiv.className.match(/\bdmarquee\b/) ) {
                        if( !( oDiv = oDiv.getElementsByTagName('div')[0] ) ) { continue; }
                        if( !( oDiv.mchild = oDiv.getElementsByTagName('div')[0] ) ) { continue; }
                        oDiv.mchild.style.cssText += ';white-space:nowrap;';
                        oDiv.mchild.style.whiteSpace = 'nowrap';
                        oDiv.style.height = oDiv.offsetHeight + 'px';
                        oDiv.style.overflow = 'hidden';
                        oDiv.style.position = 'relative';
                        oDiv.mchild.style.position = 'absolute';
                        oDiv.mchild.style.top = '0px';
                        oDiv.mchild.style[oMDirection] = (oDiv.mchild.style[oMDirection] == '')?(oDiv.offsetWidth + 'px'):oDiv.mchild.style[oMDirection];
                        oMarquees[oMarquees.length] = oDiv;
                        i += 2;
                }
        }
        oMrunning = setInterval('aniMarquee()',oMInterv);
        if( oStopMAfter ) { setTimeout('doMStop()',oStopMAfter*1000); }
}
function aniMarquee() {
        var oDiv, oPos;
        for( var i = 0; i < oMarquees.length; i++ ) {
                oDiv = oMarquees[i].mchild;
                oPos = parseInt(oDiv.style[oMDirection]);
                if( oPos <= -1 * oDiv.offsetWidth ) {
                        oDiv.style[oMDirection] = oMarquees[i].offsetWidth + 'px';
                } else {
                        oDiv.style[oMDirection] = ( oPos - oMStep ) + 'px';
                }
        }
}
if( window.addEventListener ) {
        window.addEventListener('load',doDMarquee,false);
} else if( document.addEventListener ) {
        document.addEventListener('load',doDMarquee,false);
} else if( window.attachEvent ) {
        window.attachEvent('onload',doDMarquee);
}