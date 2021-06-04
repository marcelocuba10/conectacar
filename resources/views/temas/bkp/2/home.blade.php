@extends(searchThemeByUrl().'.app')

@section('content')

            <div class="slider_wrapper ">
                <div id="camera_wrap" class="">
                    <div data-src="/temas/page186/images/slide.jpg" ></div>
                    <div data-src="/temas/page186/images/slide1.jpg" ></div>
                    <div data-src="/temas/page186/images/slide2.jpg"></div>
                </div>
            </div>
            <div class="container_12">
                <div class="grid_4">
                    <div class="banner">
                        <div class="maxheight">
                            <div class="banner_title">
                                <img src="/temas/page186/images/icon1.png" alt="">
                                <div class="extra_wrapper">Fast&amp;
                                    <div class="color1">Safe</div>
                                </div>
                            </div>
                            Dorem ipsum dolor sit amet, consectetur adipiscinger elit. In mollis erat mattis neque facilisis, sit ameter ultricies erat rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales felis, quis malesuad
                            <a href="#" class="fa fa-share-square"></a>
                        </div>
                    </div>
                </div>
                <div class="grid_4">
                    <div class="banner">
                        <div class="maxheight">
                            <div class="banner_title">
                                <img src="/temas/page186/images/icon2.png" alt="">
                                <div class="extra_wrapper">Best
                                    <div class="color1">Prices</div>
                                </div>
                            </div>
                            Hem ipsum dolor sit amet, consectetur adipiscinger elit. In mollis erat mattis neque facilisis, sit ameter ultricies erat rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales felis, quis malesuader
                            <a href="#" class="fa fa-share-square"></a>
                        </div>
                    </div>
                </div>
                <div class="grid_4">
                    <div class="banner">
                        <div class="maxheight">
                            <div class="banner_title">
                                <img src="/temas/page186/images/icon3.png" alt="">
                                <div class="extra_wrapper">Package
                                    <div class="color1">Delivery</div>
                                </div>
                            </div>
                            Kurem ipsum dolor sit amet, consectetur adipiscinger elit. In mollis erat mattis neque facilisis, sit ameter ultricies erat rutrum. Cras facilisis, nulla vel viver auctor, leo magna sodales felis, quis malesuki
                            <a href="#" class="fa fa-share-square"></a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="c_phone">
                <div class="container_12">
                    <div class="grid_12">
                        <div class="fa fa-phone"></div>+ 1800 559 6580
                        <span>ORDER NOW!</span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
<!--==============================Content=================================-->
            <div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - April 07, 2014!</div>
				<div class="container_12">
					<div class="grid_5">
						<h3>Booking Form</h3>
                        <form action="#" method="post" id="bookingForm">
                            <div class="fl1">
                              <div class="controlHolder"><div class="tmInput">
                                <input name="Name" placeholder="Name:" type="text" data-constraints="@NotEmpty @Required @AlphaSpecial" id="regula-generated-801858" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                              </div></div>
                              <div class="controlHolder"><div class="tmInput">
                                <input name="From" placeholder="From:" type="text" data-constraints="@NotEmpty @Required " id="regula-generated-139274">
                              </div></div>
                            </div>
                            <div class="fl1">
                              <div class="controlHolder"><div class="tmInput">
                                <input name="Email" placeholder="Email:" type="text" data-constraints="@NotEmpty @Required @Email" id="regula-generated-418496">
                              </div></div>
                              <div class="controlHolder"><div class="tmInput mr0">
                                <input name="To" placeholder="To:" type="text" data-constraints="@NotEmpty @Required" id="regula-generated-537671">
                              </div></div>
                            </div>
                            <div class="clear"></div>
                            <strong>Time</strong>
                            <div class="controlHolder"><div class="tmInput">
                              <input name="Time" placeholder="" type="text" data-constraints="@NotEmpty @Required" id="regula-generated-448727">
                            </div></div>
                            <div class="clear"></div>
                            <strong>Date</strong>
                            <div class="controlHolder"><label class="tmDatepicker">
                              <input type="text" name="Date" placeholder="" data-constraints="@NotEmpty @Required @Date" id="dp1605616309519" class="hasDatepicker">
                            </label></div>
                            <div class="clear"></div>
                            <div class="controlHolder"><div class="tmRadio">
                              <p>Comfort</p>
                              <input name="Comfort" type="radio" id="tmRadio0" data-constraints="@RadioGroupChecked(name=&quot;Comfort&quot;, groups=[RadioGroup])" checked="" style="display: none;"><strong class="checked"></strong>
                              <span>Cheap</span>
                              <input name="Comfort" type="radio" id="tmRadio1" data-constraints="@RadioGroupChecked(name=&quot;Comfort&quot;, groups=[RadioGroup])" style="display: none;"><strong class="unchecked"></strong>
                              <span>Standart</span>
                              <input name="Comfort" type="radio" id="tmRadio2" data-constraints="@RadioGroupChecked(name=&quot;Comfort&quot;, groups=[RadioGroup])" style="display: none;"><strong class="unchecked"></strong>
                              <span>Lux</span> </div></div>
                            <div class="clear"></div>
                            <div class="fl1 fl2"> <em>Adults</em>
                              <div class="controlHolder"><select name="Adults" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="" style="display: none;">
                                <option>1</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                              </select><ul class="tmSelect tmSelect2 auto trans-element"><li><span>1</span><ul style="display: none;" class="transformSelectDropdown"><li data-settings="" class=""><span>1</span></li><li data-settings="" class=""><span>2</span></li><li data-settings="" class=""><span>3</span></li></ul></li></ul></div>
                              <div class="clear height1"></div>
                            </div>
                            <div class="fl1 fl2"> <em>Children</em>
                              <div class="controlHolder"><select name="Children" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="" style="display: none;">
                                <option>0</option>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                              </select><ul class="tmSelect tmSelect2 auto trans-element"><li><span>0</span><ul style="display: none;" class="transformSelectDropdown"><li data-settings="" class=""><span>0</span></li><li data-settings="" class=""><span>1</span></li><li data-settings="" class=""><span>2</span></li></ul></li></ul></div>
                            </div>
                            <div class="clear"></div>
                            <div class="controlHolder"><div class="tmTextarea">
                              <textarea name="Message" placeholder="Message" data-constraints="@NotEmpty @Required @Length(min=20,max=999999)" id="regula-generated-294220"></textarea>
                            </div></div>
                            <a href="https://www.free-css.com/free-css-templates" class="btn" data-type="submit">Submit</a>
                          </form>
					</div>
					<div class="grid_6 prefix_1">
						<a href="index2.html" class="type"><img src="/temas/page186/images/page1_img1.jpg" alt=""><span class="type_caption">Economy</span></a>
						<a href="index2.html" class="type"><img src="/temas/page186/images/page1_img2.jpg" alt=""><span class="type_caption">Standard</span></a>
						<a href="index2.html" class="type"><img src="/temas/page186/images/page1_img3.jpg" alt=""><span class="type_caption">Lux</span></a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>

@endsection