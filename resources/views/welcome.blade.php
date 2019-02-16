@extends('layouts.frontend.app')
@section('title', 'mycryptovision')
@section('content')

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="content">
                        <!--Sec Title-->
                        <div class="sec-title">
                            <h2>Article</h2>
                        </div>
                        
                        <div class="row clearfix">
                            <!--pagination -->
							
                            <!--News Block One-->
                            <div class="news-block-one col-md-6 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href=""><img src="{{ asset('assets/images/a.jpg') }}" alt="" /></a>
                                    </div>
                                    <div class="lower-box">
                                        <h3><a href="">WordPress News Magazine Charts the Fashionable universal Theme</a></h3>
                                        <div class="post-date">10-02-19 / author</div>
                                        <div class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita debitis rerum aliquam consectetur voluptate doloribus nesciunt. Et explicabo quasi suscipit?</div>
                                        <a href="" class="read-more">Read More <span class="arrow ion-ios-arrow-thin-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--End News Block-->
                            <!--News Block One-->
                            <div class="news-block-one col-md-6 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href=""><img src="{{ asset('assets/images/a.jpg') }}" alt="" /></a>
                                    </div>
                                    <div class="lower-box">
                                        <h3><a href="">WordPress News Magazine Charts the Fashionable universal Theme</a></h3>
                                        <div class="post-date">10-02-19 / author</div>
                                        <div class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita debitis rerum aliquam consectetur voluptate doloribus nesciunt. Et explicabo quasi suscipit?</div>
                                        <a href="" class="read-more">Read More <span class="arrow ion-ios-arrow-thin-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!--End News Block-->
                            
                        </div>
                        
                    </div>
                    
                    <!-- Styled Pagination -->
                    <div class="styled-pagination">
                        <ul class="clearfix">
                        
							<!--pagination -->
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a class="next" href="#"><span class="fa fa-angle-right"></span></a></li>
                        </ul>
                    </div>
                    
                </div>
                
                @include('layouts.frontend.inc.sidebar')
                
            </div>
            
        </div>
    </div>
    <!--End Sidebar Page Container-->
    
@endsection
