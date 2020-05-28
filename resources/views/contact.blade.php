@extends('layouts.app')
@section('content')
    <!-- Contact Section Begin -->
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="col-lg-12">
                                <input type="email" placeholder="E-mail">
                                <input type="text" placeholder="Subject">
                                <textarea placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12 text-right">
                                <button type="submit">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="contact-widget">
                        <div class="cw-item">
                            <h5>Location</h5>
                            <ul>
                                
                                <li>Kathmandu, Nepal</li>
                            </ul>
                        </div>
                        <div class="cw-item">
                            <h5>Phone</h5>
                            <ul>
                                <li>+1 (603)535-4592</li>
                                <li>+1 (603)535-4556</li>
                            </ul>
                        </div>
                        <div class="cw-item">
                            <h5>E-mail</h5>
                            <ul>
                                <li>contact@ClothingStore.com</li>
                                <li>www.ClothingStore.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map">
                <div class="row">
                    <div class="col-lg-12">
                        <iframe
                        src="https://www.google.com/maps/d/embed?mid=1YeV-CBqH1wi1X9q1UyoHyl-5ais" 
                            height="560" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
@endsection 