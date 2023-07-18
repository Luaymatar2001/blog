
import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

window.Echo.channel('create_news').listen('.new_news',(event)=>{ 
   $("#div_news").prepend(event.news +"weweewewwewe");
});


if (userId !== undefined) {
   window.Echo.private('App.Models.User.'+userId ).notification(
(notific)=>{
    if (!notific.news) {
      $("#unread_count").text(parseInt($("#unread_count").text())+1);
    $("#div_notification").prepend(`
      <a href="${notific.link}?nid=${notific.id}#${notific.ID}" class="dropdown-item">
        <!-- Message Start -->
        <div class="media">
            <div class="mr-3">
                <i class="${notific.icon} fa-2x"></i>
            </div>
            <div class="media-body">
                <p class="text-sm">${notific.body}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>${notific.time}
                </p>
            </div>
        </div>
    </a>
    <div class="dropdown-divider"></div>`);
    }


}
); 
}



