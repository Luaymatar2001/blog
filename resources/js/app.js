
import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

window.Echo.channel('create_news').listen('.new_news',(event)=>{ 
    console.log(event.news);
   $("#div_news").prepend(` <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
        <div class="inner-box">
            <div class="image">
                <a href="blog-detail.html"><img src="${event.news['image_url']}" alt="" /></a>
            </div>
            <div class="lower-content">
                <div class="content">
                    <ul class="post-info">
                        <li><span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span>
                            0</li>
                    </ul>
                    <ul class="post-meta">
                        <li>${event.news['time_format']}</li>
                       <li>${event.news['user_name']}</li>

                        <li>
                            <ul class="review">
                             <li><i class="far fa-star" style="color: #e5e7eb;"></i></li>
                             <li><i class="far fa-star" style="color: #e5e7eb;"></i></li>
                             <li><i class="far fa-star" style="color: #e5e7eb;"></i></li>
                             <li><i class="far fa-star" style="color: #e5e7eb;"></i></li>
                             <li><i class="far fa-star" style="color: #e5e7eb;"></i></li>

                    </ul>
                    </li>
                    </ul>
                    <h3><a href="blog-detail.html">${event.news['title']}</a>
                    </h3>
                    <div class="text">${event.news['subject']}</div>
                    <a href="http://127.0.0.1:8000/admin/news/${event.news['slug']}" class="theme-btn btn-style-five"><span
                            class="txt">read
                            more</span></a>
                </div>
            </div>
        </div>
    </div>`);
});

window.Echo.private('chat.'+Id).listen('.chatMessage' , (event) => {
            var msgHistory = $('.msg_history');
        msgHistory.scrollTop(msgHistory[0].scrollHeight);
$(".msg_history").append(`
        <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
            </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                   
                    <p>${event.message}</p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>
        </div>`);

        
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



