<div id="cfacebook">
    <a  class="chat_fb" onclick="return:false;"></a>
    <div class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="<?=$company['fanpage']?>" data-width="256" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
    </div>
</div>
<style>#cfacebook{position:fixed;bottom:0px;right:0px;z-index:999999999999999;width:256px;height:auto;border-top-left-radius:5px;border-top-right-radius:5px;overflow:hidden;}#cfacebook .fchat{float:left;width:100%;height:270px;overflow:hidden;display:none;background-color:#fff;}#cfacebook .fchat .fb-page{margin-top:-130px;float:left;}#cfacebook a.chat_fb{float:left;padding:0 25px;width:256px;color:#fff;text-decoration:none;height:40px;line-height:40px;background:url(images/fanpage.png) no-repeat right center;border:0;z-index:9999999;font-size:18px;}#cfacebook a.chat_fb:hover{color:yellow;text-decoration:none;}</style>
