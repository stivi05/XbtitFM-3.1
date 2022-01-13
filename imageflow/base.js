var conf_reflection_p = 0.5;
var conf_focus = 4;
var conf_slider_width = 14;
var conf_images_cursor = 'pointer';
var conf_slider_cursor = 'default';
var conf_imageflow = 'if';
var conf_loading = 'loading';
var conf_images = 'images';
var conf_captions = 'captions';
var conf_scrollbar = 'scrollbar';
var conf_slider = 'slider';
var caption_id = 0;
var new_caption_id = 0;
var current = 0;
var target = 0;
var mem_target = 0;
var timer = 0;
var array_images = new Array();
var new_slider_pos = 0;
var dragging = false;
var dragobject = null;
var dragx = 0;
var posx = 0;
var new_posx = 0;
var xstep = 150;
function step()
{
switch (target < current-1 || target > current+1)
{
case true:
moveTo(current + (target-current)/3);
window.setTimeout(step, 50);
timer = 1;
break;
default:
timer = 0;
break;
}
}
function glideTo(x, new_caption_id)
{	target = x;
mem_target = x;
if (timer == 0)
{
window.setTimeout(step, 50);
timer = 1;
}
caption_id = new_caption_id;
caption = img_div.childNodes.item(array_images[caption_id]).getAttribute('alt');
if (caption == '') caption = '&nbsp;';
caption_div.innerHTML = caption;
if (dragging == false)
{
new_slider_pos = (scrollbar_width * (-(x*100/((max-1)*xstep))) / 100) - new_posx;
slider_div.style.marginLeft = (new_slider_pos - conf_slider_width) + 'px';
}
}
function moveTo(x)
{
current = x;
var zIndex = max;
for (var index = 0; index < max; index++)
{
var image = img_div.childNodes.item(array_images[index]);
var current_image = index * -xstep;
if ((current_image+max_conf_focus) < mem_target || (current_image-max_conf_focus) > mem_target)
{
image.style.visibility = 'hidden';
image.style.display = 'none';
}
else
{
var z = Math.sqrt(10000 + x * x) + 100;
var xs = x / z * size + size;
image.style.display = 'block';
var new_img_h = (image.h / image.w * image.pc) / z * size;
switch ( new_img_h > max_height )
{
case false:
var new_img_w = image.pc / z * size;
break;
default:
new_img_h = max_height;
var new_img_w = image.w * new_img_h / image.h;
break;
}
var new_img_top = (images_width * 0.34 - new_img_h) + images_top + ((new_img_h / (conf_reflection_p + 1)) * conf_reflection_p);
image.style.left = xs - (image.pc / 2) / z * size + images_left + 'px';
image.style.height = new_img_h + 'px';
image.style.width = new_img_w + 'px';
image.style.top = new_img_top + 'px';
image.style.visibility = 'visible';
switch ( x < 0 )
{
case true:
zIndex++;
break;
default:
zIndex = zIndex - 1;
break;
}
switch ( image.i == caption_id )
{
case false:
image.onclick = function() { glideTo(this.x_pos, this.i); }
break;
default:
zIndex = zIndex + 1;
image.onclick = function() { top.document.location = this.url; }
break;
}
image.style.zIndex = zIndex;
}
x += xstep;
}
}
function refresh(onload)
{
imageflow_div = document.getElementById(conf_imageflow);
img_div = document.getElementById(conf_images);
scrollbar_div = document.getElementById(conf_scrollbar);
slider_div = document.getElementById(conf_slider);
caption_div = document.getElementById(conf_captions);
images_width = img_div.offsetWidth;
images_top = imageflow_div.offsetTop;
images_left = imageflow_div.offsetLeft;
max_conf_focus = conf_focus * xstep;
size = images_width * 0.5;
scrollbar_width = images_width * 0.6;
conf_slider_width = conf_slider_width * 0.5;
max_height = images_width * 0.51;
imageflow_div.style.height = max_height + 'px';
img_div.style.height = images_width * 0.338 + 'px';
caption_div.style.width = images_width + 'px';
caption_div.style.marginTop = images_width * 0.03 + 'px';
scrollbar_div.style.marginTop = images_width * 0.02 + 'px';
scrollbar_div.style.marginLeft = images_width * 0.2 + 'px';
scrollbar_div.style.width = scrollbar_width + 'px';
slider_div.onmousedown = function () { dragstart(this); };
slider_div.style.cursor = conf_slider_cursor;
max = img_div.childNodes.length;
var i = 0;
for (var index = 0; index < max; index++)
{
var image = img_div.childNodes.item(index);
if (image.nodeType == 1)
{
array_images[i] = index;
image.onclick = function() { glideTo(this.x_pos, this.i); }
image.x_pos = (-i * xstep);
image.i = i;
if(onload == true)
{
image.w = image.width;
image.h = image.height;
}
switch ((image.w + 1) > (image.h / (conf_reflection_p + 1)))
{
case true:
image.pc = 118;
break;
default:
image.pc = 100;
break;
}
image.url = image.getAttribute('longdesc');
image.ondblclick = function() { top.document.location = this.url; }
image.style.cursor = conf_images_cursor;
i++;
}
}
max = array_images.length;
moveTo(current);
glideTo(current, caption_id);
}
function show(id)
{
var element = document.getElementById(id);
element.style.visibility = 'visible';
}
function hide(id)
{
var element = document.getElementById(id);
element.style.visibility = 'hidden';
element.style.display = 'none';
}
window.onload = function()
{
if(document.getElementById(conf_imageflow))
{
hide(conf_loading);
refresh(true);
show(conf_images);
show(conf_scrollbar);
initMouseWheel();
initMouseDrag();
}
}
window.onresize = function()
{
if(document.getElementById(conf_imageflow)) refresh();
}
function handle(delta)
{
var change = false;
switch (delta > 0)
{
case true:
if(caption_id >= 1)
{
target = target + xstep;
new_caption_id = caption_id - 1;
change = true;
}
break;
default:
if(caption_id < (max-1))
{
target = target - xstep;
new_caption_id = caption_id + 1;
change = true;
}
break;
}
if (change == true)
{
glideTo(target, new_caption_id);
}
}
function wheel(event)
{
var delta = 0;
if (!event) event = window.event;
if (event.wheelDelta)
{
delta = event.wheelDelta / 120;
}
else if (event.detail)
{
delta = -event.detail / 3;
}
if (delta) handle(delta);
if (event.preventDefault) event.preventDefault();
event.returnValue = false;
}
function initMouseWheel()
{
if(window.addEventListener) imageflow_div.addEventListener('DOMMouseScroll', wheel, false);
imageflow_div.onmousewheel = wheel;
}
function dragstart(element)
{
dragobject = element;
dragx = posx - dragobject.offsetLeft + new_slider_pos;
}
function dragstop()
{
dragobject = null;
dragging = false;
}
function drag(e)
{
posx = document.all ? window.event.clientX : e.pageX;
if(dragobject != null)
{
dragging = true;
new_posx = (posx - dragx) + conf_slider_width;
if(new_posx < ( - new_slider_pos)) new_posx = - new_slider_pos;
if(new_posx > (scrollbar_width - new_slider_pos)) new_posx = scrollbar_width - new_slider_pos;
var slider_pos = (new_posx + new_slider_pos);
var step_width = slider_pos / ((scrollbar_width) / (max-1));
var image_number = Math.round(step_width);
var new_target = (image_number) * -xstep;
var new_caption_id = image_number;
dragobject.style.left = new_posx + "px";
glideTo(new_target, new_caption_id);
}
}
function initMouseDrag()
{
document.onmousemove = drag;
document.onmouseup = dragstop;
}
function getKeyCode(event)
{
event = event || window.event;
return event.keyCode;
}
document.onkeydown = function(event)
{
var charCode  = getKeyCode(event);
switch (charCode)
{
case 39:
handle(-1);
break;
case 37:
handle(1);
break;
}
}