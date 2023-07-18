<x-page-menu breadcrumbs1='details of {{$news_details->title}}'>
	<!--Sidebar Page Container-->
	<div class="sidebar-page-container">
		<div class="auto-container">
			<div class="row clearfix">

				<!--Content Side-->
				<div class="content-side col-sm-12">
					<div class="news-detail">
						<div class="inner-box">
							<div class="image">
								<img src="{{$news_details->image_url}}" alt="" />
							</div>
							<div class="lower-content">
								<div class="content">
									<ul class="post-info">
										<li><span
												class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span>
											{{$news_details->reviews()->count()}}</li>


										{{-- <li><span class="icon flaticon-heart"></span> 126</li> --}}
									</ul>
									<ul class="post-meta">
										<li>before : {{$news_details->time_format}} </li>
										<li>Post By: {{$news_details->user->name}}</li>
										<li> <a href="{{route('show.email' , $news_details->user->id)}}"
												style="text-decoration: none; color:#ffffff">Send Eamil :<i
													class="fas fa-paper-plane fa-lg" style="color:#ffffff"></i></a></li>

									</ul>

									<h3>{{$news_details->title}}</h3>
									<div class="text">
										<p>{{$news_details->subject}} </p>
										<p>{{$news_details->content}}</p>
										{{-- <blockquote>
											<div class="blockquote-text">sed quia non numquam eius modi tempora incidunt
												ut
												labore et dolore magnam aliquam quaerat voluptatem.</div>
											<div class="quote-box"><span class="icon flaticon-quote"></span></div>
										</blockquote> --}}
										{{-- <p>sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
											aliquam quaerat voluptatem.</p> --}}
									</div>
								</div>
							</div>
						</div>



					</div>

					<!--Comments Area-->
					<div class="comments-area">

						<div class="group-title">
							<h2>Comments {{$news_details->reviews()->count()}}</h2>
						</div>


						@foreach ($news_details->reviews as $review)
						<div class="comment-box" id="{{$review->id}}">
							<div class="comment">
								<div class="author-thumb"><img src="{{asset('images/resource/author-7.jpg')}}" alt="">
								</div>
								<div class="comment-inner">
									<div class="comment-info clearfix"><strong>{{$review->name}} </strong>
										<div class="comment-time">{{$review->time_format}}</div>
									</div>


									<div class="text">{{$review->subject}}
									</div>
									<div class="text">{{$review->content}}
									</div>
								</div>
								<ul class="review">
									@for ($i = 0; $i < 5; $i++) @if ($i < $review->rate) <li
											style="display: inline-block;">

											<i class="fas fa-star" style="color: #005eff;"></i>
										</li>
										@else
										<li style="display: inline-block;"><i class="far fa-star"
												style="color: #005eff;"></i>
										</li>
										@endif
										@endfor
								</ul>

							</div>

						</div>

						@endforeach

					</div>


					<!-- Comment Form -->
					<div class="comment-form">

						<div class="group-title">
							<h2>Leave a Reply</h2>
						</div>

						<!-- Comment Form -->
						<div class="comment-form">
							<!-- Comment Form -->
							<form method="post" action="{{route('review.store')}}">
								@csrf
								<div class="row clearfix">
									<input type="hidden" name="news_id" value="{{$news_details->id}}">
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<input type="text" name="name" placeholder="Full Name" required>
										@error('news_id')
										<small class="text-danger">
											{{ $message}}
										</small>
										@enderror
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<select name="rate" id="rate" required>
											<option value="5">Rate This Post (5 Stars)</option>
											<option value="4">Good Job! 4 stars.</option>
											<option value="3">Nice Work! 3 stars.</option>
											<option value="2">Not Bad, but can be better... 2 stars.</option>
											<option value="1">I don't like it at all.. 1 star.</option>
										</select>
										@error('rate')
										<small class="text-danger">
											{{ $message}}
										</small>
										@enderror
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="email" name="email" placeholder="Email" required>
										@error('email')
										<small class="text-danger">
											{{ $message}}
										</small>
										@enderror
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="subject" placeholder="Subject" required>
										@error('subject')
										<small class="text-danger">
											{{ $message}}
										</small>
										@enderror
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea name="content" placeholder="Message"></textarea>
										@error('content')
										<small class="text-danger">
											{{ $message}}
										</small>
										@enderror
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<button class="theme-btn comment-btn" type="submit" name="submit-form">Post
											Comments</button>
									</div>

								</div>
							</form>

						</div>
						<!--End Faq Form -->

					</div>



				</div>

				<!--Sidebar Side-->
				{{-- <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
					<aside class="sidebar">



					</aside>
				</div> --}}

			</div>
		</div>
	</div>
	<script>
		const hashParams = new URLSearchParams(window.location.hash.slice(1));
		                                const sectionId = hashParams.get('section');
		                                let IDHash = hashParams+"";
		                                let ID =IDHash.replace('=','')+"";
		                                const myElement = document.getElementById(ID);
		                                 myElement.style.backgroundColor = '#d3d3d3';  
		                              
		                             
		                                    $('#'+ID).animate({
		                                        backgroundColor: '#d3d3d3',
		                                        opacity: "toggle"
		                                    }, 700, "swing" ,function(){
		                                   $('#'+ID).animate({backgroundColor: '#d3d3d3',
		                                     opacity: "toggle"},700);
		                                   });
		                                
		                                setTimeout(() => {
		                                myElement.style.backgroundColor = '';
		                                }, 3000 );
		                                
		                            
	</script>
</x-page-menu>