<div id="footerSlideContainer">      
<div id="footerSlideButton" style="background-position: right top;">
	<div class="hotline_fix"><?=$company['dienthoai']?></div>
    <div class="click_fb"></div>
</div>  
<div id="footerSlideContent" style="height: 0px;">        
<div id="footerSlideText">
<div class="fb-page fb_iframe_widget" data-href="<?=$company['fanpage']?>" data-width="255" data-height="320" data-tabs="messages" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=251&amp;height=320&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fhongsoan1006%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=messages&amp;width=255"><span style="vertical-align: bottom; width: 251px; height: 320px;"><iframe name="fbe495b50ea3b8" width="255px" height="320px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.4/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FRQ7NiRXMcYA.js%3Fversion%3D42%23cb%3Df1d004bc826a0dc%26domain%3Ds-shop.vn%26origin%3Dhttp%253A%252F%252Fs-shop.vn%252Ff2168c5a6ce5e3%26relation%3Dparent.parent&amp;container_width=251&amp;height=320&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fhongsoan1006%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=messages&amp;width=255" style="border: none; visibility: visible; width: 251px; height: 320px;" class=""></iframe></span></div>
</div>
</div>    
</div>

<style>
div.click_fb
{
	position:absolute;
	bottom:0;
	left:0;
	right:0;
	width:100%;
	height:73px;
	 background: url(images/fb_chat.png) no-repeat;
}
#footerSlideContainer {
bottom: 0;
position:fixed;
right: 0;
width: 260px;
z-index: 999999;
}
#footerSlideButton {
border: medium none;
cursor: pointer;
height: 120px;
position: absolute;
right: -77px;
top: -115px;
width: 260px;
z-index:9;
}
#footerSlideButton span{
margin: 20px 20px 0 80px;
color: #fff;
font-size: 16px;
position: absolute;
}
#footerSlideButton span p {
margin-left: 126px;
margin-top: 10px;
color: #FDF03E !important;
font-size: 19px;
position: absolute;
}
#footerSlideContent {
-moz-border-bottom-colors: none;
-moz-border-left-colors: none;
-moz-border-right-colors: none;
-moz-border-top-colors: none;
background: none repeat scroll 0 0 #FFF;
border-color: #006795 -moz-use-text-color #006795 #006795;
border-image: none;
border-style: solid none solid solid;
border-width: 1px medium medium 1px;
bottom: -5px;
color: #EEE;
height: 340px;
position: relative;
width: 100%;
overflow: hidden;
border-radius: 0px 0px 0px 0px;
-moz-border-radius: 15px 0px 0px 0px;
}
#footerSlideContent > h3 {
color: #9AC941;
font-size: 36px;
margin: 10px 0;
}
#footerSlideContent > ul {
color: #EE8D40;
line-height: 2em;
list-style-type: none;
}
#footerSlideText {
color: #FFF;
font-size: 11px;
padding: 5px 4px 5px;
}
#footerSlideText .note {
color: red;
left: 20px;
position: relative;
}
#footerSlideText .line {
height: 2px;
margin: 12px auto;
width: 95%;
}
#footerSlideText .titles {
color: #fff;
font-size: 14px;
font-weight: bold;
text-transform: uppercase;
}
#footerSlideText ul {
list-style: none outside none;
margin: 10px 0 0 20px;
padding: 0;
width: 294px;
}
#footerSlideText ul li {
background: none repeat scroll 0 0 transparent;
color: #fff;
font-size: 16px;

list-style: none outside none;
margin-top: 8px;
padding: 0;
}
#footerSlideText ul li .left {
display: inline-block;
width: 125px;
}
#footerSlideText ul li .right {
display: inline-block;
width: auto;
}
.SkypeButton_Chat{
float:left;
margin-right:5px;   
}
.SkypeButton_Chat img{
vertical-align:middle !important;
margin:0px !important;
}

</style>
<script type="text/javascript">
	$(document).ready(function() {
	var d=false;
	$("#footerSlideContent").animate({height:"0px"});   
	$(".click_fb").click(function(){
	if(d==false){
	
	$("#footerSlideContent").animate({height:"340px"});                 
	d=true;
	}else{
	$("#footerSlideContent").animate({height:"0px"});                   
	d=false;
	}
	})
	});     
</script> 