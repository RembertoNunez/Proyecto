function heartbeat(){
   setTimeout(function(){
      $.ajax({ url: "http://example.com/api/heartbeat", cache: false,
      success: function(data){
        //Next beat
        heartbeat();
      }, dataType: "json"});
  }, 10000);//10secs
}

$(document).ready(function(){
    heartbeat();
});