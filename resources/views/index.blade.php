@extends('layout.main')
@section('title','ระบบบริหารจัดการข้อมูลขยะ')
@section('content')
{{-- @include('sweetalert::alert') --}}

<style>
  .text-content {
		font-family: 'Kanit', sans-serif;
		font-size: 14px;
		text-transform: uppercase;
		/* background: #093372; */
		color: #afa939;
		/* padding: 10px 14px; */
		line-height: 34px;
		margin-bottom: 10px;
	}
</style>
<div class="hero-wrap js-fullheight" style="background-image: url('images/ku.csc.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-8 ftco-animate">
            <h1>ระบบบริหารจัดการข้อมูลขยะของ
                        <span
                           class="txt-rotate"
                           data-period="2000"
                           data-rotate='[ "มหาวิทยาลัยเกษตรศาสตร์", "วิทยาเขตเฉลิมพระเกียรติ", "จังหวัดสกลนคร"]'></span>
                      </h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <!-- <span class="subheading">ประเภทขยะ</span> -->
          <h2 class="text-content">ข้อมูลประเภทของขยะ</h2>
        </div>
      </div>
      <div class="row d-flex">
        {{-- <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
                <div class="text px-4 py-4">
                    <h3 class="heading mb-0"><a href="#">All you want to know about industrial laws</a></h3>
                </div>
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
            </a>
            <div class="text p-4 float-right d-block">
                <div class="topper d-flex align-items-center">
                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                        <span class="day">18</span>
                    </div>
                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                        <span class="yr">2019</span>
                        <span class="mos">October</span>
                    </div>
                </div>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
                <div class="text px-4 py-4">
                    <h3 class="heading mb-0"><a href="#">All you want to know about industrial laws</a></h3>
                </div>
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text p-4 float-right d-block">
                <div class="topper d-flex align-items-center">
                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                        <span class="day">18</span>
                    </div>
                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                        <span class="yr">2019</span>
                        <span class="mos">October</span>
                    </div>
                </div>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div>
          </div>
        </div> --}}
        <div class="col-md-12">
            <div class="justify-content-end">
                <div class="text px-4 py-4">
                    <h3 class="heading mb-0">ขยะมูลฝอยในประเทศไทยแบ่งออกเป็น 4 ประเภทใหญ่</h3>
                    <br>
                    <h5>1. ขยะอินทรีย์</h5>
                    {{-- <div style="background-image: url(/images/bin1.jpg);"></div> --}}
                    <div class="row justify-content-center">
                      <img src="images/bin1.jpg">
                    </div>
                    <div class="row justify-content-center">
                      <p>ภาพจาก <a href="https://esc.doae.go.th/%e0%b8%a1%e0%b8%b2%e0%b8%95%e0%b8%a3%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b8%a5%e0%b8%94-%e0%b9%81%e0%b8%a5%e0%b8%b0%e0%b8%84%e0%b8%b1%e0%b8%94%e0%b9%81%e0%b8%a2%e0%b8%81%e0%b8%82%e0%b8%a2%e0%b8%b0/">ศูนย์วิทยบริการเพื่อส่งเสริมการเกษตร</a></p>
                    </div>
                    <br>
                    <h5><span style="font-size: 9pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>ขยะอินทรีย์หรือขยะย่อยสลาย เป็นขยะที่สามารถย่อยสลายหรือเน่าเสียได้ในระยะเวลาที่รวดเร็ว เช่น เศษอาหาร เศษผัก-ผลไม้ ต้นหญ้า ใบไม้ และภาชนะที่ย่อยสลายเองได้ โดยเราสามารถนำขยะประเภทนี้ไปทำเป็นน้ำหมักจุลินทรีย์ ปุ๋ยหมัก ปุ๋ยชีวภาพ และใช้บำรุงดินหรือบำรุงต้นไม้ได้ต่อไป ส่วนถังขยะไว้ทิ้งขยะย่อยสลาย คือ ถังขยะหรือถุงขยะสีเขียว ที่มีสัญลักษณ์สามเหลี่ยม มีรูปก้างปลาและเศษอาหารตรงกลาง</h5>
                    <br>
                    <h5>2. ขยะรีไซเคิล</h5>
                    {{-- <div style="background-image: url(/images/bin1.jpg);"></div> --}}
                    <div class="row justify-content-center">
                      <img src="images/bin2.jpg">
                    </div>
                    <div class="row justify-content-center">
                      <p>ภาพจาก <a href="https://esc.doae.go.th/%e0%b8%a1%e0%b8%b2%e0%b8%95%e0%b8%a3%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b8%a5%e0%b8%94-%e0%b9%81%e0%b8%a5%e0%b8%b0%e0%b8%84%e0%b8%b1%e0%b8%94%e0%b9%81%e0%b8%a2%e0%b8%81%e0%b8%82%e0%b8%a2%e0%b8%b0/">ศูนย์วิทยบริการเพื่อส่งเสริมการเกษตร</a></p>
                    </div>
                    <br>
                    <h5><span style="font-size: 9pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>ขยะรีไซเคิล เป็นขยะที่สามารถนำมาแปรรูป แล้วนำไปใช้ประโยชน์ใหม่ได้อีกครั้ง ส่วนมากจะเป็นสิ่งของเหลือใช้ หรือภาชนะบรรจุของ เช่น แก้ว กระดาษ พลาสติก กระป๋อง กล่อง ลัง โลหะ อะลูมิเนียม และยางรถยนต์ โดยเราสามารถนำขยะเหล่านี้ไปขายเป็นของเก่า ไปประยุกต์เป็นของใช้ที่มีประโยชน์ หรือไม่ก็ส่งต่อให้กับโครงการรีไซเคิลต่าง ๆ ได้ ส่วนถังขยะที่รองรับขยะรีไซเคิล คือ ถังขยะหรือถุงขยะสีเหลือง ที่มีสัญลักษณ์ลูกศรหมุนวนกัน</h5>
                    <br>
                    <h5>3. ขยะอันตราย</h5>
                    {{-- <div style="background-image: url(/images/bin1.jpg);"></div> --}}
                    <div class="row justify-content-center">
                      <img src="images/bin3.jpg">
                    </div>
                    <div class="row justify-content-center">
                      <p>ภาพจาก <a href="https://esc.doae.go.th/%e0%b8%a1%e0%b8%b2%e0%b8%95%e0%b8%a3%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b8%a5%e0%b8%94-%e0%b9%81%e0%b8%a5%e0%b8%b0%e0%b8%84%e0%b8%b1%e0%b8%94%e0%b9%81%e0%b8%a2%e0%b8%81%e0%b8%82%e0%b8%a2%e0%b8%b0/">ศูนย์วิทยบริการเพื่อส่งเสริมการเกษตร</a></p>
                    </div>
                    <br>
                    <h5><span style="font-size: 9pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>ขยะอันตรายหรือขยะพิษ เป็นขยะที่มีวัตถุอันตรายปนเปื้อนหรือประกอบอยู่ เช่น หลอดไฟ ถ่านไฟฉาย แบตเตอรี่โทรศัพท์ กระป๋องสเปรย์ และภาชนะบรรจุสารเคมีอันตราย ซึ่งเราสามารถสังเกตได้ไม่ยากจากสัญลักษณ์หรือเครื่องหมายเตือนที่มักจะติดอยู่บนฉลากว่า สารมีพิษ สารไวไฟ สารกัดกร่อน อันตราย คำเตือน ข้อควรระวัง ห้ามรับประทาน และห้ามเผา โดยเราสามารถนำขยะประเภทนี้ไปกำจัดอย่างถูกต้องและปลอดภัยได้ ถ้าหากมีการเก็บแยกอย่างเหมาะสม อีกทั้งยังสามารถนำไปรีไซเคิลได้ด้วย ส่วนถังขยะที่รองรับขยะอันตราย คือ ถังขยะหรือถุงขยะสีส้ม ที่มีสัญลักษณ์วงกลม พร้อมรูปลูกศรสีขาวชี้ลง และหัวกะโหลกกับกากบาทด้านใน</h5>
                    <br>
                    <h5>4. ขยะทั่วไป</h5>
                    {{-- <div style="background-image: url(/images/bin1.jpg);"></div> --}}
                    <div class="row justify-content-center">
                      <img src="images/bin4.jpg">
                    </div>
                    <div class="row justify-content-center">
                      <p>ภาพจาก <a href="https://esc.doae.go.th/%e0%b8%a1%e0%b8%b2%e0%b8%95%e0%b8%a3%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b8%a5%e0%b8%94-%e0%b9%81%e0%b8%a5%e0%b8%b0%e0%b8%84%e0%b8%b1%e0%b8%94%e0%b9%81%e0%b8%a2%e0%b8%81%e0%b8%82%e0%b8%a2%e0%b8%b0/">ศูนย์วิทยบริการเพื่อส่งเสริมการเกษตร</a></p>
                    </div>
                    <br>
                    <h5><span style="font-size: 9pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>ขยะทั่วไป เป็นขยะที่ย่อยสลายได้ยาก ไม่เหมาะจะนำไปรีไซเคิล แต่ก็ไม่ได้เป็นอันตรายเกินไป จึงเรียกง่าย ๆ ว่า ขยะทั่วไป คือ ขยะทั้งหมดที่อยู่นอกเหนือจากขยะย่อยสลาย ขยะรีไซเคิล และขยะอันตรายนั่นเอง เช่น โฟม ฟอยล์ ถุงพลาสติก ซองอาหาร กระป๋องสี และแผ่นซีดี ซึ่งจำเป็นต้องแยกก่อนทิ้ง เพื่อจะได้นำไปกำจัดอย่างถูกต้อง ส่วนถังขยะที่รองรับขยะทั่วไป คือ ถังขยะหรือถุงขยะสีน้ำเงิน ที่มีสัญลักษณ์รูปคนกำลังทิ้งขยะลงในถัง
                    </h5>
                    
                    
                </div>
            {{-- <div class="text p-4 float-right d-block">
                <div class="topper d-flex align-items-center">
                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                        <span class="day">18</span>
                    </div>
                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                        <span class="yr">2019</span>
                        <span class="mos">October</span>
                    </div>
                </div>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="#" class="btn btn-primary">Read more</a></p>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
      <div class="container-fluid px-md-5">
          <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <br>
            {{-- <span class="subheading">ทีมพัฒนา</span> --}}
          <h2 class="text-content">ทีมพัฒนา</h2>
        </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-lg-3 col-sm-6">
              <div class="block-2 ftco-animate">
              <div class="flipper">
                <div class="front" style="background-image: url(/images/nitaya.jpg);">
                  <div class="box">
                    <h2>Dr.Nittaya Muangnak</h2>
                    <p>ดร.นิตยา เมืองนาค</p>
                  </div>
                </div>
                <div class="back">
                  <!-- back content -->
                  <blockquote>
                    <p>&ldquo;อาจารย์ที่ปรึกษา <br>คณะวิทยาศาสตร์และวิศวกรรมศาสตร์ <br>ภาควิชาวิทยาการคอมพิวเตอร์และสารสนเทศ &rdquo;</p>
                  </blockquote>
                  <div class="author d-flex">
                    <div class="image align-self-center">
                      <img src="images/nitaya.jpg" alt="">
                    </div>
                    <div class="name align-self-center ml-3">Dr.Nittaya Muangnak <span class="position">ดร.นิตยา เมืองนาค</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="block-2 ftco-animate">
              <div class="flipper">
                <div class="front" style="background-image: url(/images/cake.jpg);">
                  <div class="box">
                    <h2>Mr.Rittee Moolkoet</h2>
                    <p>นาย ฤทธี มูลโคตร</p>
                  </div>
                </div>
                <div class="back">
                  <!-- back content -->
                  <blockquote>
                    <p>&ldquo;นิสิตคณะวิทยาศาสตร์และวิศวกรรมศาสตร์ <br>สาขาวิทยาการคอมพิวเตอร์ ชั้นปีที่ 4 &rdquo;</p>
                  </blockquote>
                  <div class="author d-flex">
                    <div class="image align-self-center">
                      <img src="images/cake.jpg" alt="">
                    </div>
                    <div class="name align-self-center ml-3">Mr.Rittee Moolkoet <span class="position">นาย ฤทธี มูลโคตร</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="block-2 ftco-animate">
              <div class="flipper">
                <div class="front" style="background-image: url(/images/game.jpg);">
                  <div class="box">
                    <h2>Mr.Jessada Suenborae</h2>
                    <p>นาย เจษฎา สวนบ่อเเร่</p>
                  </div>
                </div>
                <div class="back">
                  <!-- back content -->
                  <blockquote>
                    <p>&ldquo;นิสิตคณะวิทยาศาสตร์และวิศวกรรมศาสตร์ <br>สาขาวิทยาการคอมพิวเตอร์ ชั้นปีที่ 4 &rdquo;</p>
                  </blockquote>
                  <div class="author d-flex">
                    <div class="image align-self-center">
                      <img src="images/game.jpg" alt="">
                    </div>
                    <div class="name align-self-center ml-3">Mr.Jessada Suenborae <span class="position">นาย เจษฎา สวนบ่อเเร่</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
</section>


@endsection